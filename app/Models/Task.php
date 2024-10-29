<?php

namespace App\Models; // hoặc namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Tên bảng tương ứng trong cơ sở dữ liệu (nếu không theo quy tắc đặt tên của Laravel)
    protected $table = 'tasks';

    // Các thuộc tính có thể được gán hàng loạt (mass assignable)
    protected $fillable = [
        'title', // Tên của nhiệm vụ
        'description', // Mô tả của nhiệm vụ
        'frequency', // Tần suất của nhiệm vụ
        // Các thuộc tính khác mà bạn muốn cho phép gán hàng loạt
    ];

    // Các thuộc tính không thể gán hàng loạt
    protected $guarded = [
        'id', // Thường thì id sẽ không cho phép gán hàng loạt
    ];

    // Các thuộc tính khác có thể được thêm vào tùy theo nhu cầu
}
