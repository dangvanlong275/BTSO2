@extends('admin.menu')
@section('main')
<!-- Sản Phẩm -->
<div class="sanpham" style="display: block">
  <table class="table-header">
    <tbody>
      <tr>
        <!-- Theo độ rộng của table content -->
        <th title="Sắp xếp" style="width: 5%" onclick="sortProductsTable('stt')">
          Stt <i class="fa fa-sort"></i>
        </th>
        <th title="Sắp xếp" style="width: 10%" onclick="sortProductsTable('masp')">
          Mã <i class="fa fa-sort"></i>
        </th>
        <th title="Sắp xếp" style="width: 30%" onclick="sortProductsTable('ten')">
          Tên <i class="fa fa-sort"></i>
        </th>
        <th title="Sắp xếp" style="width: 15%" onclick="sortProductsTable('gia')">
          Giá <i class="fa fa-sort"></i>
        </th>
        <th title="Sắp xếp" style="width: 10%" onclick="sortProductsTable('khuyenmai')">
          Khuyến mãi <i class="fa fa-sort"></i>
        </th>
        <th title="Sắp xếp" style="width: 10%" onclick="sortProductsTable('gia')">
          Trạng thái <i class="fa fa-sort"></i>
        </th>
        <th style="width: 20%">Hành động</th>
      </tr>
    </tbody>
  </table>

  <div class="table-content">
    <table class="table-outline hideImg">
      <tbody>
        @php
        $i=1;
        @endphp
        @foreach ($product['sanpham'] as $produ)

        <tr>
          <td style="width: 5%">{{$i}}</td>
          <td style="width: 10%">{{$produ->MaSP}}</td>
          <td style="width: 30%">
            <a title="Xem chi tiết" target="_blank" href="#">{{$produ->TenSP}}</a>

            @if ($produ->HinhAnh)
            <img src='../img/products/{{$produ->HinhAnh}}' />
            @endif
          </td>
          <td style="width: 15%">{{number_format($produ->DonGia,0)}}</td>
          <td style="width: 10%">{{$produ->khuyenmai->TenKM}}</td>
          @if ($produ->TrangThai == 1)
          <td style="width: 10%">Hiện</td>
          @else
          <td style="width: 10%">Ẩn</td>
          @endif
          <td style="width: 20%">
            <div class="tooltip">

              <i class="fa fa-wrench" onclick='addKhungSP("{{ csrf_token() }}",{{$produ->MaSP}})'></i>
              <span class="tooltiptext">Sửa</span>
            </div>
            <div class="tooltip">
              <i class="fa fa-trash"
                onclick="xoaSanPham('{{ $produ->MaSP }}',{{$produ->TrangThai}},'{{$produ->TenSP}}')"></i>
              <span class="tooltiptext">Xóa</span>
            </div>
            @if ($produ->TrangThai == 0)
            <div class="tooltip">
              <i class="fa fa-eye"
                onclick="updatett_sp('{{ $produ->MaSP }}',{{$produ->TrangThai}},'{{$produ->TenSP}}')"></i>
              <span class="tooltiptext">Hiện</span>
            </div>
            @else
            <div class="tooltip">
              <i class="fa fa-eye-slash"
                onclick="updatett_sp('{{ $produ->MaSP }}',{{$produ->TrangThai}},'{{$produ->TenSP}}')"></i>
              <span class="tooltiptext">Ẩn</span>
            </div>
            @endif
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
    <select name="kieuTimSanPham">
      <option value="ma">Tìm theo mã</option>
      <option value="ten">Tìm theo tên</option>
    </select>
    <input type="text" placeholder="Tìm kiếm..." onkeyup="timKiemSanPham(this)" />
    <button onclick="document.getElementById('khungThemSanPham').style.transform = 'scale(1)'; ">
      <i class="fa fa-plus-square"></i>
      Thêm sản phẩm
    </button>
  </div>
  <!-- onsubmit="return themSanPham();" -->
  <div id="khungThemSanPham" class="overlay">
    @include("admin.khungThemSP",['khuyenmai'=>$product['khuyenmai'],'hangsx'=>$product['hangsx']])
  </div>
  <div id="khungSuaSanPham" class="overlay"></div>
  {{-- @include("admin.khungSuaSP",["detai_sp"=>""]); --}}
</div>
<!-- // sanpham -->
@endsection