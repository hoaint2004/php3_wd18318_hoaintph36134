<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        // Số lượng bản ghi muốn hiển thị trong 1 trang
        $posts = Post::query()->paginate(10);

        return view('listPost', compact('posts'));
    }

    public function indexHome()
    {
        // Hiển thị bài viết mới nhất
        $postNew = Post::query()->orderBy('created_at', 'desc')->first();

        // Hiển thị danh sách bài viết mới cập nhật
        $postUpdate = Post::query()->orderBy('updated_at', 'desc')->limit(4)->get();

        // Hiển thị danh sánh bài viết theo danh mục
        $categories = Category::all();
        $categories->each(function ($category) {
            $category->setRelation('posts', $category->posts()->take(6)->orderBy('id', 'DESC')->get());
        });

        $postNews = Post::query()->orderBy('created_at', 'desc')->limit(4)->get();
        return view('user.home', compact('postNew', 'postUpdate', 'categories', 'postNews'));
    }

    public function load_more_post(Request $request)
    {
        $start = $request->input('start'); // Nhận dữ liệu start từ yêu cầu gửi đến.
        $categoryId = $request->input('categoryId'); // Nhận dữ liệu categoryId từ yêu cầu.
        $postId = $request->input('postId'); // Nhận dữ liệu postId từ yêu cầu gửi đến.

        // Trong đó: + $start: chỉ số bắt đầu cho việc tải thêm bài viết (giúp xác định số lượng bài đã được tải).
                 //  + $categoryId: ID của danh mục để lọc bài viết.   
                 //  + $postId: ID của bài viết mới nhất đã được tải trước đó.
        
        $data = Post::where('id', '<', $postId) // Lọc tất cả các bài viết có Id nhỏ hơn Id của bài viết mới được.
            ->where('cate_id', $categoryId) // Lọc tất cả các bìa viết cso cate_id cùng danh mục với các bài viết trước đó.
            ->orderBy('id', 'DESC') // Nhóm các bài viết đã lọc theo thứ tự Id giảm dần.
            ->limit(3) // Lấy số lượng bản ghi giới hạn: 3.
            ->with('category') // liên kết với bảng category để lấy ra tên danh mục.
            ->get(); // in dữ liệu.

            return response()->json([ // Trả dữ liệu về dưới dạng json.
            'message' => 'Đã nhận được dữ liệu!', // Trả về thông báo sau khi nhận được dữ liệu trả về.
            'data' => $data, // Trả về mảng dữ liệu data dưới dạng json
            'next' => $start + 3, // Tăng chỉ số start thêm 3 để thực hiện lần tải thêm tiếp theo.
        ]);
    }

    public function detailPost($id)
    {
        // Hiển thị dữ liệu bài viết
        $post = Post::query()->where('id', $id)->first();

        if (!$post) {
            return view('user.notFound');
        }

        $category = Category::all();

        // Hiện thị danh sách bài viết cùng danh mục với bài viết
        $categories = Category::query()
            ->with(['posts' => function ($query) {
                $query->limit(3);
            }])
            ->where('name', $post->category->name)
            ->limit(3)
            ->get();

        // Hiển thị danh sách bài viết khác danh mục
        $cateOther = Category::query()->where('name', '!=', $post->category->name)->get();

        $cateOther->each(function ($category) {
            $category->setRelation('posts', $category->posts()->take(1)->get());
        });

        $comments = Comment::where('post_id', $id)->where('parent_id', 0)->orderBy('id', 'DESC')->get();

        return view('user.detailpost', compact('post', 'categories', 'category', 'cateOther', 'comments'));
    }


    public function search_form(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ form
        $keyw = $request->input('keyword');
        $date = $request->input('time');
        $category = $request->input('category');

        $query = Post::query()->where('title', 'LIKE', '%' . $keyw . '%');

        if ($date) {
            if ($date == 'all') {
                $dateFilter = null;
            }
            //1 day
            if ($date == '1day') {
                $dateFilter = now()->subDay();
            }
            //1 week
            if ($date == '1week') {
                $dateFilter = now()->subWeek();
            }
            //1 month
            if ($date == '1month') {
                $dateFilter = now()->subMonth();
            }
            //1 year
            if ($date == '1year') {
                $dateFilter = now()->subYear();
            }
            if ($dateFilter) {
                $query =  $query->where('updated_at', '>=', $dateFilter);
            }
        }

        if ($category && $category != 'Tất cả') {
            $query->whereHas('category', function ($q) use ($category) {
                $q->where('name', $category);
            });
        }

        $search_post = $query->paginate(10);

        if ($search_post->isNotEmpty()) {
            // Trả về view với kết quả tìm kiếm
            return view('user.results', compact('keyw', 'search_post', 'date', 'category'));
        } else {
            // Trả về view không có kết quả nếu không tìm thấy bài viết nào
            return view('user.notResult', compact('keyw', 'search_post', 'date', 'category'));
        }

        return view('user.search', compact('keyw, search_post'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->except('image');
        $data['image'] = "";
        // kiểm tra file
        if ($request->hasFile('image')) {
            $path_image = $request->file('image')->store('images');
            $data['image'] = $path_image;
        }
        // Lưu data vào database
        Post::query()->create($data);
        return redirect()->route('post.index')->with('message', 'Thêm dữ liệu thành công!');
    }

    // Xóa bài viết
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('message', 'Xóa dữ liệu thành công!');
    }

    // Hiển thị form edit
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('categories', 'post'));
    }

    // Cập nhật dữ liệu
    // request - lấy dữ liệu từ form
    public function update(Request $request, Post $post)
    {
        $data = $request->except('image');
        // Xử lý hình ảnh
        $old_image = $post->image;
        // Người dùng không upload ảnh mới
        $data['image'] = $old_image;
        // Người dùng upload ảnh
        if ($request->hasFile('image')) {
            $path_image = $request->file('image')->store('images');
            $data['image'] = $path_image;
        }

        // update data
        $post->update($data);

        // Xóa ảnh cũ sau khi cập nhật
        if ($request->hasFile('image')) {
            if (file_exists('storage/' . $old_image)) {
                unlink('storage/' . $old_image);
            }
        }
        return redirect()->back()->with('message', 'Cập nhật dữ liệu thành công!');
    }
}
