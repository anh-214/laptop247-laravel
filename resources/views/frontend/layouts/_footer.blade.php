<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
            <h6>Về chúng tôi</h6>
            <p class="text-justify">laptop247.com </p>
            </div>

            <div class="col-xs-6 col-md-3">
            <h6>Categories</h6>
            <ul class="footer-links">
                @php $categories = \App\Models\Category::all('id','name') @endphp
                @foreach ($categories as $category)
                    <li><a href="{{url('categories/'.$category->id)}}">{{$category->name}}</a></li>
                @endforeach
              
            </ul>
            </div>

            <div class="col-xs-6 col-md-3">
            <h6>Quick Links</h6>
            <ul class="footer-links">
                <li><a href="{{url('aboutus')}}">About Us</a></li>
                <li><a href="{{url('contact')}}">Contact Us</a></li>
                <li><a href="{{url('policy-support')}}">Privacy Policy</a></li>
            </ul>
            </div>
        </div>
        <hr>
        </div>
        <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
                <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by 
                    <a href="#">Anh2k1</a>.
                </p>
            </div>

            {{-- <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
            </ul>
            </div> --}}
        </div>
    </div>
    <div class="giuseart-nav">
        <ul>
            <li>
                <a href="https://zalo.me/#" rel="nofollow" target="_blank"><i class="ticon-zalo-circle2"></i>Chat Zalo</a>
            </li>
            {{-- <li class="phone-mobile">
                <a href="#" rel="nofollow" class="button">
                    <span class="phone_animation animation-shadow">
                        <i class="icon-phone-w" aria-hidden="true"></i>
                    </span>
                    <span class="btn_phone_txt">Gọi điện</span>
                </a>
            </li> --}}
            <li>
                <a href="https://www.messenger.com/t/anh2k1" rel="nofollow" target="_blank"><i class="ticon-messenger"></i>Messenger</a>
            </li>
            {{-- <li><a href="#" class="chat_animation">
            <i class="ticon-chat-sms" aria-hidden="true" title="Nhắn tin sms"></i>
                Nhắn tin SMS</a>
            </li> --}}
            <li class="to-top-pc">
                <a href="#" rel="nofollow">
                    <i class="ticon-angle-up" aria-hidden="true" title="Quay lên trên"></i>
                </a>
            </li>
        </ul>
    </div>

</footer>