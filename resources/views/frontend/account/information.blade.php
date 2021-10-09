@extends('frontend.layouts.app')

@section('title')
    Thông tin tài khoản
@endsection
@push('css')
<style>
    .box{
        margin: auto;
        width:300px;color:white;
        text-align:center;
        padding:15px 0 5px 0;
        min-height: 250px;
    }
    .container-info {
        background-color: white;
        height: 60%;
        padding: 30px 6% 30px 6%;
    }
    .title-info {
        border-bottom: 1px solid black;
        text-align: center;
        color: #3f3fb6;
    }
</style>
@endpush
@section('content')
<section>
    <div class="container container-info">
        <div class="title-info">
            <h2>Thông tin tài khoản</h2>
        </div>
        <div>
            <div class="showinformation mt-5">
                <div>
                    <div class="mt-1">        
                        <span>Họ và tên: {{Auth::guard('web')->user()->name}}</span>
                    </div>
                    <div class="mt-1">    
                        <span>Email: {{Auth::guard('web')->user()->email}}</span>
                    </div>
                    <div class="mt-1">
                        <span>Số điện thoại: {{Auth::guard('web')->user()->phonenumber}}</span>
                    </div>
                    <button id="btn-to-change-info" class="btn custom-button-color mt-4">Thay đổi thông tin</button>
                </div>
            </div>
            <div class="changeinfomation mt-5">
                <form style="margin-top:20px " method="POST" action="{{url('user/information')}}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Họ và tên</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên của bạn">
                        <div class="invalid-feedback" id="errorName">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phonenumber">Số điện thoại</label>
                        <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Nhập số điện thoại của bạn">
                        <div class="invalid-feedback" id="errorPhoneNumber">
                        </div>
                    </div>
                    <div class="btn-login" style="text-align: center">
                        <button type="button" class="btn custom-button-color" id="btn-update" style="margin: 10px 0 10px 0;border: 1px solid white">Cập nhật thông tin</button>
                        <button type="button" class="btn custom-button-color" id="btn-back" style="margin: 10px 0 10px 0;border: 1px solid white">Quay lại</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
$@push('js')
    <script>
        $(document).ready(function(){
            
            $('.changeinfomation').hide();
            $('#btn-to-change-info').click(function(){
                $('.showinformation').hide();
                $('.changeinfomation').show();
            })
            $('#btn-update').click(function(){
                let $name = $('#name')
                let $phonenumber = $('#phonenumber')
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
                if ($phonenumber.val() == ''){
                    $phonenumber.addClass('is-invalid')
                    $('#errorPhoneNumber').text('Vui lòng không để trống trường này')
                } else if ($regexPhone.test($phonenumber.val()) == false){
                    $phonenumber.addClass('is-invalid')
                    $("#errorPhoneNumber").text("Nhập đúng định dạng số điện thoại")
                } else {
                    $phonenumber.removeClass('is-invalid')
                    $('#errorPhoneNumber').text('')
                    $count += 1
                }
                if ($count == 2){
                    $('form').submit();
                }
            })
            $('#btn-back').click(function(){
                $('.changeinfomation').hide();
                $('.showinformation').show();
            })
        })
    </script>
@endpush
