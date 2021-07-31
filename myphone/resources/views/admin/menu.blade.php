@include('admin.header')

<body>
    <header>
        <h2>SmartPhone Store - Admin</h2>
    </header>
    <!-- Menu -->
    <aside class="sidebar">
        <ul class="nav">
            <li class="nav-title">MENU</li>
            <li class="nav-item-active" id="nav_home"><a class="nav-link "><i class="fa fa-home"></i> Home</a></li>
            <li class="nav-item">
                <a id="nav_sanpham" class="nav-link " href="{{route('show_sanpham')}}"
                    onclick="nav_active('sanpham')"><i class="fa fa-th-large"></i> Sản Phẩm</a>
            </li>
            <li class="nav-item" id="nav_lsanpham">
                <a class="nav-link" href="{{route('show_loaisanpham')}}"><i class="fa fa-bars"></i> Loại Sản Phẩm</a>
            </li>
            <li class="nav-item" id="nav_khuyenmai">
                <a class="nav-link" href="{{route('show_khuyenmai')}}"><i class="fa fa-product-hunt"></i> Khuyến Mãi</a>
            </li>
            <li class="nav-item" id="nav_donhang">
                <a class="nav-link" href="{{route('show_donhang')}}"><i class="fa fa-file-text-o"></i> Đơn Hàng</a>
            </li>
            <li class="nav-item" id="nav_khachhang">
                <a class="nav-link" href="{{route('show_khachhang')}}"><i class="fa fa-address-book-o"></i> Khách Hàng</a>
            </li>
            <li class="nav-item" id="nav_khachhang">
                <a class="nav-link" href="{{route('show_lienhe')}}"><i class="fa fa-address-book-o"></i> Báo cáo sự cố</a>
            </li>
            <li class="nav-item" id="nav_thongke">
                <a class="nav-link" href="{{route('thongke')}}"><i class="fa fa-bar-chart-o"></i> Thống Kê</a>
            </li>
            <hr />
            <li class="nav-item">
                <a class="nav-link" id="btnDangXuat" href="{{route('logout_ad')}}">
                    <i class="fa fa-arrow-left"></i> Đăng xuất
                </a>
            </li>
        </ul>
    </aside>

    <!-- Khung hiển thị chính -->
    <div class="main">
        @yield('main')

</body>

</html>