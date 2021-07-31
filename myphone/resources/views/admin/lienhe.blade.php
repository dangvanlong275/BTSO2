@extends('admin.menu')
@section('main')
<div class="lienhe" style="display: block;">
    <table class="table-header">
        <tbody>
            <tr>
                <!-- Theo độ rộng của table content -->
                <th title="Sắp xếp" style="width: 5%" onclick="sortLienHeTable('stt')">Stt <i class="fa fa-sort"></i></th>
                <th title="Sắp xếp" style="width: 10%" onclick="sortLienHeTable('hoten')">Người gửi <i class="fa fa-sort"></i></th>
                <th title="Sắp xếp" style="width: 15%">Số điện thoại <i class="fa fa-sort"></i></th>
                <th title="Sắp xếp" style="width: 15%">Email <i class="fa fa-sort"></i></th>
                <th title="Sắp xếp" style="width: 20%">Nội dung <i class="fa fa-sort"></i></th>
                <th title="Sắp xếp" style="width: 10%" onclick="sortLienHeTable('ngaygui')">Ngày gửi <i class="fa fa-sort"></i> </th>

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
                @foreach ($lienhe as $lienhe)
                <tr>
                    <td style="width: 5%">{{$i}}</td>
                    <td style="width: 10%">{{ $lienhe->NguoiGui }}</td>
                    <td style="width: 15%">{{ $lienhe->SDT }}</td>
                    <td style="width: 15%">{{ $lienhe->Email }}</td>
                    <td style="width: 20%">{{ $lienhe->NoiDung }}</td>
                    <td style="width: 10%">{{ $lienhe->ThoiGianGui }}</td>
                    <td style="width: 10%">
                        <div class="tooltip">
                            <i class="fa fa-remove" onclick="xoaBaoCao('{{$lienhe->MaLH}}')"></i>
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
            <option value="taikhoan">Tìm theo số điện thoại</option>
            <option value="email">Tìm theo email</option>
        </select>
        <input type="text" placeholder="Tìm kiếm..." onkeyup="timKiemLienHe(this)">
    </div>
</div>
@endsection