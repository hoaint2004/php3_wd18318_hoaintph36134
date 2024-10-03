<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content', 
        'post_id', 
        'parent_id', 
        'user_id'
    ];

    // Quan hệ với comment cha
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    // Quan hệ với các comment con
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    // Quan hệ với bài viết
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Quan hệ với người dùng
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
