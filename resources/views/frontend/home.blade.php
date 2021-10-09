@extends('frontend.layouts.app')

@section('title')
    Trang chủ
@endsection
@push('css')
    <style>
        .head_top {
            background-repeat: no-repeat;
            padding-top: 50px;
            padding-bottom: 150px;
        }
        .text-bg {
            text-align: left;
            max-width: 429px;
            width: 100%;
            float: right;
            padding-top: 190px;
            padding-bottom: 50px;
        }

        .text-bg h1 {
            color: #2d2c2c;
            font-size: 67px;
            line-height: 90px;
            padding-bottom: 70px;
            font-weight: bold;
        }

        .text-bg strong {
            font-size: 27px;
            line-height: 35px;
            color: #2d2c2c;
        }

        .text-bg span {
            font-family: 'Baloo Chettan', cursive;
            color: #2bcc91;
            font-size: 40px;
            line-height: 77px;
            font-weight: bold;
            padding-bottom: 20px;
            display: block;
        }

        .text-bg a {
            font-size: 17px;
            background-color: #2d2c2c;
            color: #fff;
            padding: 13px 0px;
            width: 100%;
            max-width: 190px;
            text-align: center;
            display: inline-block;
            transition: ease-in all 0.5s;
            border-radius: 15px;
        }

        .text-bg a:hover {
            background-color: #2bcc91;
            color: #fff;
            transition: ease-in all 0.5s;
            border-radius: 26px;
            text-decoration: none;
        }
        .text-img {
        height: 750px;
        background: linear-gradient(to bottom, #5c89e9 0%, #3b5998 100%);
        border-radius: 322px 0px 0px 380px;
        padding: 132px 20px 0px 50px;
        }   

        .text-img figure {
            margin: 0px;
        }

        .text-img figure img {
            width: 100%;
        }

        .text-img figure {position: relative;}
        .text-img h3 {
        top: 387px;
        position: absolute;
        align-items: center;
        left: -14px;
        background: #000;
        width: 60px;
        height: -1px;

        border-radius: 72px;
        color: #fff;
        padding: 7px 12px;
        font-size: 21px;
            border: #3b5998 solid 7px;
        }
        .padding_right1 {
            padding-right: 0;
        }
        .banner_main{
            background-image: none;
        }
    </style>
@endpush
@section('content')
    <div class="container bg-light">
        <div class="head_top">
            <section class="banner_main">
                <div class="container-fluid">
                    <div class="row d_flex">
                        <div class="col-md-5">
                            <div class="text-bg mt-5">
                            <h3>Laptop Asus ROG Strix G15 G512-IHN281T - Intel Core i7</h3>
                            {{-- <strong>Laptop247</strong> --}}
                            <p>[Mới 100% Full Box]</p>
                            <a id="muangay" href="{{url('category/1')}}">Mua ngay</a>
                            </div>
                        </div>
                        <div class="col-md-7 padding_right1">
                            <div class="text-img">
                            <figure><img src="{{asset('frontend/assets/images/home.png')}}" alt="#"/></figure>
                            <h3>01</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection