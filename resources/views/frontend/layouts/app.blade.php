<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Document')</title>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/category.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/contact-bar.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @stack('css')
    <style>
        #total-count{
            position: absolute;
            top: -7px;
            right: -20px;
            background: #3f3fb6;
            width: 18px;
            height: 18px;
            line-height: 18px;
            color: #fff;
            border-radius: 100%;
            font-size: 11px;
            text-align: center
        }
        .shopping {
            display: inline-block;
            z-index: 9999;
            position: relative;
        }
        
        .shopping .shopping-item {
            position: absolute;
            top: 15px;
            right: 0;
            width: 350px;
            background: #fff;
            padding: 20px 25px;
            -webkit-transition: all 0.3s ease 0s;
            -moz-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
            -webkit-transform: translateY(10px);
            -moz-transform: translateY(10px);
            transform: translateY(10px);
            -webkit-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            opacity:0;
            visibility:hidden;
            z-index:99;
        }
        .shopping:hover .shopping-item {
            visibility: visible;
            opacity: 1;
        }
        .shopping-list li {
            overflow: hidden;
            border-bottom: 1px solid #e6e6e6;
            padding-bottom: 15px;
            margin-bottom: 15px;
            position:relative;
        }
        .shopping-list li .remove {
            position: absolute;
            left: 0;
            bottom: 16px;
            margin-top: -20px;
            height: 20px;
            width: 20px;
            line-height: 18px;
            text-align: center;
            background: #fff;
            color: #222;
            border-radius: 0;
            font-size: 11px;
            border: 1px solid #ededed;
        }
        .shopping-list li .remove:hover{
            color:#ffffff;
            border-color:transparent;
            background-color: black
        }
        .shopping-list .cart-img {
            float: right;
            border: 1px solid #ededed;
            overflow:hidden;
        }
        .shopping-list .cart-img img {
            width: 70px;
            height: 70px;
            border-radius:0;
            
        }
        .shopping-list .cart-img:hover img{
            transform:scale(1.09);
        }
        .shopping-list .quantity{
            line-height: 22px;
            font-size: 13px;
            float: left;
            
        }
        .shopping-list .title a{
            font-size: 15px
            
        }
        .shopping-list h4 {
            font-size: 14px;
            text-align: left
        }
        .shopping-list h4 a {
            font-weight: 600;
            font-size: 13px;
            color: #333;
        }
        .shopping-list h4 a:hover{
            color:#3f3fb6;
        }
        .shopping-item .bottom {
            text-align: center;
        }
        .shopping-item .total {
            overflow:hidden;
            display: block;
            padding-bottom: 10px;
        }
        .shopping-item .total span {
            text-transform:uppercase;
            color:#222;
            font-size:13px;
            font-weight:600;
            float:left;
        }
        .shopping-item .total .total-amount {
            float:right;
            font-size:14px;
        }
        .shopping-item .bottom .btn {
            background: #222;
            padding: 10px 20px;
            display: block;
            color: #fff;
            margin-top: 10px;
            border-radius: 0px;
            text-transform: uppercase;
            font-size: 14px;
            font-weight: 500;
        }
        .shopping-item .bottom .btn:hover{
            background:#3f3fb6;
            color:#fff;
        }
    </style>
</head>
<body>
    @include('frontend.layouts._header')
    @yield('content')
    @include('frontend.layouts._footer')
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            @if(session()->has('success'))
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }
                    toastr["success"]("{{session('success')}}")
            @endif
            @if(session()->has('fail'))
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }
                    toastr["error"]("{{session('fail')}}")
            @endif
        })
    </script>
    @stack('js')
</body>
</html>