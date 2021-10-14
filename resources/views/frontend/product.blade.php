@extends('frontend.layouts.app')

@section('title')
    Chi tiết sản phẩm
@endsection

@section('content')
<section>
    <div class="container bg-light">
        <div class="single_product">
            <div class="container-fluid" style=" background-color: #fff; padding: 30px;min-height: 1000px;">
                {{--  --}}
                <div class="row">
                    <div class="col-lg-6 order-lg-2 order-1">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @php $count = 0; $images = \App\Models\Product::findOrFail($product->id)->images()->get(); @endphp
                                @foreach ($images as $image)
                                    @if($count == 0)
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="{{Storage::disk('product-image')->url($image->name)}}" alt="{{$count}} slide">
                                        </div>
                                    @else
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="{{Storage::disk('product-image')->url($image->name)}}" alt="{{$count}} slide">
                                        </div>
                                    @endif
                                    @php $count += 1 @endphp
                                @endforeach
                                {{-- <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{Storage::disk('product')->url('7.jpeg')}}" alt="slide">
                                </div> --}}
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-3" style="border-left: 1px solid rgb(172, 172, 172)">
                        <div class="product_description">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                                    <li class="breadcrumb-item active">Chi tiết</li>
                                </ol>
                            </nav>
                            <div class="product_name mt-5">{{$product->name}}</div>
                            {{-- <div class="product-rating"><span class="badge badge-success"><i class="fa fa-star"></i> 4.5 Star</span> <span class="rating-review">35 sao & 45 đánh giá</span></div> --}}
                            <div> <span class="product_price mt-3">{{number_format($product->price)}} đ</span></div>
                            <hr class="singleline">
                            <div class="mt-3">
                                <span class="product_info">CPU: {{$product->cpu}}<span>
                                <br> 
                                <span class="product_info">Ram: {{$product->ram}}<span>
                                <br>
                                <span class="product_info">Màn hình: {{$product->display}}<span>
                                <br> 
                                <span class="product_info">VGA: {{$product->card}}<span>
                                <br> 
                                <span class="product_info">Ổ cứng: {{$product->harddrive}}<span>
                                <br> 
                                {{-- <span class="product_info">FREESHIP NỘI THÀNH HÀ NỘI<span><br> </div> --}}
                            {{-- <div>
                                
                                <div class="row" style="margin-top: 15px;">
                                    <div class="col-xs-6" style="margin-left: 15px;"> <span class="product_options">Tùy chọn Ram</span><br> <button class="btn btn-primary btn-sm">4 GB</button> <button class="btn btn-primary btn-sm">8 GB</button> <button class="btn btn-primary btn-sm">16 GB</button> </div>
                                    <div class="col-xs-6" style="margin-left: 55px;"> <span class="product_options">Tùy chọn ổ cứng</span><br> <button class="btn btn-primary btn-sm">500 GB</button> <button class="btn btn-primary btn-sm">1 TB</button> </div>
                                </div> --}}
                            </div>
                            <hr class="singleline">
                            <div class="row">
                                <div class="col-xs-6 mt-3" style="margin-left: 13px; display:flex;align-items:center;border-radius:20px;padding:10px">
                                    {{-- <div class="product_quantity"> <span>Số lượng: </span> <input id="quantity_input" type="number">
                                    </div> --}}
                                    <div  class="col-xs-6" style="margin-left: 20px"> 
                                        <button id="addToCart" data-id="{{$product->id}}" type="button" class="btn btn-primary shop-button">Thêm vào giỏ hàng</button> 
                                        <button type="button" class="btn btn-success shop-button">Mua ngay</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                {{--  --}}

                <div class="row row-underline">
                    <div class="col-md-6"> <span class=" deal-text">Sản phẩm khác</span> </div>
                    <div class="col-md-6"> <a href="#" data-abc="true"> <span class="ml-auto view-all"></span> </a> </div>
                </div>
                <div class="row">
                            @foreach ($randoms as $random )
                            <div class="col-md-3 padding-0">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{url('category/'.$category->id.'/product/'.$random->id)}}">
                                            <img class="default-img" src="@php
                                                                        echo(Storage::disk('product-image')->url($random->images[0]->name));
                                                                    @endphp" alt="#">
                                        </a>
                                        <div class="product-content">
                                            <h3><a style="text-decoration:none; color:black;font-weight:bold;" href="{{url('category/'.$category->id.'/product/'.$random->id)}}">{{$random->name}}</a></h3>
                                            <div class="product-price">
                                                <span>{{number_format($random->price)}} đ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
    <script>
        $(document).ready(function(){
            $('#addToCart').click(function(){
            let id = $(this).attr('data-id');
        
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{url('add-to-cart')}}",
                    data: {"_token": "{{ csrf_token() }}", 'id': id},
                    success: function(data){
                        if (data.result == 'success'){
                            window.location.reload()
                        }
                    }
                })
            
            })
            $('.remove').click(function(){
            let id = $(this).attr('data-id');
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{url('remove-from-cart')}}",
                    data: {"_token": "{{ csrf_token() }}", 'id': id},
                    success: function(data){
                        if (data.result == 'success'){
                            window.location.reload()
                        }
                    }
                })
	        })
        });
    </script>
@endpush