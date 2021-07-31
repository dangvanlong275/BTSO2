<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon.ico" />

    <title>Thế giới điện thoại</title>

    <!-- Load font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    

    <!-- Jquery -->
    <script src="lib/Jquery/Jquery.min.js"></script>

    <!-- Bootstrap -->

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <!-- Slider -->
    
    <!-- our files -->
    <!-- css -->
    <link rel="stylesheet" href="css/gioHang.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/topnav.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="css/taikhoan.css">
    <link rel="stylesheet" href="css/trangchu.css">
    <link rel="stylesheet" href="css/home_products.css">
    <link rel="stylesheet" href="css/pagination_phantrang.css">
    <link rel="stylesheet" href="css/chitietsanpham.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/trangcanhan.css">


    <!-- js -->
    <script src="js/dungchung.js"></script>
    <script src="js/giohang.js"></script>


</head>
<style>
    .search_header {
        margin-left: 100px;
        width: 100%;
        height: 100%;
        position: absolute;
    }

    #search {
        margin-left: -5.5px;
        height: 34.1%;
        border: 1px solid;
    }
</style>

<body style="background: white">

    <div class="top-nav group">
        <section>
            <div class="social-top-nav">
                <a class="fa fa-facebook"></a>
                <a class="fa fa-twitter"></a>
                <a class="fa fa-google"></a>
                <a class="fa fa-youtube"></a>
            </div> <!-- End Social Topnav -->

            <ul class="top-nav-quicklink flexContain">
                <li><a href="home"><i class="fa fa-home"></i> Trang chủ</a></li>
                <li><a href=""><i class="fa fa-newspaper-o"></i> Tin tức</a></li>
                <li><a href=""><i class="fa fa-handshake-o"></i> Tuyển dụng</a></li>
                <li><a href=""><i class="fa fa-info-circle"></i> Giới thiệu</a></li>
                <li><a href=""><i class="fa fa-wrench"></i> Bảo hành</a></li>
                <li><a href="{{ url('lienhe') }}"><i class="fa fa-phone"></i> Liên hệ</a></li>
            </ul> <!-- End Quick link -->
        </section><!-- End Section -->
    </div><!-- End Top Nav  -->
    <section>
        <div class="header group">
            {{-- <div class="smallmenu" id="openmenu" onclick="smallmenu(1)">≡</div>
            <div style="display: none;" class="smallmenu" id="closemenu" onclick="smallmenu(0)">×</div> --}}
            <div class="logo">
                <a href="{{route('home')}}">
                    <img src="img/logo.png" alt="Trang chủ Smartphone Store" title="Trang chủ Smartphone Store">
                </a>
            </div> <!-- End Logo -->
            
            <div class="content">
                <div class="search_header">
                    <form enctype="multipart/form-data" method="get" action="{{route('search_gt')}}">@csrf
                        <div class="keyword">
                            <input style=" height: 34.9%;" name="keyword" type="text" placeholder="Nhập từ khóa tìm kiếm...">
                            <span>
                                <button id="search" type="submit"><i class="fa fa-search"></i>
                                    Tìm kiếm
                                </button>
                            </span>
                        </div>
                    </form>
                    <!-- End Form search -->
                    <div class="tags">
                        <strong>Từ khóa: </strong>
                        <a>Samsung</a>
                        <a>iPhone</a>
                        <a>Xiaomi</a>
                    </div>
                </div>
                </div>

                <div class="tools-member">
                    @if (session()->has('user'))
                    <div class="member">
                        <a id="btnTaiKhoan"><i class="fa fa-user"></i>
                            {{session()->get('user')->TaiKhoan}}
                        </a>
                        <div class="menuMember">
                            <a href="{{ route('trangcanhan') }}">Trang người dùng</a>
                            <a href="{{ route('donmua') }}">Đơn mua</a>
                            <a href="{{ route('logout_nd') }}">Đăng xuất</a>
                        </div>
                    </div>
                    @else
                    <div class="member">
                        <a id="btnTaiKhoan"><i class="fa fa-user"></i>
                        </a>
                        <div class="menuMember">
                            <a href="{{ route('login_nd') }}">Đăng nhập</a>
                            <a href="{{ route('register') }}">Đăng ký</a>
                        </div>
                    </div>
                    @endif
                    <!-- End Member -->

                    <div class="cart">
                        <a href="giohang">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Giỏ hàng</span>
                            <span class="cart-number">
                                @if(session()->has('cart'))
                                {{session('cart')->totalQty}}
                                @endif

                            </span>
                        </a>
                    </div>
                </div><!-- End Tools Member -->
            </div> <!-- End Content -->
        </div> <!-- End Header -->