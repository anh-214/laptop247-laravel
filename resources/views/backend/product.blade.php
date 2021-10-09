@extends('backend.layouts.app')
@section('title')
    Quản lí sản phẩm
@endsection
@push('css')
    <style>
        .hint-text{
            width: 5em; /* the element needs a fixed width (in px, em, %, etc) */
            overflow: hidden; /* make sure it hides the content that overflows */
            white-space: nowrap; /* don't break the line */
            text-overflow: ellipsis; /* give the beautiful '...' effect */
        }
    </style>
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Bảng quản lí sản phẩm</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Bảng quản lí sản phẩm</li>
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
                <button class="btn btn-success" onclick="window.location.assign('{{url('admin/products/create')}}')">Thêm sản phẩm</button>

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Loại</th>
                            <th>Ảnh</th>
                            <th>Cpu</th>
                            <th>Ram</th>
                            <th>Ổ cứng</th>
                            <th>Card đồ họa</th>
                            <th>Màn hình</th>
                            <th>Giá</th>
                            <th>Tạo</th>
                            <th>Cập nhật</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product )
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->category->name}}</td>
                                <td class="showImages" data-id="{{$product->id}}" style="cursor: pointer">Xem</td>
                                <td>{{$product->cpu}}</td>
                                <td>{{$product->ram}}</td>
                                <td>{{$product->harddrive}}</td>
                                <td>{{$product->card}}</td>
                                <td>{{$product->display}}</td>
                                <td>{{number_format($product->price)}}đ</td>
                                <td class="hint-text">{{$product->created_at}}</td>
                                <td class="hint-text">{{$product->updated_at}}</td>
                                <td class="d-flex">
                                    <button class="mr-1 btn btn-success buttonUpdate" onclick="window.location.assign('{{url('admin/products/'.$product->id.'/update')}}')">Sửa</button>
                                    <button class="btn btn-danger buttonDelete" data-id="{{$product->id}}" data-name="{{$product->name}}">Xóa</button>
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
    <div class="d-flex justify-content-center">{{$products->links('vendor.pagination.bootstrap-4')}}</div>
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
            <form id="deleteForm" method="POST" action="{{url('admin/products/delete')}}">
                @csrf
                <div class="mb-3">
                <label for="confirmPasswordDelete" class="col-form-label"><h6>Nhập mật khẩu của bạn để xác nhận xóa sản phẩm</h6><span id="confirmCategory"></span></label>
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
{{-- show image product modal --}}
<div class="modal fade p-5" id="showImagesModal" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ảnh sản phẩm</h5>
                
            </div>
            <div class="modal-body pb-3">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" id="closeNotificationModal" data-dismiss="modal" aria-label="Close">Đóng</button>
            </div>
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
    })
</script>
{{-- data for show images --}}
<script>
    $(document).ready(function(){
        $modal = $('#showImagesModal')
        $(".showImages").click(function(){
            $id = $(this).attr('data-id')
            // console.log($id);
            deleteImages('showImagesModal','.carousel-inner')
            deleteImages('showImagesModal','.carousel-indicators')
            $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "/admin/products/getimages",
                    data: {"_token": "{{ csrf_token() }}", 'product_id': $id},
                    success: function(data){
                        let $count = 0;
                        data.forEach(link => {   
                            addImages(link,'.carousel-inner',$count)
                            
                            $count += 1;
                        });
                    }
                });
            $modal.modal('show');
        })
        function deleteImages(modal_id,self_selector){
            $modal = $("#"+modal_id)
            $modal.on('hide.bs.modal',function(){
                $(self_selector).html("")
            });
        }
        function addImages(link,self_selector,count){
            if (count == 0){
                $(self_selector).append(`<div class="carousel-item active">
                                            <img class="d-block w-100" src="`+link+`" alt='`+count+`'>
                                        </div>`)
            } else {
                $(self_selector).append(`<div class="carousel-item ">
                                            <img class="d-block w-100" src="`+link+`" alt='`+count+`'>
                                        </div>`)
            }
        }
    });
</script>
@endpush