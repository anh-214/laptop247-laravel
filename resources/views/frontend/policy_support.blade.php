@extends('frontend.layouts.app')

@section('title')
    Chính sách - Hỗ trợ
@endsection
@push('css')
    <style>
        .dot {
            display: block;
            height: 200px;
            width: 200px;
            padding: 50px;
            -moz-border-radius: 30px; /* or 50% */
            border-radius: 50%;
            border: 3px solid #3f3fb6;
            text-align: center;
            margin-left: 50px;
            margin-right: 50px;
            }
        .div-step div{
            margin-bottom: 10px;
        }
        .div-step {
            margin: auto;
            margin-top: 40px;
        }
    </style>
@endpush
@section('content')
<section>
    <div class="container bg-light">
        <div class="title-policy-support">
            <h2>Chính sách - Hỗ trợ</h2>
        </div>
        <div>
            <div style="margin-top:20px;">
                <h4>1. Hướng dẫn mua hàng</h4>
                <p><span style="font-style: italic;font-weight:bold">Bước 1: </span> Bạn tìm sản phẩm cần mua tại mục <span style="font-weight:bold">“Danh mục sản phẩm”</span> hoặc nhập vào <span style="font-weight:bold">“Khung tìm kiếm”</span></p>
                <img src="{{asset('frontend/assets/images/Capture1.PNG')}}" alt="">
                <img src="{{asset('frontend/assets/images/Capture.PNG')}}" alt="">
                <p><span style="font-style: italic;font-weight:bold">Bước 2: </span> Khi tìm được sản phẩm ứng ý</p>
                <ul style="list-style:none">
                    <li>Chọn “Mua ngay”</li>
                    <li>Nhập số lượng sản phẩm cần mua</li>
                    <li>Nhập mã khuyến mãi (Nếu có)</li>
                    <li>Nhập thông tin của bạn</li>
                    <li>Thanh toán</li>
                </ul>
            </div>
            <div>
                <h4>2. Chính sách bảo hành</h4>
                <div style="margin: auto;background-color:#3f3fb6;width:300px;text-transform:uppercase;color:white;text-align:center;padding:15px 0 5px 0;margin-bottom:20px">
                    <p>Điều kiện tiếp nhận bảo hành</p>
                </div>
                
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-4">
                            <span class="dot">Sản phẩm hư hỏng do lỗi kỹ thuật của nhà sản xuất</span>
                        </div>

                        <div class="col-md-4">
                            <span class="dot">Sản phẩm còn thời hạn bảo hành của Hãng</span>
                        </div>  

                        <div class="col-md-4">
                            <span class="dot">Phiếu tem bảo hành trên sản phẩm còn nguyên vẹn</span>
                        </div>
                    </div>
               
                <div>
                    <h5>Chính sách bảo hành</h5>
                    <ul style="list-style:none">
                        <li>Hỗ trợ bảo hành trên toàn quốc</li>
                        <li>Bảo hành miễn phí khi phát sinh lỗi phần cứng</li>
                    </ul>
                </div>
                <div style="margin: auto;background-color:#3f3fb6;width:300px;text-transform:uppercase;color:white;text-align:center;padding:15px 0 5px 0">
                    <p>Quy trình bảo hành</p>
                </div>
                <div class="div-step">
                    <div>
                        <button class="btn custom-button-color" type="button">Bước 1</button>
                        <span class="step">Liên hệ hotline để được tư vấn</span>
                    </div>
                    <div>
                        <button class="btn custom-button-color" type="button">Bước 2</button>
                        <span class="step">Xác nhận bảo hành</span>
                    </div>
                    <div>
                        <button class="btn custom-button-color" type="button">Bước 3</button>
                        <span class="step">Gửi sản phẩm bảo hành</span>
                    </div>
                    <div>
                        <button class="btn custom-button-color" type="button">Bước 4</button>
                        <span class="step">Hoàn tất bảo hành, nhận lại sản phẩm</span>
                    </div>
                </div>
            </div>
            <div>
                <h4>3. Chính sách đổi trả</h4>
                <ul>
                    <li>Điều kiện đổi sản phẩm
                        <ul style="margin-left:15px; ">
                            <li>Sản phẩm mới được bán từ website</li>
                            <li>Sản phẩm bị lỗi phải được xác nhận từ website / nhà cung cấp</li>
                        </ul>
                    </li>
                    <li>
                        Đối tượng: Tất cả khách hàng đã mua sản phẩm trên website
                    </li>
                    <li>Chính sách
                        <ul style="margin-left:15px; ">
                            <li>Chính sách này chỉ được áp dụng cho các sản phẩm được bán từ ngày chính sách được duyệt, căn cứ vào ngày mua hàng trên hóa đơn</li>
                            <li>Chính sách một đổi một cho các sản phẩm có cùng quy cách (cùng mẫu, cùng màu, cùng dung lượng…). Không áp dụng việc trả hàng hoàn tiền</li>
                            <li>Trường hợp không có sản phẩm cùng quy cách để đổi, khách hàng được quyền đổi sang sản phẩm khác có giá trị bằng hoặc cao hơn sản phẩm ban đầu. Phần chênh lệch giá trị sẽ được thu thêm</li>
                        </ul>
                    </li>
                </ul>
            </div>
        
        </div>
    </div>
</section>
    
@endsection
