<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
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
            $category->setRelation('posts', $category->posts()->take(6)->get());
        });

        $postNews = Post::query()->orderBy('created_at', 'desc')->limit(4)->get();
        // dd($postNews);

        return view('user.home', compact('postNew', 'postUpdate', 'categories', 'postNews'));
    }

    public function detailPost($id)
    {
        // Hiển thị dữ liệu bài viết
        $post = Post::query()->where('id', $id)->first();

        if(!$post){
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

        return view('user.detailpost', compact('post', 'categories', 'category', 'cateOther'));
    }

    public function search(Request $request){
        // 
        $keyw = $request->keyword;
        $category = Category::query()->get();
        $post = Post::query()->get();
        $search_post = Post::query()->where('title', 'LIKE', '%'.$keyw.'%')->paginate(10);
        // dd($search_post);
        // dd($keyw);
        return view('user.search', compact('keyw', 'category', 'post', 'search_post'));

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
    // request-lấy dữ liệu từ form
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
