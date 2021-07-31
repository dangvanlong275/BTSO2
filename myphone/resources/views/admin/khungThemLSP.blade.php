<div id="khungThemLSP" class="overlay">
    <span class="close" onclick="this.parentElement.style.transform = 'scale(0)';">×</span>
    <form method="post" action="add_loaisp" enctype="multipart/form-data">
        @csrf
        <table class="overlayTable table-outline table-content table-header">
            <tbody>
                <tr>
                    <th colspan="2">Thêm Loại Sản Phẩm</th>
                </tr>
                <tr>
                    <td>Tên loại sản phẩm:</td>
                    <td><input name="tenlsp" type="text"></td>
                </tr>
                <tr>
                    <td>Hình ảnh:</td>
                    <td>
                        <div>
                            <div style="display:none" id="exit_tlsp" class="pull-right"
                                onclick="resethinh('hinhanh_tlsp','exit_tlsp','anhDaiDienLSPThem')">
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </div>
                            <img class="hinhDaiDien" id="anhDaiDienLSPThem" src="">
                        </div>
                        <input type="file" name="hinhanh" id="hinhanh_tlsp" onchange="capNhatAnhSanPham(this.files,'anhDaiDienLSPThem','exit_tlsp')">
                        <input style="display: none;" type="text" name="hinhanhgoc_lsp" value="">

                    </td>
                </tr>
                <tr>
                    <td>Mô tả:</td>
                    <td><textarea name="mota" rows="5" cols="40"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" class="table-footer"> <button name="submit">THÊM</button> </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>