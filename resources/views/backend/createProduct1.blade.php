@extends('backend.layouts.app')
@section('title')
    Thêm sản phẩm
@endsection
@push('css')
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Thêm sản phẩm</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Thêm sản phẩm</li>
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
            <div class="card-body">
                <form id="createForm" method="POST" action="{{url('admin/products/create')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="col-form-label"><h6>Chọn thể loại:</h6></label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback" id="errorName">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="col-form-label"><h6>Tên:</h6></label>
                        <input type="text" class="form-control" id="name" name="name">
                        <div class="invalid-feedback" id="errorName">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="images" class="col-form-label"><h6>Hình ảnh:</h6></label>
                        <div class="custom-file">
                            {{-- <input type="file" class="form-control" id="images" name="images"> --}}
                            <input type="file" name="images[]" class="custom-file-input" id="images" aria-describedby="inputGroupFileAddon01" multiple>
                            <label class="custom-file-label" for="images">Chọn file</label>
                            <div class="invalid-feedback" id="errorImages">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="cpu" class="col-form-label"><h6>Cpu:</h6></label>
                            <input type="text" class="form-control" id="cpu" name="cpu">
                            <div class="invalid-feedback" id="errorCpu">
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="ram" class="col-form-label"><h6>Ram:</h6></label>
                            <input type="text" class="form-control" id="ram" name="ram">
                            <div class="invalid-feedback" id="errorRam">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="harddrive" class="col-form-label"><h6>Ổ cứng:</h6></label>
                            <input type="text" class="form-control" id="harddrive" name="harddrive">
                            <div class="invalid-feedback" id="errorHardDrive">
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="card" class="col-form-label"><h6>Card đồ họa:</h6></label>
                            <input type="text" class="form-control" id="card" name="card">
                            <div class="invalid-feedback" id="errorCard">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="display" class="col-form-label"><h6>Màn hình:</h6></label>
                            <input type="text" class="form-control" id="display" name="display">
                            <div class="invalid-feedback" id="errorDisplay">
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="price" class="col-form-label"><h6>Giá:</h6></label>
                            <input type="number" class="form-control" id="price" name="price">
                            <div class="invalid-feedback" id="errorPrice">
                            </div>
                        </div>
                    </div>
                    <div style="text-align: right">
                        <button class="btn btn-primary" type="button" id="buttonCreate">Thêm</button>

                    </div>
                </form>
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
        $('.buttonDelete').click(function(){
            $id = $(this).attr('data-id');
            $name = $(this).attr('data-name');
            $('input[name=deleteId]').val($id)
            $('#confirmCategory').text($name)
            $('#confirmDeleteModal').modal('show')
        })
        $(".select2").select2({
            tags: true,
            tokenSeparators: [','],
            theme: "classic"
        });
        $("#buttonCreate").click(function(){
            let $count = 0
            if ($("#name").val() == ''){
                $("#name").addClass('is-invalid');
                $("#errorName").text('Vui lòng không để trống trường này')
            } else {
                $("#name").removeClass('is-invalid');
                $("#errorName").text('')
                $count += 1
            }
            if ($("#cpu").val() == ''){
                $("#cpu").addClass('is-invalid');
                $("#errorCpu").text('Vui lòng không để trống trường này')
                
            } else {
                $("#cpu").removeClass('is-invalid');
                $("#errorCpu").text('')
                $count += 1
            }

            if ($("#ram").val() == ''){
                $("#ram").addClass('is-invalid');
                $("#errorRam").text('Vui lòng không để trống trường này')
                
            } else {
                $("#ram").removeClass('is-invalid');
                $("#errorRam").text('')
                $count += 1
            }
            if ($("#harddrive").val() == ''){
                $("#harddrive").addClass('is-invalid');
                $("#errorHardDrive").text('Vui lòng không để trống trường này')
                
            } else {
                $("#harddrive").removeClass('is-invalid');
                $("#errorHardDrive").text('')
                $count += 1
            }
            if ($("#card").val() == ''){
                $("#card").addClass('is-invalid');
                $("#errorCard").text('Vui lòng không để trống trường này')
                
            } else {
                $("#card").removeClass('is-invalid');
                $("#errorCard").text('')
                $count += 1
            }
            if ($("#display").val() == ''){
                $("#display").addClass('is-invalid');
                $("#errorDisplay").text('Vui lòng không để trống trường này')
                
            } else {
                $("#display").removeClass('is-invalid');
                $("#errorDisplay").text('')
                $count += 1
            }
            if ($("#price").val() == ''){
                $("#price").addClass('is-invalid');
                $("#errorPrice").text('Vui lòng không để trống trường này')
                
            } else {
                $("#price").removeClass('is-invalid');
                $("#errorPrice").text('')
                $count += 1
            }
            if ($("#images").val() == ''){
                $("#images").addClass('is-invalid');
                $("#errorImages").text('Vui lòng không để trống trường này')
                
            } else {
                $("#images").removeClass('is-invalid');
                $("#errorImages").text('')
                $count += 1
            }
            if ($count == 8){
                $("#createForm").submit();
            }
        })
    })
</script>
@endpush