<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment($post_id, Request $request)
    {

        $request->validate(
            [
                'content' => 'required'
            ],
            [
                'content.required' => 'Content cannot be left blank!'
            ]
        );

        $data = [
            'content' => $request->input('content'), // Sử dụng input thay vì only để lấy chuỗi
            'post_id' => $post_id,
            'user_id' => auth()->user()->id,
            'parent_id' => $request->parent_id ? $request->parent_id :0
        ];

        // Thêm dữ liệu vào database
        $comments = Comment::create($data);

        return response()->json([ // Trả dữ liệu về dưới dạng json.
            'message' => 'Comment added successfully!', // Trả về thông báo sau khi nhận được dữ liệu trả về.
            'data' => [
                'comment'  => $comments,
                'user' => auth()->user()
            ], // Trả về mảng dữ liệu data dưới dạng json
        ]);

        return redirect()->back();
    }
    public function destroy(Comment $id)
    {
        $id->delete();
        return response()->json([
            'message' => 'Comment deleted successfully!'
        ]);
        // return redirect()->back()->with('message', 'Comment deleted successfully!');
    }

    public function update(Request $request){
        $data = $request->all();
        // dd($data);
        $comment = Comment::find($request->id_comment);
        $comment->update($data);
        return response()->json([
            'message' => 'Comment Updated Successfully!',
            'data' => $data
        ]);
    }

}
