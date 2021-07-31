@extends('admin.menu')
@section('main')
<div class="loaisanpham" style="display: block;">
    <table class="table-header">
        <tbody>
            <tr>
                <!-- Theo độ rộng của table content -->
                <th title="Sắp xếp" style="width: 5%" onclick="sortLSPTable('stt')">Stt <i class="fa fa-sort"></i>
                </th>
                <th title="Sắp xếp" style="width: 7%" onclick="sortLSPTable('malsp')">Mã loại SP <i
                        class="fa fa-sort"></i></th>
                <th title="Sắp xếp" style="width: 13%" onclick="sortLSPTable('tenlsp')">Tên loại SP <i
                        class="fa fa-sort"></i></th>
                <th title="Sắp xếp" style="width: 20%">Hình ảnh <i class="fa fa-sort"></i></th>
                <th title="Sắp xếp" style="width: 15%" onclick="sortLSPTable('mota')">Mô tả <i class="fa fa-sort"></i>
                </th>
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
                @foreach ($l_sanpham as $loaisp)

                <tr>
                    <td style="width: 5%">{{$i}}</td>
                    <td style="width: 7%">{{$loaisp->MaLSP}}</td>
                    <td style="width: 13%">{{$loaisp->TenLSP}}</td>
                    <td style="width: 20%">
                        <div>
                            @if ($loaisp->HinhAnh)
                            <img style="height: 40px;" src="../img/company/{{$loaisp->HinhAnh}}" alt="">
                            @endif
                        </div>
                    </td>
                    <td style="width: 15%">{{$loaisp->Mota}}</td>
                    <td style="width: 10%">
                        <div class="tooltip">
                            <i class="fa fa-wrench"
                                onclick="addKhungLSP('{{ csrf_token() }}','{{$loaisp->MaLSP}}')"></i>
                            <span class="tooltiptext">Sửa</span>
                        </div>
                        <div class="tooltip">
                            <i class="fa fa-trash" onclick="xoaLoaiSanPham('{{$loaisp->MaLSP}}')"></i>
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
        <select name="kieuTimLSP">
            <option value="malsp">Tìm theo mã loại sản phẩm</option>
            <option value="tenlsp">Tìm theo tên loại sản phẩm</option>
        </select>
        <input type="text" placeholder="Tìm kiếm..." onkeyup="timKiemLSP(this)">
        <button onclick="document.getElementById('khungThemLSP').style.transform = 'scale(1)'; ">
            <i class="fa fa-plus-square"></i>
            Thêm loại sản phẩm
        </button>
    </div>
    @include('admin.khungThemLSP')
    <div id="khungSuaLSP" class="overlay"></div>
</div>
@endsection