<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        if (url()->previous() != route('register')) {
            session(['url.intended' => url()->previous()]);
        }
        return view('login');
    }

    //Login
    public function postLogin(Request $request)
    {
       $data = $request->only('email', 'password');

$user = User::where('email', $request->email)->first();

if ($user) {
    // Kiểm tra mật khẩu có khớp với mật khẩu đã mã hóa trong cơ sở dữ liệu hay không
    if (Hash::check($request->password, $user->password)) {
        // Đăng nhập thành công
        Auth::login($user);

        // Kiểm tra quyền của người dùng sau khi đăng nhập thành công
        if (Auth::user()->role == 'admin') {
            // Nếu là admin, chuyển hướng đến trang quản trị
            return redirect()->intended(route('post.index'));
        } elseif (Auth::user()->role == 'user') {
            // Nếu là user, chuyển hướng đến trang chủ
            return redirect()->intended(route('homePage'));
        }
    } else {
        // Nếu mật khẩu không chính xác
        return redirect()->route('login')->with('errorLogin', 'Mật khẩu không chính xác.');
    }
} else {
    // Nếu email không tồn tại trong cơ sở dữ liệu
    return redirect()->route('login')->with('errorLogin', 'Email không tồn tại.');
}

// Nếu đúng sẽ chuyển hướng về trang chủ
return redirect()->route('homePage');

    }
    public function register()
    {
        return view('register');
    }

    //Register
    public function postRegister(Request $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        $data = $request->all();
        // dd($data);
        User::query()->create($data);
        return redirect()->route('login')->with('message', 'Đăng ký tài khoản thành công');
    }

    //Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
