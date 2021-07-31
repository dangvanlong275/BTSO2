<div id="khungSuaSanPham" class="overlay" style="transform: scale(1);"><span class="close" onclick="this.parentElement.style.transform = 'scale(0)';">×</span>
    <form method="post" action="php/thongtinsp.php" enctype="multipart/form-data">
        <input type="text" name="request" value="update" hidden="hidden">
        <table class="overlayTable table-outline table-content table-header">
            <tbody><tr>
                <th colspan="2">SamSung Galaxy J4+</th>
            </tr>
            <tr style="display: none;">
                <td>Mã sản phẩm:</td>
                <td><input readonly="" type="text" id="masp" name="masp" value="1"></td>
            </tr>
            <tr>
                <td>Tên sẩn phẩm:</td>
                <td><input type="text" name="tensp" value="SamSung Galaxy J4+"></td>
            </tr>
            <tr>
                <td>Hãng:</td>
                <td>
                    <select name="company" onchange="autoMaSanPham(this.value)"><option value="1">Apple</option><option value="2">Coolpad</option><option value="3">HTC</option><option value="4">Itel</option><option value="5">Mobell</option><option value="6">Vivo</option><option value="7">Oppo</option><option value="8" selected="selected">SamSung</option><option value="9">Phillips</option><option value="10">Nokia</option><option value="11">Motorola</option><option value="12">Mobiistar</option><option value="14">Xiaomi</option></select>
                </td>
            </tr>
            <tr>
                <td>Hình:</td>
                <td>
                    <div>
                        <div id="exit" class="pull-right" onclick="resethinh('hinhanh2','exit','hinhanhgoc','anhDaiDienSanPhamThem')">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </div>
                        <img class="hinhDaiDien" id="anhDaiDienSanPhamThem" src="./img/products/unnamed.png">
                    </div>
                    <input type="file" name="hinhanh" id="hinhanh2" onchange="capNhatAnhSanPham(this.files,'anhDaiDienSanPhamThem','exit')">
                    <input style="display: none;" type="text" name="hinhanhgoc" id="hinhanhgoc" value="./img/products/unnamed.png">
                    
                </td>
            </tr>
            <tr>
                <td>Giá tiền:</td>
                <td><input type="text" name="dongia" value="3490000"></td>
            </tr>
            <tr>
                <td>Số lượng:</td>
                <td><input type="text" name="soluong" value="10"></td>
            </tr>
            <tr>
                <td>Số sao:</td>
                <td><input type="text" name="sosao" value="0"></td>
            </tr>
            <tr>
                <td>Đánh giá:</td>
                <td><input type="text" name="sodanhgia" value="0"></td>
            </tr>
            <tr>
                <td>Khuyến mãi:</td>
                <td>
                    <select name="khuyenmai" id="khuyenmai_ssp" onchange="showGTKM('khuyenmai_ssp','gtkhuyenmai_ssp')"><option selected="selected" value="1">Không khuyến mãi</option><option value="2">Giảm giá</option><option value="3">Giá rẻ online</option><option value="4">Trả góp</option><option value="5">Mới ra mắt</option></select>
                </td>
            </tr>
            <tr>
                <td>Giá trị khuyến mãi:</td>
                <td><input id="gtkhuyenmai_ssp" type="text" value="0"></td>
            </tr>
            <tr>
                <th colspan="2">Thông số kĩ thuật</th>
            </tr>
            <tr>
                <td>Màn hình:</td>
                <td><input type="text" name="manhinh" value="IPS LCD, 6.0, HD+"></td>
            </tr>
            <tr>
                <td>Hệ điều hành:</td>
                <td><input type="text" name="hdh" value="Android 8.1 (Oreo)"></td>
            </tr>
            <tr>
                <td>Camara sau:</td>
                <td><input type="text" name="camsau" value="13 MP"></td>
            </tr>
            <tr>
                <td>Camara trước:</td>
                <td><input type="text" name="camtruoc" value="5 MP"></td>
            </tr>
            <tr>
                <td>CPU:</td>
                <td><input type="text" name="cpu" value="Qualcomm Snapdragon 425 4 nhân 64-bit"></td>
            </tr>
            <tr>
                <td>RAM:</td>
                <td><input type="text" name="ram" value="2 GB"></td>
            </tr>
            <tr>
                <td>Bộ nhớ trong:</td>
                <td><input type="text" name="rom" value="16 GB"></td>
            </tr>
            <tr>
                <td>Thẻ nhớ:</td>
                <td><input type="text" name="sdcard" value="MicroSD, hỗ trợ tối đa 256 GB"></td>
            </tr>
            <tr>
                <td>Dung lượng Pin:</td>
                <td><input type="text" name="pin" value="3300 mAh"></td>
            </tr>
            <tr>
                <td>Trạng thái:</td>
                <td><input type="number" min="0" max="1" name="trangthai" value="1"></td>
            </tr>
            <tr>
                <td colspan="2" class="table-footer"> <button name="submit">SỬA</button> </td>
            </tr>
        </tbody></table></form></div>