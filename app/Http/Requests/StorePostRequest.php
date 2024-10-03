<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Thay đổi
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // create post
            'title' => ['required', 'min:10'],
            'image' => ['required', 'image'],
            'description' => ['required', 'min:5'],
            'content' => ['required', 'min:25'],
            'view' => ['required', 'integer', 'min:0'],
            // register
            // 'fullname' => ['required'],
            // 'username' => ['required'],
            // 'email' => ['required'],
            // 'password' => ['required'],
            // 'confirm_password' => ['required', 'same:password'],

        ];
    }

    //Thông báo
    public function messages()
    {
        return [
            // error create post
            'title.required' => "Title không được để trống",
            'title.min' => "Title phải được nhập từ 10 ký tự",
            'image.required' => "Hình ảnh không được để trống",
            'image.image' => "Định dạng hình ảnh không đúng",
            'description.required' => "Mô tả không được để trống",
            'description.min' => "Mô tả phải nhập ít nhất 5 ký tự",
            'content.required' => "Nội dung không được để trống",
            'content.min' => "Nội dung phải được nhập ít nhất 25 ký tự",
            'view.required' => "Lượt xem không được để trống",
            'view.integer' => "Lượt xem phải là số nguyên",
            'view.min' => "Lượt xem phải là số lớn hơn 0",

            // error register
            // 'fullname.required' => "Fullname không được để trống",
            // 'username.required' => "Username không được để trống",
            // 'email.required' => "Email không được để trống", 
            // 'email.nullable' => "Email đã tồn tại!",
            // 'password.required' => "Password không được để trống",
            // 'confirm_password' => "Confirm Password không được để trống",
            // 'confirm_password' => "Confirm Password không khớp với Password", 
        ];
    }
}
