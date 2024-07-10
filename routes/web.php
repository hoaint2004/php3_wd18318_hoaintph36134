<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/about-us', function (){
    return "TRANG GIỚI THIỆU";
})->name('page.about');

Route::view('/contact', 'contact');

Route::get('/product/{id}', function(int $id){
    return "PRODUCT ID: $id";
});

Route::get('/product/{id}/comment/{comment_id}', 
function($id, $comment_id){
    return "Product ID: $id - Comment id: $comment_id";
    }
)->where('id', '[0-9]+');

// nhóm tiền tố đường dẫn
Route::prefix('admin')->group(function(){
    Route::get('product', function(){
        return "PRODUCT";
    });

    Route::get('/users', function(){
        return "USERS";
    });
});

// Áp dụng query builder

Route::get('/posts', function(){
    // $posts = DB::table('posts')->get(); //lấy dữ liệu bảng posts

    // Lấy dữ liệu theo số lượng bản ghi 
    // $posts = DB::table('posts')
    // ->limit(10)
    // ->get();

    // Lấy ra tất cả các bài viết có lượt xem >800
    // $posts = DB::table('posts')
    // where('tên cột', 'biểu thức so sánh', giá trị)
    // ->where('view', '>', 800)
    // ->get();

    // Cập nhật dữ liệu
    // DB::table('posts')
    // ->where('id', '=', 1)
    // ->update([
    //     'title' => "Bài viết được cập nhật"
    // ]);

    // Xóa dữ liệu
    // DB::table('posts')
    // ->where('id', '=', 17)
    // ->delete();

    //  // Lấy ra tất cả các bài viết có lượt xem >800
    // $posts = DB::table('posts')
    // // where('tên cột', 'biểu thức so sánh', giá trị)
    // ->where('view', '>', 800)
    // ->get();

    // Nối 2 bảng categories và post
    // Select * form posts join categories on cate_id = categories.id
    $posts = DB::table('posts')
    ->join('categories', 'cate_id','=', 'categories.id')
    ->get();
    return $posts;
});

Route::get('post-list', function(){
    // lấy dữ liệu
    $posts = DB::table('posts')->get();
    return view('post-list', compact('posts')); 
    // return view('post-list', ['posts' => $posts]);
});