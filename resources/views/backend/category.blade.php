@extends('backend.layouts.app')
@section('title')
    Quản lí thể loại
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Bảng quản lí thể loại</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Bảng quản lí thể loại</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                {{-- <h3 class="card-title"></h3> --}}
                <button class="btn btn-success" data-toggle="modal" data-target="#createModal">Thêm thể loại</button>

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên thể loại</th>
                            <th>Mô tả</th>
                            <th>Thời gian tạo</th>
                            <th>Thời gian cập nhật</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category )
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->desc}}</td>
                                <td>{{$category->created_at}}</td>
                                <td>{{$category->updated_at}}</td>
                                <td class="d-flex">
                                        <button class="btn btn-primary" onclick="window.location.assign('{{url('admin/categories/'.$category->id.'/createproduct')}}')">Thêm sản phẩm</button>
                                        <button class="btn btn-success buttonUpdate" data-id="{{$category->id}}" data-name="{{$category->name}}" data-desc="{{$category->desc}}">Sửa</button>
                                        <button class="btn btn-danger buttonDelete" data-id="{{$category->id}}" data-name="{{$category->name}}">Xóa</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- /.card -->
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
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa thể loại</h5>
            </div>
            <div class="modal-body">
            <form id="deleteForm" method="POST" action="{{url('admin/categories/delete')}}">
                @csrf
                <div class="mb-3">
                <label for="confirmPasswordDelete" class="col-form-label"><h6>Nhập mật khẩu của bạn để xác nhận xóa thể loại</h6><span id="confirmCategory"></span><h6>(Sản phẩm của thể loại cũng sẽ bị xóa)</h6></label>
                <input type="text" class="form-control" name="confirmPasswordDelete">
                <div class="invalid-feedback" id="errorPasswordDelete">
                </div>
                <input type="hidden" class="form-control" name="deleteId" >
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                <button type="button" class="btn bg-gradient-danger" id="buttonConfirmDelete">Xác nhận</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

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
{{-- modal create --}}
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm thể loại</h5>
            </div>
            <div class="modal-body">
            <form method="POST" id="createForm" action="{{url('admin/categories/create')}}">
                @csrf
                <div class="mb-3">
                    <label for="confirmPasswordDelete" class="col-form-label"><h6>Tên:</h6></label>
                    <input type="text" class="form-control" id="nameCreateCategory" name="name">
                    <div class="invalid-feedback" id="errorCreateName">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="confirmPasswordDelete" class="col-form-label"><h6>Mô tả:</h6></label>
                    <input type="text" class="form-control" id="descCreateCategory" name="desc">
                    <div class="invalid-feedback" id="errorCreateDesc">
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn bg-gradient-success" id="buttonCreate">Tạo</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
{{-- modal update --}}
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cập nhật thể loại</h5>
            </div>
            <div class="modal-body">
            <form id="updateForm" method="POST" action="{{url('admin/categories/update')}}">
                @csrf
                <input type="hidden" class="form-control" name="updateId" >
                <div class="mb-3">
                    <label for="confirmPasswordDelete" class="col-form-label"><h6>Tên:</h6><span id="confirmCategory"></span></label>
                    <input type="text" class="form-control" name="name">
                    <div class="invalid-feedback" id="errorName">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="confirmPasswordDelete" class="col-form-label"><h6>Mô tả:</h6><span id="confirmCategory"></span></label>
                    <input type="text" class="form-control" name="desc">
                    <div class="invalid-feedback" id="errorDesc">
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                <button type="button" class="btn bg-gradient-success" id="buttonUpdate">Cập nhật</button>
                </div>
            </form>
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
        $('.buttonDelete').click(function(){
            $id = $(this).attr('data-id');
            $name = $(this).attr('data-name');
            $('input[name=deleteId]').val($id)
            $('#confirmCategory').text($name)
            $('#confirmDeleteModal').modal('show')
        })
        $('#buttonConfirmDelete').click(function(){
            if ($('input[name=confirmPasswordDelete]').val() == ''){
                $('input[name=confirmPasswordDelete]').addClass('is-invalid');
                $('#errorPasswordDelete').text('Vui lòng không để trống trường này');
            } else {
                $('input[name=confirmPasswordDelete]').removeClass('is-invalid');
                $('#errorPasswordDelete').text('');
                $('#deleteForm').submit();
            }
        })
        $("#buttonCreate").click(function(){
            let $checkName = false
            let $checkDesc = false
            if ($("#nameCreateCategory").val() == ''){
                $("#nameCreateCategory").addClass('is-invalid');
                $("#errorCreateName").text('Vui lòng không để trống trường này')
                $checkName = false
            } else {
                $("#nameCreateCategory").removeClass('is-invalid');
                $("#errorCreateName").text('')
                $checkName = true
            }
            if ($("#descCreateCategory").val() == ''){
                $("#descCreateCategory").addClass('is-invalid');
                $("#errorCreateDesc").text('Vui lòng không để trống trường này')
                $checkDesc = false
            } else {
                $("#descCreateCategory").removeClass('is-invalid');
                $("#errorCreateDesc").text('')
                $checkDesc = true
            }
            if ($checkName == true && $checkDesc == true){
                $("#createForm").submit();
            }
        })
        $(".buttonUpdate").click(function(){
            let $id = $(this).attr('data-id')
            let $name = $(this).attr('data-name')
            let $desc = $(this).attr('data-desc')
            $('input[name=updateId]').val($id)
            $("input[name=name]").val($name)
            $("input[name=desc]").val($desc)
            $('#updateModal').modal('show')
        })

        $("#buttonUpdate").click(function(){
            let $checkName = false
            let $checkDesc = false
            if ($("#nameCategory").val() == ''){
                $("#nameCategory").addClass('is-invalid');
                $("#errorName").text('Vui lòng không để trống trường này')
                $checkName = false
            } else {
                $("#nameCategory").removeClass('is-invalid');
                $("#errorName").text('')
                $checkName = true
            }
            if ($("#descCategory").val() == ''){
                $("#descCategory").addClass('is-invalid');
                $("#errorDesc").text('Vui lòng không để trống trường này')
                $checkDesc = false
            } else {
                $("#descCategory").removeClass('is-invalid');
                $("#errorDesc").text('')
                $checkDesc = true
            }
            if ($checkName == true && $checkDesc == true){
                $('#updateForm').submit()
            }
        })
    })
</script>
@endpush