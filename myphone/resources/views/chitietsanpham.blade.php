<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    
@include("./view_s/header_v")
<div class="chitietSanpham" style="min-height: 85vh">
    <h1>{{$product->TenSP}}</h1>
    <div class="rowdetail group">
        <div class="picture">
            <img src="img/products/{{$product->HinhAnh}}">
        </div>
        <div class="price_sale">
            @php
                $giagoc = $giagoc = $product->DonGia;
                $giamgia = $product->DonGia - $product->khuyenmai->GiaTriKM;
            @endphp
            @if($giagoc - $giamgia > 0) 
                <div class="area_price"><strong>{{number_format($giamgia,0)}}</strong> 
                    <span style="color: #e10c00; font-size: 20">{{ number_format($giagoc,0) }}</span>
                </div>
            @else 
                <div class="area_price"><strong>{{number_format($giagoc,0)}}</strong> 
                </div>
            @endif
           
            <div class="ship" style="">
                <i class="fa fa-clock-o"></i>
                <div>NHẬN HÀNG TRONG 1 GIỜ</div>
            </div>
            <div class="area_promo">
                <strong>khuyến mãi</strong>
                <div class="promo">
                    <i class="fa fa-check-circle"></i>
                    <div id="detailPromo">Cơ hội trúng <span style="font-weight: bold">61 xe Wave Alpha</span> khi trả
                        góp Home Credit</div>
                </div>
            </div>
            <div class="policy">
                <div>
                    <i class="fa fa-archive"></i>
                    <p>Trong hộp có: Sạc, Tai nghe, Sách hướng dẫn, Cây lấy sim, Ốp lưng </p>
                </div>
                <div>
                    <i class="fa fa-star"></i>
                    <p>Bảo hành chính hãng 12 tháng.</p>
                </div>
                <div class="last">
                    <i class="fa fa-retweet"></i>
                    <p>1 đổi 1 trong 1 tháng nếu lỗi, đổi sản phẩm tại nhà trong 1 ngày.</p>
                </div>
            </div>
            <div class="area_order">
               
                <a class="buy_now"
                    onclick="themVaoGioHang({{$product->MaSP}},'{{$product->TenSP}}',{{session()->has('user') ? session('user')->TrangThai : -1}});">
                    <h3><i class="fa fa-plus"></i> Thêm vào giỏ hàng</h3>
                </a>
                
            </div>
        </div>
        <div class="info_product">
            <h2>Thông số kỹ thuật</h2>
            <ul class="info">
                <li>
                    <p>Màn hình</p>
                    <div>{{$product->ManHinh}}</div>
                </li>
                <li>
                    <p>Hệ điều hành</p>
                    <div>{{$product->HDH}}</div>
                </li>
                <li>
                    <p>Camara sau</p>
                    <div>{{$product->CamSau}}</div>
                </li>
                <li>
                    <p>Camara trước</p>
                    <div>{{$product->CamTruoc}}</div>
                </li>
                <li>
                    <p>CPU</p>
                    <div>{{$product->CPU}}</div>
                </li>
                <li>
                    <p>RAM</p>
                    <div>{{$product->Ram}}</div>
                </li>
                <li>
                    <p>Bộ nhớ trong</p>
                    <div>{{$product->Rom}}</div>
                </li>
                <li>
                    <p>Thẻ nhớ</p>
                    <div>{{$product->SDCard}}</div>
                </li>
                <li>
                    <p>Dung lượng pin</p>
                    <div>{{$product->Pin}}</div>
                </li>
            </ul>
        </div>
    </div>
    <hr>
    <div class="comment-area">
        <div class="guiBinhLuan">
            <div class="stars">
                <form action="{{route('danhgia')}}" method="post" enctype="multipart/form-data"
                    onsubmit="return checkComment({{session()->get('user') ? 1 : 0}});"> @csrf
                    <input type="hidden" name="masp" value="{{$product->MaSP}}">
                    <input class="star star-5" id="star-5" value="5" type="radio" name="star">
                    <label class="star star-5" for="star-5" title="Tuyệt vời"></label>

                    <input class="star star-4" id="star-4" value="4" type="radio" name="star">
                    <label class="star star-4" for="star-4" title="Tốt"></label>

                    <input class="star star-3" id="star-3" value="3" type="radio" name="star">
                    <label class="star star-3" for="star-3" title="Tạm"></label>

                    <input class="star star-2" id="star-2" value="2" type="radio" name="star">
                    <label class="star star-2" for="star-2" title="Khá"></label>

                    <input class="star star-1" id="star-1" value="1" type="radio" name="star">
                    <label class="star star-1" for="star-1" title="Tệ"></label>
            </div>
            <textarea maxlength="250" id="inpBinhLuan" name="commentcontent"
                placeholder="Viết suy nghĩ của bạn vào đây..."></textarea>
            <input id="btnBinhLuan" type="submit" value="GỬI BÌNH LUẬN">
            </form>
        </div>
        <!-- <h2>Bình luận</h2> -->
        <div class="container-comment">
            <div class="rating">
                @for ($i=1;$i<=$product->SoSao;$i++)
                    <i class="fa fa-star"></i>
                    @endfor
                    @for ($i=1;$i<=5-$product->SoSao;$i++)
                        <i class="fa fa-star-o"></i>
                        @endfor
                        <span> {{$product->SoDanhGia}} đánh giá </span>
            </div>
            <div class="comment-content">
                @foreach ($product['binhluan'] as $binhluan)
                <div class="comment">
                    <i class="fa fa-user-circle"> </i>
                    <h4>{{$binhluan->HoTen}}
                        <span>
                            @for ($i=1;$i<=$binhluan->SoSao;$i++)
                                <i class="fa fa-star"></i>
                                @endfor
                                @for ($i=1;$i<=5-$binhluan->SoSao;$i++)
                                    <i class="fa fa-star-o"></i>
                                @endfor
                        </span>
                    </h4>
                    <p>{{$binhluan->BinhLuan}}</p>
                    <span class="time">{{$binhluan->NgayLap}}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@include("./view_s/footer_v")