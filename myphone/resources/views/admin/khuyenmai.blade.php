@extends('admin.menu')
@section('main')

<div class="khuyenmai" style="display: block;">
    <table class="table-header">
        <tbody>
            <tr>
                <!-- Theo độ rộng của table content -->
                <th title="Sắp xếp" style="width: 5%" onclick="sortKMTable('stt')">Stt <i class="fa fa-sort"></i>
                </th>
                <th title="Sắp xếp" style="width: 7%" onclick="sortKMTable('makm')">Mã khuyến mãi <i
                        class="fa fa-sort"></i></th>
                <th title="Sắp xếp" style="width: 13%" onclick="sortKMTable('tenkm')">Tên khuyến mãi <i
                        class="fa fa-sort"></i></th>
                <th title="Sắp xếp" style="width: 20%" onclick="sortKMTable('gtkhuyenmai')">Giá trị khuyến mãi <i
                        class="fa fa-sort"></i></th>
                <th title="Sắp xếp" style="width: 15%" onclick="sortKMTable('ngaybd')">Ngày bắt đầu <i
                        class="fa fa-sort"></i></th>
                <th title="Sắp xếp" style="width: 15%" onclick="sortKMTable('ngaykt')">Ngày kết thúc <i
                        class="fa fa-sort"></i></th>
                <th style="width: 10%">Hành động</th>
            </tr>

        </tbody>
    </table>

    <div class="table-content">
        <table class="table-outline hideImg">
            <tbody>
                @php
                $i=1;
                @endphp
                @foreach ($khuyenmai as $kmai)

                <tr>
                    <td style="width: 5%">{{$i}}</td>
                    <td style="width: 7%">{{$kmai->MaKM}}</td>
                    <td style="width: 13%">{{$kmai->TenKM}}</td>
                    <td style="width: 20%">{{number_format($kmai->GiaTriKM,0)}}</td>
                    <td style="width: 15%">{{$kmai->NgayBD}}</td>
                    <td style="width: 15%">{{$kmai->NgayKT}}</td>
                    <td style="width: 10%">
                        <div class="tooltip">
                            <i class="fa fa-wrench" onclick="addKhungKM('{{ csrf_token() }}',{{$kmai->MaKM}})"></i>
                            <span class="tooltiptext">Sửa</span>
                        </div>
                        <div class="tooltip">
                            <i class="fa fa-trash" onclick="xoaKM('{{$kmai->MaKM}}')"></i>
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
        <select name="kieuTimKM">
            <option value="makm">Tìm theo mã khuyến mãi</option>
            <option value="tenkm">Tìm theo tên khuyến mãi</option>
        </select>
        <input type="text" placeholder="Tìm kiếm..." onkeyup="timKiemKM(this)">
        <button onclick="document.getElementById('khungThemKM').style.transform = 'scale(1)';">
            <i class="fa fa-plus-square"></i>
            Thêm khuyến mãi
        </button>
    </div>
    @include('admin.khungThemKM')
    <div id="khungSuaKM" class="overlay"></div>
</div>

@endsection