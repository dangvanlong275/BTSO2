@extends('admin.menu')
@section('main')
<div class="donhang" style="display: block;">
    <table class="table-header">
        <tbody>
            <tr>
                <!-- Theo độ rộng của table content -->
                <th title="Sắp xếp" style="width: 5%" onclick="sortDonHangTable('stt')">Stt <i class="fa fa-sort"></i>
                </th>
                <th title="Sắp xếp" style="width: 7%" onclick="sortDonHangTable('madon')">Mã đơn <i
                        class="fa fa-sort"></i></th>
                <th title="Sắp xếp" style="width: 13%" onclick="sortDonHangTable('khach')">Khách <i
                        class="fa fa-sort"></i></th>
                <th title="Sắp xếp" style="width: 17%" onclick="sortDonHangTable('sanpham')">Sản phẩm <i
                        class="fa fa-sort"></i></th>
                <th title="Sắp xếp" style="width: 10%" onclick="sortDonHangTable('tongtien')">Tổng tiền <i
                        class="fa fa-sort"></i></th>
                <th title="Sắp xếp" style="width: 10%" onclick="sortDonHangTable('ngaygio')">Ngày giờ <i
                        class="fa fa-sort"></i></th>
                <th title="Sắp xếp" style="width: 10%" onclick="sortDonHangTable('trangthai')">Trạng thái <i
                        class="fa fa-sort"></i></th>
                <th style="width: 10%">Hành động</th>
            </tr>

        </tbody>
    </table>

    <div class="table-content">
        <table class="table-outline hideImg">
            <tbody>
                @php
                $i=1
                @endphp
                @foreach ($donhang as $hoadon)

                <tr>
                    <td style="width: 5%">{{$i}}</td>
                    <td style="width: 7%">{{$hoadon->MaHD}}</td>
                    <td style="width: 13%">{{$hoadon->NguoiNhan}}</td>
                    <td style="width: 17%">
                        @foreach ($hoadon->getDonHang as $sanpham)

                        {{$sanpham->TenSP}} <br>

                        @endforeach
                    </td>
                    <td style="width: 10%">{{number_format($hoadon->TongTien,0)}}</td>
                    <td style="width: 10%">{{$hoadon->NgayLap}}</td>
                    @switch($hoadon->TrangThai)
                    @case(1)
                    <td style="width: 10%">Chờ xác nhận</td>
                    @break
                    @case(2)
                    <td style="width: 10%">Đã xác nhận đơn hàng</td>
                    @break
                    @case(3)
                    <td style="width: 10%">Đang vận chuyển</td>
                    @break
                    @case(4)
                    <td style="width: 10%">Đang giao hàng</td>
                    @break
                    @case(0)
                    <td style="width: 10%">Đã giao hàng</td>
                    @break
                    @case(-1)
                    <td style="width: 10%">Đã hủy đơn</td>
                    @break
                    @default

                    @endswitch
                    <td style="width: 10%">
                        <div class="tooltip">
                            {{-- onclick="duyet('{{$hoadon->MaHD}}','{{$hoadon->TrangThai}}')" --}}
                            <select id="status_dh" onchange="duyet(this,{{$hoadon->MaHD}})">
                                <option selected style="font-weight:bold; background:yellow" disabled>Trạng thái
                                </option>
                                <option value="2" name='xác nhận đơn'>Xác nhận đơn </option>
                                <option value="3" name='vận chuyển'>Vận chuyển</option>
                                <option value="4" name='giao hàng'>Giao hàng</option>
                                <option value="0" name='giao thành công'>Giao thành công</option>
                                <option value="-1" name='hủy đơn'>Hủy đơn </option>
                            </select>
                            {{-- <i class="fa fa-arrow-right" ></i> --}}
                            <span class="tooltiptext">Duyệt</span>
                        </div>
                        <div class="tooltip">
                            <i class="fa fa-remove"
                                onclick="xoaDonHang('{{$hoadon->MaHD}}','{{$hoadon->TrangThai}}')"></i>
                            <span class="tooltiptext">Hủy</span>
                        </div>
                    </td>
                </tr>
                @php
                $i++
                @endphp
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="table-footer">
        <div class="timTheoNgay">
            Từ ngày: <input type="date" id="fromDate">
            Đến ngày: <input type="date" id="toDate">

            <button onclick="locDonHangTheoKhoangNgay()"><i class="fa fa-search"></i> Tìm</button>
        </div>

        <select name="kieuTimDonHang">
            <option value="ma">Tìm theo mã đơn</option>
            <option value="khachhang">Tìm theo tên khách hàng</option>
            <option value="trangThai">Tìm theo trạng thái</option>
        </select>
        <input type="text" placeholder="Tìm kiếm..." onkeyup="timKiemDonHang(this)">
    </div>

</div>
@endsection