<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function test()
    {
        // Lấy toàn bộ dữ liệu
        // $posts = Post::all();

        // Lấy 1 bản ghi
        // $posts = Post::all()->first();

        // Lấy dữ liệu theo điều kiện (tìm kiếm dữ liệu tuyệt đối)
        // $posts = Post::where('cate_id', 1)->get();

        // Tìm kiếm dữ liệu gần đúng
        // $posts = Post::query()->where('title', 'LIKE', '%Aut%')->get();
        // return $posts;

        // Các hàm trong SQL SUM, COUNT, AVG,...
        // Đếm tổng số bài viết
        // $count = Post::query()->count();
        // return $count;

        // Đếm toàn bộ bài viết có điều kiện
        // $count = Post::query()->where('cate_id', 1)->count();
        // return $count;

        // Tính tổng số lượt xem
        // $sum = Post::query()->sum('view');
        // return $sum;

        // Thêm dữ liệu
        // Cách 1: Sử dụng mảng

        // $data = [
        //     'title' => fake()->text(25),
        //     'image'=> fake()->imageUrl(),
        //     'description' => fake()->text(30),
        //     'content' => fake()->paragraph(),
        //     'view' => rand(10, 1000),
        //     'cate_id' => rand(1, 4),
        // ];

        // Post::query()->create($data);   

        // Cách 2: dùng đối tượng

        // $post = new Post();
        // $post->title = fake()->text(25);
        // $post->image = fake()->imageUrl();
        // $post->description = fake()->text(30);
        // $post->content = fake()->paragraph();
        // $post->view = rand(10,1000);
        // $post->cate_id = rand(1,4);
        // $post->save();


        // // Cập nhật dữ liệu
        // Post::query()->find(202)->update([
        //     'title' => 'Update Title'
        // ]);


        // Xóa dữ liệu
        // Post::query()->find(201)->delete();

    }

    public function index()
    {
        // Số lượng bản ghi muốn hiển thị trong 1 trang
        $posts = Post::query()->paginate(10);
        return view('listPost', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(StorePostRequest $request)
    {
        // Validate: key = tên input
        // $request->validate(
        //     [
        //         'title' => ['required', 'min:10'],
        //         'image' => ['required', 'image'],
        //         'description' => ['required', 'min:5'],
        //         'content' => ['required', 'min:25'],
        //         'view' => ['required', 'integer', 'min:0'],
        //     ],
        //     [
        //         'title.required' => "Title không được để trống",
        //         'title.min' => "Title phải được nhập từ 10 ký tự",
        //         'image.required' => "Hình ảnh không được để trống",
        //         'image.image' => "Định dạng hình ảnh không đúng",
        //         'description.required' => "Mô tả không được để trống",
        //         'description.min' => "Mô tả phải nhập ít nhất 5 ký tự",
        //         'content.required' => "Nội dung không được để trống",
        //         'content.min' => "Nội dung phải được nhập ít nhất 25 ký tự",
        //         'view.required' => "Lượt xem không được để trống",
        //         'view.integer' => "Lượt xem phải là số nguyên",
        //         'view.min' => "Lượt xem phải là số lớn hơn 0",
        //     ],
        // );

        // dd($request->all());
        $data = $request->except('image');
        // except : loại bỏ

        // dd($request->input('title'));
        // dd($request['title']);

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
