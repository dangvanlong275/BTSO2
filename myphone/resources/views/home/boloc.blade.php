<div class="choosedFilter flexContain">
    
    
    <a href="{{ route('delete_loc',['loaixoa'=>"xoaboloc"]) }}">
        <h3>Xóa bộ lọc <i class="fa fa-close"></i></h3>
    </a>
    @foreach ($loaisp as $lsp)
        @if($lsp->MaLSP == $hangsx)
            <a href="{{ route('delete_loc',['loaixoa'=>"hangsx"]) }}">
                <h3>{{$lsp->TenLSP}}<i class="fa fa-close"></i></h3>
            </a>
        @endif
    @endforeach
    
    @switch($giatienbd)
        @case(0)
            <a href="{{ route('delete_loc',['loaixoa'=>"giatien"]) }}">
                <h3>Dưới 2 triệu<i class="fa fa-close"></i></h3>
            </a>
        @break
        @case(2000000)
            <a href="{{ route('delete_loc',['loaixoa'=>"giatien"]) }}">
                <h3>Từ 2 - 4 triệu<i class="fa fa-close"></i></h3>
            </a>
            @break
        @case(4000000)
            <a href="{{ route('delete_loc',['loaixoa'=>"giatien"]) }}">
                <h3>Từ 4 - 7 triệu<i class="fa fa-close"></i></h3>
            </a>
            @break
        @case(7000000)
            <a href="{{ route('delete_loc',['loaixoa'=>"giatien"]) }}">
                <h3>Từ 7 - 13 triệu<i class="fa fa-close"></i></h3>
            </a>
            @break
        @case(13000000)
            <a href="{{ route('delete_loc',['loaixoa'=>"giatien"]) }}">
                <h3>Trên 13 triệu<i class="fa fa-close"></i></h3>
            </a>
            @break
        @default
            
    @endswitch
    
    @switch($khuyenmai)
        @case(1)
            <a href="{{ route('delete_loc',['loaixoa'=>"khuyenmai"]) }}">
                <h3>Không khuyến mãi <i class="fa fa-close"></i></h3>
            </a>
            @break
        @case(2)
            <a href="{{ route('delete_loc',['loaixoa'=>"khuyenmai"]) }}">
                <h3>Giảm giá<i class="fa fa-close"></i></h3>
            </a>
            @break
        @case(3)
            <a href="{{ route('delete_loc',['loaixoa'=>"khuyenmai"]) }}">
                <h3>Giá rẻ online<i class="fa fa-close"></i></h3>
            </a>
            @break
        @case(4)
            <a href="{{ route('delete_loc',['loaixoa'=>"khuyenmai"]) }}">
                <h3>Trả góp<i class="fa fa-close"></i></h3>
            </a>
            @break
        @case(5)
            <a href="{{ route('delete_loc',['loaixoa'=>"khuyenmai"]) }}">
                <h3>Mới ra mắt<i class="fa fa-close"></i></h3>
            </a>
            @break
        @default
            
    @endswitch
   
    @switch($sosao)
        @case(0)
            <a href="{{ route('delete_loc',['loaixoa'=>"sosao"]) }}">
                <h3>Từ 0 sao<i class="fa fa-close"></i></h3>
            </a>
            @break
        @case(1)
            <a href="{{ route('delete_loc',['loaixoa'=>"sosao"]) }}">
                <h3>Từ 1 sao<i class="fa fa-close"></i></h3>
            </a>
            @break
        @case(2)
            <a href="{{ route('delete_loc',['loaixoa'=>"sosao"]) }}">
                <h3>Từ 2 sao<i class="fa fa-close"></i></h3>
            </a>
            @break
        @case(3)
            <a href="{{ route('delete_loc',['loaixoa'=>"sosao"]) }}">
                <h3>Từ 3 sao<i class="fa fa-close"></i></h3>
            </a>
            @break
        @case(4)
            <a href="{{ route('delete_loc',['loaixoa'=>"sosao"]) }}">
                <h3>Từ 4 sao<i class="fa fa-close"></i></h3>
            </a>
            @break
        @case(5)
            <a href="{{ route('delete_loc',['loaixoa'=>"sosao"]) }}">
                <h3>Từ 5 sao<i class="fa fa-close"></i></h3>
            </a>
            @break
        @default
            
    @endswitch
    @switch($sapxep)
        @case('DonGia')
            @if (levenshtein($sapxep[1],'DESC'))
                <a href="{{ route('delete_loc',['loaixoa'=>"sapxep"]) }}">
                    <h3>Giá giảm dần<i class="fa fa-close"></i></h3>
                </a>
            @else
                <a href="{{ route('delete_loc',['loaixoa'=>"sapxep"]) }}">
                    <h3>Giá tăng dần<i class="fa fa-close"></i></h3>
                </a>
            @endif
            @break
        @case('SoSao')
            @if (levenshtein($sapxep[1],'DESC'))
                <a href="{{ route('delete_loc',['loaixoa'=>"sapxep"]) }}">
                    <h3>Sao giảm dần<i class="fa fa-close"></i></h3>
                </a>
            @else
                <a href="{{ route('delete_loc',['loaixoa'=>"sapxep"]) }}">
                    <h3>Sao tăng dần<i class="fa fa-close"></i></h3>
                </a>
            @endif
            @break
        @default
            
    @endswitch
    {{-- <a href="{{ route('delete_loc',['sapxep_dg'=>""]) }}">
        <h3>Giá tăng dần <i class="fa fa-close"></i></h3>
    </a> --}}
</div>
<hr>