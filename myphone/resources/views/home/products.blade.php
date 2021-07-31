@foreach ($list_sp as $product)
@if ($i <= 5) 
<li class="sanPham">
    <a href='{{route('chitietsanpham',['masp'=>$product->MaSP])}}'>
        <img src="./img/products/{{$product->HinhAnh}}" alt="">
        <h3>{{$product->TenSP}}</h3>
        <div class="price">
            @php
                $giagoc = $product->DonGia;
                $giamgia = $product->DonGia - $product->khuyenmai->GiaTriKM;

            @endphp
            @if($giagoc - $giamgia > 0)
            <strong>{{ number_format($giamgia ,0) }}</strong>
            <span>{{ number_format($giagoc,0) }}</span>
            @else
            <strong>{{ number_format($giagoc ,0) }}</strong>
            @endif
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
        @switch($product->MaKM)
        @case('2')
        <label class="giamgia">
            <i class="fa fa-bolt"></i>
            Giảm giá lớn
        </label>
        @break
        @case('3')
        <label class="giareonline">
            Giá sốc online
        </label>
        @break
        @case('4')
        <label class="tragop">
            Trả góp 0%
        </label>
        @break
        @case('5')
        <label class="moiramat">
            Mới ra mắt
        </label>
        @break
        @default

        @endswitch

    </a>
    </li>
    @endif
    @php
    $i++
    @endphp
    @endforeach