@extends('frontend.layouts.app')

@section('title')
    Đăng nhập
@endsection
@push('css')
    <style>

    </style>
@endpush
@section('content')
<section>
    <div class="container bg-light py-5">
        <div class="form-login">
            <div style="text-align: center;padding-top:50px">
                <h2>Đăng Nhập</h2>
            </div>
            <form style="margin-top:20px " method="POST" action="{{url('user/login')}}">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Nhập email của bạn">
                    <div class="invalid-feedback" id="errorEmail">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="text" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu của bạn">
                    <div class="invalid-feedback" id="errorPassword">
                    </div>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="rememberMe" checked="" name="remember">
                    <label class="form-check-label" for="rememberMe">Ghi nhớ đăng nhập</label>
                </div>
                <div class="btn-login" style="text-align: center">
                    <button type="button" class="btn custom-button-color" id="btn-login" style="margin: 10px 0 10px 0;border: 1px solid white">Đăng nhập</button>
                    <p>Bạn Chưa Có Tài Khoản? <a href="{{url('user/register')}}">Đăng Ký</a></p>
                    <a href="{{url('user/forgotpassword')}}">Quên mật khẩu</a>

                </div>
            </form>
        </div>
    </div>

</section>
@endsection
@push('js')
    <script>
        $(document).ready(function(){
           
            $('#btn-login').click(function(){
                let $email = $('#email')
                let $password = $('#password')
                let $regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
                let $count = 0

                if ($email.val() == ''){
                    $email.addClass('is-invalid')
                    $('#errorEmail').text('Vui lòng không để trống trường này')

                } else if ($regexEmail.test($email.val()) == false){
                        $email.addClass('is-invalid')
                        $("#errorEmail").text("Nhập đúng định dạng email")
                } else{
                    $email.removeClass('is-invalid')
                    $('#errorEmail').text('')
                    $count += 1
                }
                
                if ($password.val() == ''){
                    $password.addClass('is-invalid')
                    $('#errorPassword').text('Vui lòng không để trống trường này')
                } else {
                    $password.removeClass('is-invalid')
                    $('#errorPassword').text('')
                    $count += 1
                }
                if ($count == 2){
                    $('form').submit();
                }
            })
        })
    </script>
@endpush