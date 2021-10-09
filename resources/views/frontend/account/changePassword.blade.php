@extends('frontend.layouts.app')

@section('title')
    Đổi mật khẩu
@endsection

@section('content')
<section>
    <div class="container-register">
        <div class="form-register">
            <div style="text-align: center; padding-top:25px">
                <h2>Đổi mật khẩu</h2>
            </div>
            <form style="margin-top:20px " method="POST" action="{{url('user/changepassword')}}">
                @csrf
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="text" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu của bạn">
                    <div class="invalid-feedback" id="errorPassword">
                    </div>
                </div>
                <div class="form-group">
                    <label for="newpassword">Mật khẩu mới</label>
                    <input type="text" class="form-control" id="newpassword" name="newpassword" placeholder="Nhập mật khẩu mới của bạn">
                    <div class="invalid-feedback" id="errorNewPassword">
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirmnewpassword">Nhập lại mật khẩu mới</label>
                    <input type="text" class="form-control" id="confirmnewpassword" name="confirmnewpassword" placeholder="Nhập lại mật khẩu mới của bạn">
                    <div class="invalid-feedback" id="errorConfirmNewPassword">
                    </div>
                </div>
                <div style="text-align: center">
                    <button type="button" id="btn-register" class="btn custom-button-color" style="margin: 10px 0 10px 0; border:1px solid white">Đổi mật khẩu</button>
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
                let $password = $('#password')
                let $newpassword = $('#newpassword')
                let $confirmnewpassword = $('#confirmnewpassword')
                let $count = 0
                if ($password.val() == ''){
                    $password.addClass('is-invalid')
                    $('#errorPassword').text('Vui lòng không để trống trường này')
                } else {
                    $password.removeClass('is-invalid')
                    $('#errorPassword').text('')
                    $count += 1
                }
                if ($newpassword.val() == ''){
                    $newpassword.addClass('is-invalid')
                    $('#errorNewPassword').text('Vui lòng không để trống trường này')
                } else {
                    $newpassword.removeClass('is-invalid')
                    $('#errorNewPassword').text('')
                    if ($confirmnewpassword.val() != $newpassword.val()){
                        $confirmnewpassword.addClass('is-invalid')
                        $('#errorConfirmNewPassword').text('Mật khẩu mới phải giống nhau')
                    } else {
                        $confirmnewpassword.removeClass('is-invalid')
                        $('#errorConfirmNewPassword').text('')
                        $count += 1
                    }
                }
                if ($count == 2){
                    // alert('ok')
                    $('form').submit();
                }
            })
        })
    </script>
@endpush