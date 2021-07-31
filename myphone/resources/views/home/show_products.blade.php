
@extends("home")
@section("NoiBatNhat")
    @php
        $i=1
    @endphp
    <div class="khungSanPham" style="border-color: #ff9c00">
        <h3 class="tenKhung" style="background-image: linear-gradient(120deg, #ff9c00 0%, #ec1f1f 50%, #ff9c00 100%);">* NỔI BẬT NHẤT *</h3>
        <div class="listSpTrongKhung flexContain" data-tenkhung="NỔI BẬT NHẤT">

            @includeIf('home.products',['list_sp'=>$list_product['noibatnhat']])
            
        </div>
        <a class="xemTatCa" style=" border-left: 2px solid #ff9c00; border-right: 2px solid #ff9c00;" href="{{route('search_gt',['khuyenmai'=> ' '])}}">
            Xem tất cả {{count($list_product['noibatnhat'])}} sản phẩm
        </a>
    </div> 
    <hr>
@endsection

{{-- Sản phẩm mới --}}


@section("SanPhamMoi")
    @php
        $i=1
    @endphp
    <div class="khungSanPham" style="border-color: #42bcf4">
        <h3 class="tenKhung" style="background-image: linear-gradient(120deg, #42bcf4 0%, #004c70 50%, #42bcf4 100%);">* SẢN PHẨM MỚI *</h3>
        <div class="listSpTrongKhung flexContain" data-tenkhung="SẢN PHẨM MỚI">

            @includeIf('home.products',['list_sp'=>$list_product['sanphammoi']])
            
        </div>
        <a class="xemTatCa" style=" border-left: 2px solid #ff9c00; border-right: 2px solid #ff9c00;" href="{{route('search_gt',['khuyenmai'=>'5'])}}">
            Xem tất cả {{count($list_product['sanphammoi'])}} sản phẩm
        </a>
    </div> 
    <hr>
@endsection
{{-- Trả góp --}}


@section("TraGop")
    @php
        $i=1
    @endphp
    <div class="khungSanPham" style="border-color: #ff9c00">
        <h3 class="tenKhung" style="background-image: linear-gradient(120deg, #ff9c00 0%, #ec1f1f 50%, #ff9c00 100%);">* TRẢ GÓP *</h3>
        <div class="listSpTrongKhung flexContain" data-tenkhung="TRẢ GÓP">

            @includeIf('home.products',['list_sp'=>$list_product['tragop']])

        </div>
        <a class="xemTatCa" style=" border-left: 2px solid #ff9c00; border-right: 2px solid #ff9c00;" href="{{route('search_gt',['khuyenmai'=>'4'])}}">
            Xem tất cả {{count($list_product['sanphammoi'])}} sản phẩm
        </a>
    </div> 
    <hr>
@endsection
{{-- Giá sốc online --}}


@section("GiamSocOnline")
    @php
        $i=1
    @endphp
    <div class="khungSanPham" style="border-color: #5de272">
        <h3 class="tenKhung" style="background-image: linear-gradient(120deg, #5de272 0%, #007012 50%, #5de272 100%);">* GIÁ SỐC ONLINE *</h3>
        <div class="listSpTrongKhung flexContain" data-tenkhung="GIÁ SỐC ONLINE">

            @includeIf('home.products',['list_sp'=>$list_product['giasoc']])

        </div>
        <a class="xemTatCa" style=" border-left: 2px solid #ff9c00; border-right: 2px solid #ff9c00;" href="{{route('search_gt',['khuyenmai'=>'3'])}}">
            Xem tất cả {{count($list_product['giasoc'])}} sản phẩm
        </a>
    </div> 
    <hr>
@endsection
{{-- Giảm giá lớn --}}

@section("GiamGiaLon")
    @php
        $i=1
    @endphp
    <div class="khungSanPham" style="border-color: #ff9c00">
        <h3 class="tenKhung" style="background-image: linear-gradient(120deg, #ff9c00 0%, #ec1f1f 50%, #ff9c00 100%);">* GIẢM GIÁ LỚN *</h3>
        <div class="listSpTrongKhung flexContain" data-tenkhung="GIẢM GIÁ LỚN">

            @includeIf('home.products',['list_sp'=>$list_product['giamgia']])

        </div>
        <a class="xemTatCa" style=" border-left: 2px solid #ff9c00; border-right: 2px solid #ff9c00;" href="{{route('search_gt',['khuyenmai'=>'2'])}}">
            Xem tất cả {{count($list_product['giamgia'])}} sản phẩm
        </a>
    </div> 
    <hr>
@endsection