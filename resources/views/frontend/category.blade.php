@extends('frontend.layouts.app')

@section('title')
    Thể loại
@endsection

@section('content')
<section>
    <div class="container bg-light">
        <div class="single_product">
            <div class="container-fluid" style=" background-color: #fff; padding: 30px;min-height: 1000px;">
                <div class="row">
                    @foreach ($products as  $product)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="{{url('category/'.$category->id.'/product/'.$product->id)}}">
                                    <img class="default-img" src="@php
                                                                echo(Storage::disk('product-image')->url($product->images[0]->name));
                                                            @endphp" alt="#">
                                </a>
                                {{-- <div class="button-head">
                                    <div class="product-action">
                                        <a data-id= "{{$product->id}}" class="quickshop"><i class="ti-eye"></i><span>Quick Shop</span></a>
                                        
                                    </div>
                                    
                                </div> --}}
                            </div>
                            <div class="product-content">
                                <h3><a style="text-decoration:none; color:black;font-weight:bold;" href="{{url('category/'.$category->id.'/product/'.$product->id)}}">{{$product->name}}</a></h3>
                                <div class="product-price">
                                    <span>{{number_format($product->price)}} đ</span>
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