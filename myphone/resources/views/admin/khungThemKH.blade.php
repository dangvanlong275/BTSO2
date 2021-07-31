<div id="khungThemNguoiDung" class="overlay">
    <span class="close" onclick="this.parentElement.style.transform = 'scale(0)';">×</span>
    <form method="post" action="add_khachhang" enctype="multipart/form-data">
        @csrf
        <input type="text" name="trangthai" value="1" hidden="">
        <table class="overlayTable table-outline table-content table-header">
            <tbody>
                <tr>
                    <th colspan="2">Thêm Người Dùng</th>
                </tr>
                <tr>
                    <td>Họ :</td>
                    <td><input type="text" name="ho"></td>
                </tr>

                <tr>
                    <td>Tên:</td>
                    <td><input type="text" name="ten"></td>
                </tr>
                <tr>
                    <td>Giới tính:</td>
                    <td>
                        <input type="radio" name="gender" value="Nam" checked="">Nam
                        <input type="radio" name="gender" value="Nữ">Nữ
                    </td>
                </tr>
                <tr>
                    <td>Số điện thoại:</td>
                    <td><input type="text" maxlength="10" name="sdt"></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email"></td>
                </tr>
                <tr>
                    <td>Địa chỉ:</td>
                    <td><input type="text" name="diachi"></td>
                </tr>
                <tr>
                    <td>Tài khoản:</td>
                    <td><input type="text" name="taikhoan"></td>
                </tr>
                <tr>
                    <td>Mật khẩu:</td>
                    <td><input type="password" name="matkhau"></td>
                </tr>
                <tr>

                </tr>
                <tr>
                    <td colspan="2" class="table-footer"> <button type="submit">THÊM</button> </td>
                </tr>
            </tbody>
        </table>
    </form>

</div>