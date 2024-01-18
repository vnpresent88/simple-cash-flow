<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string',
            'user-p' => 'required|string',
        ], [
            'phone.required' => 'Chưa nhập:Số điện thoại',
            'phone.string' => 'Chưa nhập Số điện thoại',
            'user-p.required' => 'Chưa nhập Password',
            'user-p.string' => 'Chưa nhập Password',
        ]);
        if ($validator->fails()) {
            foreach ($validator->errors()->messages() as $message) {
                toastr()->error($message[0], 'Failed', ['timeOut' => 10000]);
            }
            return redirect()->back();
        }
        $data = $validator->validated();
        if (Auth::attempt(['phone' => $data['phone'], 'password' => $data['user-p']])) {
            return redirect()->route('index')->with(['success' => 'Đăng nhập thành công!']);
        }
        return redirect()->back()->with(['error' => 'Sai tài khoản hoặc mật khẩu!']);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|unique:users|string',
            'user-p' => 'required|string',
            'user-re-p' => 'required|string|same:user-p',
        ], [
            'phone.required' => 'Chưa nhập Số điện thoại',
            'phone.string' => 'Chưa nhập Số điện thoại',
            'phone.unique' => 'Số điện thoại đã có trước',
            'user-p.required' => 'Chưa nhập Password',
            'user-p.string' => 'Chưa nhập Password',
            'user-re-pr-p.string' => 'Chưa nhập Password',
            'user-re-p.string' => 'Chưa nhập Password',
            'user-re-p.same' => 'Password nhập lại không đúng',
        ]);
        if ($validator->fails()) {
            foreach ($validator->errors()->messages() as $message) {
                toastr()->error($message[0], 'Failed', ['timeOut' => 10000]);
            }
            return redirect()->back();
        }
        $data = $validator->validated();
        $user = User::create([
            'name' => $data['phone'],
            'phone' => $data['phone'],
            'password' => $data['user-p'],
        ]);
        return redirect()->route('index')->with(['success' => 'Đăng ký thành công!']);
    }
}
