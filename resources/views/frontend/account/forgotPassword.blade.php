@extends('frontend.layouts.app')

@section('title')
    Quên mật khẩu
@endsection

@section('content')
<section>
    <div class="container bg-light py-5">
        <div class="form-register">
            <div style="text-align: center; padding-top:25px">
                <h2>Quên mật khẩu</h2>
            </div>
            <form style="margin-top:20px " method="POST" action="{{url('user/forgotpassword')}}">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Nhập email của bạn">
                    <div class="invalid-feedback" id="errorEmail">
                    </div>
                </div>
                <div style="text-align: center">
                    <button type="button" id="btn-register" class="btn custom-button-color" style="margin: 10px 0 10px 0; border:1px solid white">Lấy mật khẩu</button>
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
                let $email = $('#email')
                let $regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/

                if ($email.val() == ''){
                    $email.addClass('is-invalid')
                    $('#errorEmail').text('Vui lòng không để trống trường này')
                } else if ($regexEmail.test($email.val()) == false){
                        $email.addClass('is-invalid')
                        $("#errorEmail").text("Nhập đúng định dạng email")
                } else{
                    $email.removeClass('is-invalid')
                    $('#errorEmail').text('')
                    $('form').submit();
                }
            })
        })
    </script>
@endpush