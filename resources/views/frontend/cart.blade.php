@extends('frontend.layouts.app')

@section('title')
    Giỏ hàng
@endsection
@push('css')
    <style>
        
.cart-item-thumb {
    display: block;
    width: 10rem
}

.cart-item-thumb>img {
    display: block;
    width: 100%
}

.product-card-title>a {
    color: #222;
}

.font-weight-semibold {
    font-weight: 600 !important;
}

.product-card-title {
    display: block;
    margin-bottom: .75rem;
    padding-bottom: .875rem;
    border-bottom: 1px dashed #e2e2e2;
    font-size: 1rem;
    font-weight: normal;
}

.text-muted {
    color: #888 !important;
}

.bg-secondary {
    background-color: #f7f7f7 !important;
}

.accordion .accordion-heading {
    margin-bottom: 0;
    font-size: 1rem;
    font-weight: bold;
}
.font-weight-semibold {
    font-weight: 600 !important;
}
    </style>
@endpush
@section('content')
<div class="container bg-light">
    <div class="row">
        <div class="col-xl-9 col-md-8">
            <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-secondary"><span>Giỏ hàng</span><a class="font-size-sm" style="text-decoration:none;cursor:pointer" type onclick="window.location.assign('{{url('home')}}')" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left" style="width: 1rem; height: 1rem;"><polyline points="15 18 9 12 15 6"></polyline></svg>Tiếp tục mua hàng</a></h2>
            <!-- Item-->
            @php $total = 0;@endphp
            @foreach ( $cart as $id => $details )
            @php $total += $details['price'] * $details['quantity'] @endphp
            <div class="d-sm-flex justify-content-between my-4 pb-4 border-bottom">
                <div class="media d-block d-sm-flex text-center text-sm-left">
                    <a class="cart-item-thumb mx-auto mr-sm-4" href="
                    @php $category_id = \App\Models\Product::where('id',$id)->first()->category_id; 
                    @endphp
                    {{url('category/'.$category_id.'/product/'.$id)}}"><img src="{{$details['image']}}" alt="Product"></a>
                    <div class="media-body pt-3">
                        <h3 class="product-card-title font-weight-semibold border-0 pb-0"><a href="
                        @php $category_id = \App\Models\Product::where('id',$id)->first()->category_id; 
                        @endphp
                        {{url('category/'.$category_id.'/product/'.$id)}}
                        ">{{$details['name']}}</a></h3>
                        <div class="font-size-lg text-primary pt-2">{{$details['quantity']}} x {{number_format($details['price'])}} đ</div>
                        <div class="font-size-lg text-primary pt-2">= {{number_format($details['price'] * $details['quantity'])}} đ</div>
                    </div>
                </div>
                <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left" style="max-width: 10rem;">
                    <form method="POST" action="{{url('update-cart')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$id}}">
                        <div class="form-group mb-2">
                            <label for="quantity1">Số lượng</label>
                            <input class="form-control form-control-sm" type="number" name="quantity" id="quantity1" value="{{$details['quantity']}}">
                        </div>
                        <button type="submit" class="btn btn-outline-secondary btn-sm btn-block mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw mr-1">
                                <polyline points="23 4 23 10 17 10"></polyline>
                                <polyline points="1 20 1 14 7 14"></polyline>
                                <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                            </svg>
                            Cập nhật
                        </button>
                    </form>
                    <button class="btn btn-outline-danger btn-sm btn-block mb-2 buttonRemove" type="button" data-id= "{{$id}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mr-1">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                        </svg>
                        Xóa
                    </button>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Sidebar-->
        <div class="col-xl-3 col-md-4 pt-3 pt-md-0">
            <div class="pt-4">
                <div class="accordion" id="cart-accordion">
                    <div class="card mb-4">
                            <div class="card-body">
                                <form class="needs-validation" novalidate="">
                                    <div class="form-group">
                                        <label for="">Số điện thoại</label>
                                        <input class="form-control" type="text" id="cart-promocode" placeholder="" required="" value="{{Auth::guard('web')->user()->phonenumber}}">
                                        <div class="invalid-feedback">Không để trống !</div>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="shipType" id="flexRadioDefault1" checked value="1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Ship Cod
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="shipType" id="flexRadioDefault2" value="2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Thanh toán qua thẻ
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control custom-select" required="" id="provinces">
                                            <option value="">Chọn tỉnh/ thành phố</option>
                                            @foreach ($provinces as  $province)
                                                <option value="{{$province->id}}">{{$province->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">Please choose your country!</div>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control custom-select" required="" id="districts">
                                            <option value="">Chọn quận/ huyện</option>
                                        </select>
                                        <div class="invalid-feedback">Please choose your city!</div>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control custom-select" required="" id="wards">
                                            <option value="">Chọn xã/ phường</option>
                                            
                                        </select>
                                        <div class="invalid-feedback">Please choose your city!</div>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Số nhà, đường ..." required="">
                                        <div class="invalid-feedback">Please provide a valid zip!</div>
                                    </div>
                                    <button class="btn btn-outline-primary btn-block" type="submit">Đặt hàng</button>
                                    {{-- <button class="btn btn-outline-primary btn-block" type="submit">Áp dụng</button> --}}
                                </form>
                            </div>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
            <hr>
            <h2 class="h6 px-4 bg-secondary text-center">Tổng đơn hàng</h2>
            <div class="h3 font-weight-semibold text-center pb-5">{{number_format($total)}} đ</div>
            
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $(document).ready(function(){
        $('.buttonRemove').click(function(){
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
        $('#provinces').change(function(){
                let select = document.getElementById("districts");
                let length = select.options.length;
                for (i = length-1; i >= 0; i--) {
                    select.options[i] = null;
                }
                let select1 = document.getElementById("wards");
                let length1 = select1.options.length;
                for (i = length1-1; i >= 0; i--) {
                    select1.options[i] = null;
                }
                $("#districts").append(new Option('Chọn quận/ huyện', ''));
                $("#wards").append(new Option('Chọn xã/ phường', ''));
                let $province_id = $(this).val();
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "/getdistricts",
                    data: {"_token": "{{ csrf_token() }}", 'province_id': $province_id},
                    success: function(data){
                        data.forEach(element => {
                            // addOption(element.id,element.name)
                            $("#districts").append(new Option(element.name, element.id));
                        });
                    }
                });
        })
        $('#districts').change(function(){
                let select = document.getElementById("wards");
                let length = select.options.length;
                for (i = length-1; i >= 0; i--) {
                    select.options[i] = null;
                }
                $("#wards").append(new Option('Chọn xã/ phường', ''));
                let $district_id = $(this).val();
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "/getwards",
                    data: {"_token": "{{ csrf_token() }}", 'district_id': $district_id},
                    success: function(data){
                        data.forEach(element => {
                            // addOption(element.id,element.name)
                            $("#wards").append(new Option(element.name, element.id));
                        });
                    }
                });
        })
    });
</script>
@endpush