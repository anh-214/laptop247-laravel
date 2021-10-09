@extends('backend.layouts.app')
@section('title')
    Đổi mật khẩu
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Đổi mật khẩu</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
            <li class="breadcrumb-item active">Đổi mật khẩu</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="card updateInformation">
                <div class="card-header">
                    {{-- <button class="btn btn-danger" id="go-to-info">Quay lại</button> --}}
                </div>
                <div class="card-body">
                    <div>
                        <form method="POST" action="{{url('admin/changepassword')}}">
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
                            <div style="text-align: right">
                                <button type="button" id="btn-changePassword" class="btn btn-primary">Đổi mật khẩu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
{{-- modal delete --}}

{{-- modal notification --}}
<div class="modal fade" id="notificationModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Thông báo</h5>
            </div>
            <div class="modal-body" id="textNotificationModal">
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" id="closeNotificationModal" data-dismiss="modal" aria-label="Close">Đóng</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $(document).ready(function(){
        @if(session()->has('success'))
            $("#textNotificationModal").text("{{session('success')}}")
            $("#notificationModal").modal('show')
        @endif
        @if(session()->has('failed'))
            $("#textNotificationModal").text("{{session('failed')}}")
            $("#notificationModal").modal('show')
        @endif
        $('#btn-changePassword').click(function(){
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