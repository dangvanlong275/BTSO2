@extends('admin.menu')
@section('main')
<div class="khachhang" style="display: block;">
    <table class="table-header">
        <tbody>
            <tr>
                <!-- Theo độ rộng của table content -->
                <th title="Sắp xếp" style="width: 5%" onclick="sortKhachHangTable('stt')">Stt <i class="fa fa-sort"></i>
                </th>
                <th title="Sắp xếp" style="width: 20%" onclick="sortKhachHangTable('hoten')">Họ tên <i
                        class="fa fa-sort"></i></th>
                <th title="Sắp xếp" style="width: 30%" onclick="sortKhachHangTable('email')">Email <i
                        class="fa fa-sort"></i></th>
                <th title="Sắp xếp" style="width: 20%" onclick="sortKhachHangTable('taikhoan')">Tài khoản <i
                        class="fa fa-sort"></i>
                </th>

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
                @foreach ($khachhang as $kh)
                <tr>
                    <td style="width: 5%">{{$i}}</td>
                    <td style="width: 20%">{{$kh->Ho}} {{$kh->Ten}}</td>
                    <td style="width: 30%">{{$kh->Email}}</td>
                    <td style="width: 20%">{{$kh->TaiKhoan}}</td>
                    <td style="width: 10%">
                        <div class="tooltip">
                            <label class="switch" style="top: -11px;">
                                @if ($kh->TrangThai === 1)
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked
                                    onclick="thayDoiTrangThaiND(this, '{{$kh->MaND}}')">
                                @else
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                    onclick="thayDoiTrangThaiND(this, '{{$kh->MaND}}')">
                                @endif
                                <span class="slider round"></span>
                            </label>
                            <span class="tooltiptext">Mở</span>
                        </div>
                        <div class="tooltip">
                            <i class="fa fa-remove" onclick="xoaNguoiDung('{{$kh->MaND}}')"></i>
                            <span class="tooltiptext">Xóa</span>
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
        <select name="kieuTimKhachHang">
            <option value="ten">Tìm theo họ tên</option>
            <option value="email">Tìm theo email</option>
            <option value="taikhoan">Tìm theo tài khoản</option>
        </select>
        <input type="text" placeholder="Tìm kiếm..." onkeyup="timKiemNguoiDung(this)">
        <button onclick="document.getElementById('khungThemNguoiDung').style.transform = 'scale(1)';">
            <i class="fa fa-plus-square"></i>
            Thêm người dùng
        </button>
    </div>
    @include('admin.khungThemKH')
</div>
@endsection