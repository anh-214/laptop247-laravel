@extends('backend.layouts.app')
@section('title')
    Quản lí linh kiện
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Bảng quản lí linh kiện</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Bảng quản lí linh kiện</li>
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
                <button class="btn btn-success" data-toggle="modal" data-target="#createModal">Thêm linh kiện</button>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên linh kiện</th>
                            <th>Giá</th>
                            <th>Loại</th>
                            <th>Thời gian tạo</th>
                            <th>Thời gian cập nhật</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($accessories as $accessory )
                            <tr>
                                <td>{{$accessory->id}}</td>
                                <td>{{$accessory->name}}</td>
                                <td>{{number_format($accessory->price)}} đ</td>
                                <td>{{$accessory->type}}</td>
                                <td>{{$accessory->created_at}}</td>
                                <td>{{$accessory->updated_at}}</td>
                                <td>                                    
                                    <button class="btn btn-success buttonUpdate" data-id="{{$accessory->id}}" data-name="{{$accessory->name}}" data-price="{{$accessory->price}}" data-type="{{$accessory->type}}">Sửa</button>
                                    <button class="btn btn-danger buttonDelete" data-id="{{$accessory->id}}" data-name="{{$accessory->name}}">Xóa</button>
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
            <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa linh kiện</h5>
            </div>
            <div class="modal-body">
            <form id="deleteForm" method="POST" action="{{url('admin/extend/accessories/delete')}}">
                @csrf
                <div class="mb-3">
                <label for="confirmPasswordDelete" class="col-form-label"><h6>Nhập mật khẩu của bạn để xác nhận xóa linh kiện</h6><span id="confirmCategory"></span></label>
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
            <h5 class="modal-title" id="exampleModalLabel">Thêm linh kiện</h5>
            </div>
            <div class="modal-body">
            <form method="POST" id="createForm" action="{{url('admin/extend/accessories/create')}}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="col-form-label"><h6>Tên linh kiện:</h6></label>
                    <input type="text" class="form-control" id="name" name="name">
                    <div class="invalid-feedback" id="errorName">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="price" class="col-form-label"><h6>Giá:</h6></label>
                    <input type="text" class="form-control" id="price" name="price">
                    <div class="invalid-feedback" id="errorPrice">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="col-form-label"><h6>Loại:</h6></label>
                    <select class="form-control" name="type">
                        <option value="ram">Ram</option>
                        <option value="cpu">Cpu</option>
                        <option value="card">Card</option>
                        <option value="display">Display</option>
                        <option value="harddrive">Hard drive</option>
                    </select>
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
            <form id="updateForm" method="POST" action="{{url('admin/extend/accessories/update')}}">
                @csrf
                <input type="hidden" class="form-control" name="updateId" >
                <div class="mb-3">
                    <label for="name" class="col-form-label"><h6>Tên linh kiện:</h6></label>
                    <input type="text" class="form-control" id="updateName" name="name">
                    <div class="invalid-feedback" id="errorUpdateName">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="price" class="col-form-label"><h6>Giá:</h6></label>
                    <input type="text" class="form-control" id="updatePrice" name="price">
                    <div class="invalid-feedback" id="errorUpdatePrice">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="col-form-label"><h6>Loại:</h6></label>
                    <select class="form-control" name="type">
                        <option value="ram">Ram</option>
                        <option value="cpu">Cpu</option>
                        <option value="card">Card</option>
                        <option value="display">Display</option>
                        <option value="harddrive">Hard drive</option>
                    </select>
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
            let $checkPrice = false
            if ($("#name").val() == ''){
                $("#name").addClass('is-invalid');
                $("#errorName").text('Vui lòng không để trống trường này')
                $checkName = false
            } else {
                $("#name").removeClass('is-invalid');
                $("#errorName").text('')
                $checkName = true
            }
            if ($("#price").val() == ''){
                $("#price").addClass('is-invalid');
                $("#errorPrice").text('Vui lòng không để trống trường này')
                $checkPrice = false
            } else {
                $("#price").removeClass('is-invalid');
                $("#errorPrice").text('')
                $checkPrice = true
            }
            if ($checkName == true && $checkPrice == true){
                $("#createForm").submit();
            }
        })
        // thêm data cho modal
        $(".buttonUpdate").click(function(){
            let $id = $(this).attr('data-id')
            let $name = $(this).attr('data-name')
            let $price = $(this).attr('data-price')
            let $type = $(this).attr('data-type')
            $('input[name=updateId]').val($id)
            $("input[name=name]").val($name)
            $("input[name=price]").val($price)
            $('#updateModal').modal('show')
        })

        $("#buttonUpdate").click(function(){
            let $checkName = false
            let $checkPrice = false
            if ($("#updateName").val() == ''){
                $("#updateName").addClass('is-invalid');
                $("#errorUpdateName").text('Vui lòng không để trống trường này')
                $checkName = false
            } else {
                $("#updateName").removeClass('is-invalid');
                $("#errorUpdateName").text('')
                $checkName = true
            }
            if ($("#updatePrice").val() == ''){
                $("#updatePrice").addClass('is-invalid');
                $("#errorUpdatePrice").text('Vui lòng không để trống trường này')
                $checkPrice = false
            } else {
                $("#updatePrice").removeClass('is-invalid');
                $("#errorUpdatePrice").text('')
                $checkPrice = true
            }
            if ($checkName == true && $checkPrice == true){
                $('#updateForm').submit()
            }
        })
    })
</script>
@endpush