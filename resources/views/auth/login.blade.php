@extends('layouts.layout')
@section('title')
Login | Cash Flow
@endsection
@section('css')

@endsection
@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">

            <form class="login100-form validate-form" autocomplete="do-not-autofill" action="{{ route('plogin') }}"
                method="POST">
                <span class="login100-form-title p-b-26">
                    Welcome
                </span>
                <span class="login100-form-title p-b-48">
                    <i class="zmdi zmdi-font"></i>
                </span>
                @csrf
                <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                    <input class="input100" type="text" name="phone" autocomplete="off">
                    <span class="focus-input100" data-placeholder="Số điện thoại"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <span class="btn-show-pass">
                        <i class="zmdi zmdi-eye"></i>
                    </span>
                    <input class="input100" type="password" name="user-p" autocomplete="off">
                    <span class="focus-input100" data-placeholder="Mật khẩu"></span>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn">
                            Đăng nhập
                        </button>
                    </div>
                </div>

                <div class="text-center p-t-115">
                    <span class="txt1">
                        Không có tài khoản?
                    </span>

                    <a class="txt2" href="{{ route('register') }}">
                        Đăng ký
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>
@endsection
@section('js')
<script src="{{ asset('js/main.js') }}"></script>
@endsection