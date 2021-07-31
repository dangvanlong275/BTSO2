@php
    
    $hangsx = !empty(Session::get('hangsx')) ? Session::get('hangsx') : -1;
    $giatienbd = !empty(Session::get('giatien')[0]) ? Session::get('giatien')[0] : -1;
    $giatienkt = !empty(Session::get('giatien')[1]) ? Session::get('giatien')[1] : -1;
    $sosao = !empty(Session::get('sosao')) ? Session::get('sosao') : -1;
    $khuyenmai = !empty(Session::get('khuyenmai')) ? Session::get('khuyenmai') : -1;
    $sapxep = !empty(Session::get('sapxep')[0]) ? Session::get('sapxep')[0] : -1;
@endphp
@if($hangsx != -1 || $giatienbd != -1 || $khuyenmai != -1 || $sosao != -1 || $sapxep != -1)
    @include('home.boloc')
@endif
<div class="contain-khungSanPham">
    <div class="khungSanPham" style="border-color: #ff9c00">
        <h3 class="tenKhung" style="background-image: linear-gradient(120deg, #ff9c00 0%, #ec1f1f 50%, #ff9c00 100%);">
            KẾT QUẢ TÌM KIẾM</h3>
        @php
            $soluong = count($list_sp);
        @endphp
        @if($soluong > 0)
        <div class="listSpTrongKhung flexContain">
            
            @foreach ($list_sp as $product)
            <li class="sanPham">
                <a href='{{route('chitietsanpham',['masp'=>$product->MaSP])}}'>
                    <img src="./img/products/{{$product->HinhAnh}}" alt="">

                    @switch($product->MaKM)
                    @case('2')
                    <label class="giamgia">
                        <i class="fa fa-bolt"></i>
                        Giảm giá lớn
                    </label>
                    @break
                    @case('4')
                    <label class="giareonline">
                        Giá sốc online
                    </label>
                    @break
                    @case('3')
                    <label class="tragop">
                        Trả góp 0%
                    </label>
                    @break
                    @case('5')
                    <label class="moiramat">
                        Mới ra mắt
                    </label>
                    @break
                    @endswitch
                    <h3>{{$product->TenSP}}</h3>


                    <div class="price">
                        <strong>{{number_format($product->DonGia,0)}}</strong>
                    </div>
                    <div class="ratingresult">
                        @for ($j=1;$j<=$product->SoSao;$j++)
                            <i class="fa fa-star"></i>
                        @endfor
                        @for ($j=1;$j<=5-$product->SoSao;$j++)
                            <i class="fa fa-star-o"></i>
                         @endfor

                                <span>{{$product->SoDanhGia}} đánh giá</span>
                    </div>
                </a>
                </li>
                @endforeach

        </div>
        @else
        <div class="listSpTrongKhung flexContain">
            <h3>Không tìm thấy sản phẩm</h3>
        </div>
        @endif
        @if ($sl > 0)

            <a class="xemTatCa" style=" border-left: 2px solid #ff9c00; border-right: 2px solid #ff9c00;" href="{{route('search_xt_loc',['keyword'=>Session::get('keyword')])}}">
                Còn {{$sl}} sản phẩm
            </a>
        @else
            <a class="xemTatCa" style=" border-left: 2px solid #ff9c00; border-right: 2px solid #ff9c00;">
            </a>
        @endif
        
    </div>

</div>
