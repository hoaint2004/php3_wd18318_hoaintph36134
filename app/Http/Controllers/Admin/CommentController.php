<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment($post_id){
        // Lấy dữ liệu từ form
        $data = request()->all('content', 'image');
        $data['post_id'] = $post_id;
        $data['user_id'] = auth()->user()->id;

        // Thêm dữ liệu vào database
        Comment::create($data);     
        
        // Sau khi thêm dữ liệu vào databse trở lại trang detail
        return redirect()->back();
    }
}
