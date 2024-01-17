<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login_view()
    {
        return view('auth.login');
    }

    public function register_view()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $cre = $request->validate([
            'user-e' => 'required|email',
            'user-p' => 'required|string',
        ], [
            'user-e.required' => 'Chưa nhập Email',
            'user-e.email' => 'Chưa nhập Email',
            'user-p.required' => 'Chưa nhập Password',
            'user-p.string' => 'Chưa nhập Password',
        ]);
        if (Auth::attempt(['email' => $cre['user-e'], 'password' => $cre['user-p']])) {
            return redirect()->to('index')->with(['success' => 'Đăng nhập thành công!']);
        }
        return redirect()->back()->with(['error' => 'Sai tài khoản hoặc mật khẩu!']);
    }

    public function register(Request $request)
    {
        return view('auth.login');
    }
}
