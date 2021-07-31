<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    
@include('view_s.header_v')

<style>
    .overlay {
        position: fixed;
        left: 30%;
        top: 8%;
        width: 40%;
        height: auto;
        z-index: 15;
        background: white
    }

    .khung {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow-y: auto;
        z-index: 14;
        transition: .2s ease;
        transform: scale(0);
        background-color: #020202d8;
    }

    .close {
        position: fixed;
        top: 5px;
        right: 5px;
        font-size: 3rem;
        width: 1em;
        height: 1em;
        line-height: 1em;
        text-align: center;
        color: #aaa;
        cursor: pointer;
        transition: .2s ease;
    }

    #title-donmua {
        text-align: center;
        font-size: 33px;
    }
</style>

<div class="listDonHang">
    <table class="table table-striped">
        <tbody>
            <tr
                style="text-align:center;vertical-align:middle;font-size:20px;background-color:coral;color:black!important">
                <th style="font-weight:600">Mã đơn hàng</th>
                <th style="font-weight:600">Mã người dùng</th>
                <th style="font-weight:600">Ngày lập</th>
                <th style="font-weight:600">Người nhận</th>
                <th style="font-weight:600">SDT</th>
                <th style="font-weight:600">Địa chỉ</th>
                <th style="font-weight:600">Phương thức TT</th>
                <th style="font-weight:600">Tổng tiền</th>
                <th style="font-weight:600">Trạng thái</th>
                <th style="font-weight:600">Xem chi tiết</th>
            </tr>
            @php
            $i = 1
            @endphp
            @foreach ($donhang as $donmua )


            <tr>
                <td style="text-align:center;vertical-align:middle;">{{ $donmua->hoadon->MaHD }}</td>
                <td style="text-align:center;vertical-align:middle;">{{ $donmua->hoadon->MaND }}</td>
                <td style="text-align:center;vertical-align:middle;">{{ $donmua->hoadon->NgayLap }}</td>
                <td style="text-align:center;vertical-align:middle;">{{ $donmua->hoadon->NguoiNhan }}</td>
                <td style="text-align:center;vertical-align:middle;">{{ $donmua->hoadon->SDT }}</td>
                <td style="text-align:center;vertical-align:middle;">{{ $donmua->hoadon->DiaChi }}</td>
                <td style="text-align:center;vertical-align:middle;">{{ $donmua->hoadon->PhuongThucTT }}</td>
                <td style="text-align:center;vertical-align:middle;">{{ number_format($donmua->hoadon->TongTien,0) }}</td>
                <td style="width: 10%">Đang chờ xử lý</td>
                <td style="text-align:center;vertical-align:middle;">

                    <button
                        onclick="document.getElementById('khungChiTietDH{{$i}}').style.transform = 'scale(1)';">Xem</button>
                    </a>
                </td>
                @php
                $i ++
                @endphp
                @endforeach

        </tbody>
    </table>
</div>
@php
$j = 1
@endphp
@foreach ($donhang as $ctdh)
<div id="khungChiTietDH{{$j}}" class="khung">
    <div class="overlay">
        <h5 id="title-donmua">Chi tiết đơn hàng</h5>
        <span class="close"
            onclick="document.getElementById('khungChiTietDH{{$j}}').style.transform = 'scale(0)';">×</span>
        <div class="modal-body" id="chitietdonhang">
            <table class="table table-striped">
                <tr
                    style="text-align:center;vertical-align:middle;font-size:20px;background-color:coral;color:black!important">
                    <th scope="col" style="font-weight:600">Sản phẩm</th>
                    <th scope="col" style="font-weight:600">Số lượng</th>
                    <th scope="col" style="font-weight:600">Đơn giá</th>
                </tr>
                <tbody>
                    @foreach ($ctdh->chitietdon as $chitietdh)
                    <tr>
                        <td scope="col" style="text-align:center;vertical-align:middle;">
                            <a href="{{route('chitietsanpham',['masp'=>$chitietdh->MaSP])}}">
                                <img style="width:100px;height:100px;" src="img/products/{{$chitietdh->HinhAnh}}"><br>
                                {{$chitietdh->TenSP}}
                            </a>
                        </td>
                        <td scope="col" style="text-align:center;vertical-align:middle;">{{$chitietdh->SoLuong}}</td>
                        <td scope="col" style="text-align:center;vertical-align:middle;">{{number_format($chitietdh->DonGia,0)}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!--  -->
        </div>
    </div>
</div>

@php
$j++
@endphp
@endforeach

<div class="plc">
    <section>
        <ul class="flexContain">
            <li>Giao hàng hỏa tốc trong 1 giờ</li>
            <li>Thanh toán linh hoạt: tiền mặt, visa / master, trả góp</li>
            <li>Trải nghiệm sản phẩm tại nhà</li>
            <li>Lỗi đổi tại nhà trong 1 ngày</li>
            <li>Hỗ trợ suốt thời gian sử dụng.
                <br>Hotline:
                <a href="tel:12345678" style="color: #288ad6;">1234.5678</a>
            </li>
        </ul>
    </section>
</div>
<div class="footer">

    @include("./view_s/footer_v")

</div>

<i class="fa fa-arrow-up" id="goto-top-page" onclick="gotoTop()"></i>
<i class="fa fa-arrow-down" id="goto-bot-page" onclick="gotoBot()"></i>
</body>

</html>