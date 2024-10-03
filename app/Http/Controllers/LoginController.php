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

        //Kiểm tra tài khoản có trong CSDL không
        if (Auth::attempt($data)) {
            // Kiểm tra URL đã lưu và redirect đến URL đó
            return redirect()->intended(route('post.index'));
        } else {
            return redirect()->route('homePage')->with('errorLogin', 'Email hoặc Password không chính xác');
        }
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
