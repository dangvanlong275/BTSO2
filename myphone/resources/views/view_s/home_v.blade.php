<div class="companyMenu group flexContain">
    @foreach ($loaisp as $loaisp)
    <a href="{{route('search_gt',['hangsx'=>$loaisp->MaLSP])}}">
        <button><img src="img/company/{{$loaisp->HinhAnh}}"></button>
    </a>
    @endforeach
</div>

<div class="timNangCao">
    <div class="flexContain">
        <div class="pricesRangeFilter dropdown">
            <button class="dropbtn">Giá tiền</button>
            <div class="dropdown-content">
                <a href="{{ route('search_gt',['giatien'=>"'0',2000000"]) }}">
                    Dưới 2triệu</a>
                <a href="{{ route('search_gt',['giatien'=>"2000000,4000000"]) }}">
                    Từ 2 - 4 triệu</a>
                <a href="{{ route('search_gt',['giatien'=>"4000000,7000000"]) }}">
                    Từ 4 - 7 triệu</a>
                <a href="{{ route('search_gt',['giatien'=>"7000000,13000000"]) }}">
                    Từ 7 - 13 triệu</a>
                <a href="{{ route('search_gt',['giatien'=>"13000000,1000000000"]) }}">
                    Trên 13 triệu</a>
            </div>
        </div>

        <div class="promosFilter dropdown">
            <button class="dropbtn">Khuyến mãi</button>
            <div class="dropdown-content">
                @foreach ($khuyenmai as $km)
                    <a href="{{ route('search_gt',['khuyenmai'=>$km->MaKM]) }}">{{$km->TenKM}}</a>
                @endforeach
            </div>
        </div>

        <div class="starFilter dropdown">
            <button class="dropbtn">Số lượng sao</button>
            <div class="dropdown-content">
                <a href="{{ route('search_gt',['sosao'=>"'0'"]) }}">Từ 0 sao trở lên</a>
                <a href="{{ route('search_gt',['sosao'=>"1"]) }}">Từ 1 sao trở lên</a>
                <a href="{{ route('search_gt',['sosao'=>"2"]) }}">Từ 2 sao trở lên</a>
                <a href="{{ route('search_gt',['sosao'=>"3"]) }}">Từ 3 sao trở lên</a>
                <a href="{{ route('search_gt',['sosao'=>"4"]) }}">Từ 4 sao trở lên</a>
                <a href="{{ route('search_gt',['sosao'=>"5"]) }}">Từ 5 sao trở lên</a>
            </div>
        </div>
        <div class="sortFilter dropdown">
            <button class="dropbtn">Sắp xếp</button>
            <div class="dropdown-content">
                <a href="{{ route('search_gt',['sapxep_dg'=>"DonGia,ASC"]) }}">Giá tăng dần</a>
                <a href="{{ route('search_gt',['sapxep_dg'=>"DonGia,DESC "]) }}">Giá giảm dần</a>
                <a href="{{ route('search_gt',['sapxep_dg'=>"SoSao,ASC"]) }}">Sao tăng dần</a>
                <a href="{{ route('search_gt',['sapxep_dg'=>"SoSao,DESC "]) }}">Sao giảm dần</a>
            </div>
        </div>
    </div>


</div> <!-- End khung chọn bộ lọc -->

