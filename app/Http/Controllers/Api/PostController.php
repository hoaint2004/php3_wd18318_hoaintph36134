<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function index(){

    }

    public function show(Post $post){
        if($post){
            return response()->json($post);

        }
        return response()->json([
            'status' => false,
            'message' => 'Bài viết không tồn tại'
        ], Response::HTTP_NOT_FOUND);
    }


    // Xóa dữ liệu

    public function destroy(Post $post){
        Post::query()->find($id)->delete();
        // $post->delete();
        return response()->json([
            'status' => true,
            'message' => 'Xóa dữ liệu thành công!',
        ], Response::HTTP_ACCEPTED);
    }
}
