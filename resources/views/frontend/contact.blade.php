@extends('frontend.layouts.app')

@section('title')
    Liên hệ
@endsection

@section('content')
<section>
    <div class="container bg-light">
        <div class="title-contact">
            <h2>LAPTOP247 - HỆ THỐNG BÁN LAPTOP, MÁY TÍNH</h2>
        </div>
        <div class="table-contact table-responsive">
                <table>
                    <tr>
                        <th>Cửa Hàng tại Hà Nội</th>
                        <th>Cửa Hàng tại TP. Hồ Chí Minh</th>
                        <th>Trung tâm bảo hành</th>
                    </tr>
                    <tr>
                        <td>
                            <ul>
                                <li>Cửa Hàng số 210 Hoàng Quốc Việt, Cầu Giấy</li>
                                <li>Cửa hàng số 12 Lê Thanh Nghị, Hai Bà Trưng</li>
                                <li>Cửa hàng số 232 Phạm Văn Đồng, Bắc Từ Liêm</li>
                            </ul>
                        </td>
                        <td>
                            <ul>
                                <li>Cửa hàng 148 Trường Trinh, Tân Bình</li>
                                <li>Cửa hàng Lê Trọng Tấn, Tây Thạnh </li>
                                <li>Cửa hàng Võ Văn Ngân, Trường Thọ</li>
                            </ul>
                        </td>
                        <td>
                            <ul>
                                <li>TT. số 20 Lê Thanh Nghị</li>
                                <li>TT. số 14 Võ Văn Ngân</li>
                            </ul>
                        </td>
                    </tr>
                </table>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="question col-md-5">
                <div>
                    <h5>Bạn muốn hỏi về chính sách bảo hành ?</h5>
                    <h5>Tại sao tài khoản tôi bị khóa ?</h5>
                    <h5>Đặt và mua hàng trên website như thế nào ?</h5>
                </div>
                <div class="hotline">
                    <h5>Hotline</h5>
                    <p>
                        <a href="tel:19004521">19004521 (Mua hàng)</a>
                    </p>
                    <p>
                        <a href="tel:19004522">19004522 (Bảo hành)</a>
                    </p>
                    <p>
                        <a href="tel:19004523">19004523 (Khiếu nại)</a>
                    </p>
                </div>
            </div>
            <div class="form-contact col-md-5">
                <div style="text-align: center">
                    <h3>Bạn hãy đặt câu hỏi tại đây</h3>
                </div>
                <form>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="text" class="form-control" placeholder="Nhập số điện thoại của bạn">
                    </div>
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input type="text" class="form-control" placeholder="Nhập tên của bạn">
                    </div>
                    <div class="form-group">
                        <label>Câu hỏi của bạn ?</label>
                        <textarea type="text" class="form-control" placeholder="Nhập câu hỏi của bạn"></textarea>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <button class="btn custom-button-color" type="button" style="border: 1px solid white">Gửi câu hỏi</button>
                    </div>
                </form>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="contact-map col-md-5">
                <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=406&amp;height=321&amp;hl=en&amp;q=Đại học Thương Mại&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.fridaynightfunkin.net/">FNF Download</a></div><style>.mapouter{position:relative;text-align:right;width:406px;height:321px;}.gmap_canvas {overflow:hidden;background:none!important;width:406px;height:321px;}.gmap_iframe {width:406px!important;height:321px!important;}</style></div>
            </div>
        </div>
    </div>
</section>
    
@endsection
