@extends('backend.layouts.app')
@section('title')
    Thông tin tài khoản
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Thông tin tài khoản</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
            <li class="breadcrumb-item active">Thông tin tài khoản</li>
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
            <div class="card information">
                <div class="card-header" style="text-align: right">
                    <button class="btn btn-success" id="go-to-update">Cập nhật thông tin</button>
                </div>
                <div class="card-body">
                    <div>
                        <p>Họ và tên: {{$admin->name}}</p>
                        <p>Email: {{$admin->email}}</p>
                        <p>Số điện thoại: {{$admin->phonenumber}}</p>
                    </div>
                </div>
            </div>
            <div class="card updateInformation">
                <div class="card-header" style="text-align: right">
                    <button class="btn btn-danger" id="go-to-info">Quay lại</button>
                </div>
                <div class="card-body">
                    <div>
                        <form id="updateForm" method="POST" action="{{url('admin/information')}}">
                            @csrf
                            <input type="hidden" class="form-control" name="updateId" >
                            <div class="mb-3">
                                <label for="name" class="col-form-label"><h6>Họ và tên:</h6></label>
                                <input type="text" class="form-control" name="name" id="name">
                                <div class="invalid-feedback" id="errorName">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="phonenumber" class="col-form-label"><h6>Số điện thoại:</h6></label>
                                <input type="text" class="form-control" name="phonenumber" id="phonenumber">
                                <div class="invalid-feedback" id="errorPhoneNumber">
                                </div>
                            </div>
                            <div style="text-align: right">
                                <button type="button" class="btn bg-gradient-success" id="buttonUpdate">Cập nhật</button>
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
        $('.updateInformation').hide()
        $('#go-to-update').click(function(){
            $('.information').hide()
            $('.updateInformation').show()
        })
        $('#go-to-info').click(function(){
            $('.updateInformation').hide()
            $('.information').show()
        })
        $("#buttonUpdate").click(function(){
            let $name = $('#name')
            let $phonenumber = $('#phonenumber')
            let $count = 0
            let $regexPhone = /^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/

            if ($("#name").val() == ''){
                $("#name").addClass('is-invalid');
                $("#errorName").text('Vui lòng không để trống trường này')
            } else {
                $("#name").removeClass('is-invalid');
                $("#errorName").text('')
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
                $("#updateForm").submit();
            }
        })
    })
</script>
@endpush