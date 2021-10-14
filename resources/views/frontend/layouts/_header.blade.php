<header class="container bg-light">
    <div class="mo-dau row">
        <div class="col-md-8">
            <form method="GET" autocomplete="off"> 
                <input type="text" name="search" placeholder="Tìm kiếm sản phẩm..." id="search">
                <button type="submit">
                    <span class="icon"><i class="fa fa-search"></i></span>
                </button>
            </form>
            <div class="mt-2 p-2 bg-light" id="resultSearch">
                <ul>
                </ul>
            </div>
        </div>
        <div class="user d-flex align-items-center col-md-4 mt-3">
            @if(Auth::guard('web')->check())
                <div>
                    <div class="dropdown-user">
                    <span id="info_user">Xin chào, {{Auth::guard('web')->user()->name}}</span>
                        <div class="dropdown-content">
                            <a href="{{url('user/information')}}">Thông tin tài khoản</a>
                            <a href="{{url('user/changepassword')}}">Đổi mật khẩu</a>
                            <a href="{{url('user/logout')}}">Đăng xuất</a>
                        </div>
                    </div>
                </div>
            @else
                <div class="btn-login-register" style="margin-right: 25px">
                    <button class="btn custom-button-color" type="button" ><a href="{{url('/user/login')}}">Đăng Nhập</a></button>
                    <button class="btn custom-button-color" type="button" ><a href="{{url('/user/register')}}">Đăng Ký</a></button>
                </div>
            @endif
            <div class="shopping">
                <div class="cart-icon">
                    <span>
                        Giỏ hàng
                    </span>
                    @php $count = 0 @endphp
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            @php $count += 1 @endphp
                        @endforeach
                    @endif
                    <span id="total-count">{{$count}}</span>
                    <i class="fas fa-cart-plus"></i>
                </div>
                <div class="shopping-item">
                    <ul class="shopping-list">
                        @php $total = 0;@endphp
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp
                            <li>
                                <a class="cart-img" href="#"><img src="{{$details['image']}}" alt="#"></a>
                                <h4 class="title"><a href="#">{{ $details['name'] }}</a></h4>
                                <p class="quantity">{{$details['quantity']}}x - <span class="amount">{{ number_format($details['price'] * $details['quantity']) }} đ</span></p>
                                <a data-id="{{$id}}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                            </li>
                            @endforeach
                        @endif
                    </ul>
                    <div class="bottom">
                        <div class="total">
                            <span>Tổng</span>
                            <span class="total-amount">{{ number_format($total) }} đ</span>
                        </div>
                        <a href="{{url('checkout')}}" class="btn animate">Thanh toán</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="menu">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item nav-link"><a href="{{url('/home')}}">TRANG CHỦ</a></li>
                    <li class="nav-item dropdown">
                            <a style="color: white" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                DANH MỤC SẢN PHẨM
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @php $categories = \App\Models\Category::all('id','name') @endphp
                                @foreach ($categories as $category)
                                    <a style="color:black" class="dropdown-item" href="{{url('category/'.$category->id)}}">{{$category->name}}</a>
                                @endforeach
                            </div>
                    </li>
                    <li class="nav-item nav-link"><a href="{{url('/aboutus')}}">GIỚI THIỆU</a></li>
                    <li class="nav-item nav-link"><a href="{{url('/policy-support')}}">CHÍNH SÁCH - HỖ TRỢ</a></li>
                    <li class="nav-item nav-link"><a href="{{url('/contact')}}">LIÊN HỆ</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>