@extends('frontend.layouts.app')

@section('title')
    Về chúng tôi
@endsection
@push('css')
<style>
    .box{
        margin: auto;
        width:300px;color:white;
        text-align:center;
        padding:15px 0 5px 0;
        min-height: 250px;
    }
</style>
@endpush
@section('content')
<section>
    <div class="container bg-light">
        <div class="title-aboutus">
            <h2>Giới thiệu về chúng tôi</h2>
        </div>
        <div>
            <div style="margin-top:20px;">
                <h4>1. Giới thiệu chung</h4>
                
                <ul style="list-style:square;padding-left:30px">
                    <li>“Laptop247” được thành lập năm 2010, chuyên kinh doanh các sản phẩm laptop của nhiều nhãn hàng lớn như Dell, Asus, HP, MSI, Lenovo… </li>
                    <li>Sau 11 năm phát triển không ngừng, “Laptop247”  hướng đến mục tiêu không chỉ là nơi kinh doanh máy tính mà còn là nơi khách hàng có thể tìm thấy mọi tiện ích công nghệ hiện đại và dịch vụ chất lượng cao.</li>
                </ul>
            </div>
            <div>
                <h4>2. Giá trị cốt lõi</h4>
                <div class="row">
                    <div class="box col-md-4" style="background-color: rgb(255, 89, 89)">
                        <p style="font-weight:bold">Tận tâm</p>
                        <p>“Vượt trên sự mong đợi”</p>
                        <p>“Laptop247” đặt tận tâm là nền tảng của phục vụ, lấy khách hàng làm trung tâm, mang đến những giá trị đích thực tới khách hàng và đối tác.</p>
                    </div>
                    <div class="box col-md-4" style="background-color: rgb(255, 149, 11)">
                        <p style="font-weight:bold">TRÁCH NHIỆM</p>
                        <p>“Chúng ta luôn cố gắng”</p>
                        <p>“Laptop247” đặt chữ TÍN lên hàng đầu, luôn thể hiện tinh thần trách nhiệm cao cùng phương châm “Làm hết việc chứ không làm hết giờ”.</p>
                    </div>
                </div>
                <div class="row" style="margin-top: 40px" >
                    <div class="box col-md-4" style="background-color: rgb(5, 197, 204)">
                        <p style="font-weight:bold">KHÁC BIỆT</p>
                        <p>“Dám nghĩ – Dám làm”</p>
                        <p>“Laptop247” đặt sự khác biệt là chủ trương để xây dựng công ty thành một doanh nghiệp dẫn đầu.</p>
                    </div>
                    <div class="box col-md-4" style="background-color: #3f3fb6">
                        <p style="font-weight:bold">SÁNG TẠO</p>
                        <p>“Không gì là không thể”</p>
                        <p>“Laptop..” coi sáng tạo là đòn bẩy để phát triển, luôn đề cao các sáng kiến để hoàn thiện, hiệu quả hơn, nâng tầm giá trị.</p>
                    </div>
                </div>
            </div>
            <div style="margin-top: 20px ">
                <h4>3. Những dấu mốc quan trọng</h4>
                <ul style="padding-left: 30px">
                    <li>2010: Bắt đầu một cửa hàng nhỏ tại TP. Hà Nội</li>
                    <li>2013: Mở 1 showroom ở Hải Phòng</li>
                    <li>2016: 3 showroom mới được mở tại Hà Nội</li>
                    <li>2020: Tập trung phát triển chuỗi cửa hàng và chuẩn bị cho 1 sứ mệnh mới</li>
                </ul>
            </div>
        </div>
    </div>
</section>
    
@endsection
