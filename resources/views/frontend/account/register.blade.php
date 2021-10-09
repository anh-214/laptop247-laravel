@extends('frontend.layouts.app')

@section('title')
    Đăng Ký
@endsection

@section('content')
<section>
    <div class="container bg-light py-5">
        <div class="form-register">
            <div style="text-align: center; padding-top:25px">
                <h2>Đăng Ký</h2>
            </div>
            <form style="margin-top:20px " method="POST" action="{{url('user/register')}}">
                @csrf
                <div class="form-group">
                    <label for="name">Họ và tên</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nhập Tên của bạn">
                    <div class="invalid-feedback" id="errorName">  
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Nhập email của bạn">
                    <div class="invalid-feedback" id="errorEmail">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phonenumber">Số điện thoại</label>
                    <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Nhập số điện thoại của bạn">
                    <div class="invalid-feedback" id="errorPhoneNumber">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="text" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu của bạn">
                    <div class="invalid-feedback" id="errorPassword">
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirmpassword">Nhập lại mật khẩu</label>
                    <input type="text" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Nhập lại mật khẩu của bạn">
                    <div class="invalid-feedback" id="errorConfirmPassword">
                    </div>
                </div>
                <div class="btn-login" style="text-align: center">
                    <button type="button" id="btn-register" class="btn custom-button-color" style="margin: 10px 0 10px 0; border:1px solid white">Đăng ký</button>
                    <p>Bạn Đã Có Tài Khoản? <a href="{{url('/user/login')}}">Đăng Nhập</a></p>
                </div>
            </form>
        </div>
    </div>
</section>
    
@endsection
@push('js')
    <script>
        $(document).ready(function(){
           
            $('#btn-register').click(function(){
                let $name = $('#name')
                let $email = $('#email')
                let $phonenumber = $('#phonenumber')
                let $password = $('#password')
                let $confirmpassword = $('#confirmpassword')
                let $regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
                let $regexPhone = /^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/
                let $count = 0
                if ($name.val() == ''){
                    $name.addClass('is-invalid')
                    $('#errorName').text('Vui lòng không để trống trường này')
                } else {
                    $name.removeClass('is-invalid')
                    $('#errorName').text('')
                    $count += 1
                }

                if ($email.val() == ''){
                    $email.addClass('is-invalid')
                    $('#errorEmail').text('Vui lòng không để trống trường này')
                } else if ($regexEmail.test($email.val()) == false){
                    $email.addClass('is-invalid')
                    $("#errorEmail").text("Nhập đúng định dạng email")
                    $checkEmail = false 
                } else {
                    $email.removeClass('is-invalid')
                    $('#errorEmail').text('')
                    $count += 1
                }

                if ($phonenumber.val() == ''){
                    $phonenumber.addClass('is-invalid')
                    $('#errorPhoneNumber').text('Vui lòng không để trống trường này')
                } else if ($regexPhone.test($phonenumber.val()) == false){
                    $phonenumber.addClass('is-invalid')
                    $("#errorPhoneNumber").text("Nhập đúng định dạng số điện thoại")
                    $checkPhone = false
                } else {
                    $phonenumber.removeClass('is-invalid')
                    $('#errorPhoneNumber').text('')
                    $count += 1
                }

                if ($password.val() == ''){
                    $password.addClass('is-invalid')
                    $('#errorPassword').text('Vui lòng không để trống trường này')
                } else {
                    $password.removeClass('is-invalid')
                    $('#errorPassword').text('')
                    if ($confirmpassword.val() != $password.val()){
                        $confirmpassword.addClass('is-invalid')
                        $('#errorConfirmPassword').text('Mật khẩu phải giống nhau')
                    } else {
                        $confirmpassword.removeClass('is-invalid')
                        $('#errorConfirmPassword').text('')
                        $count += 1
                    }
                }
                if ($count == 4){
                    $('form').submit();
                }
            })
        })
    </script>
@endpush