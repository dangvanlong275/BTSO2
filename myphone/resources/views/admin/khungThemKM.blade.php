<div id="khungThemKM" class="overlay">
    <span class="close" onclick="this.parentElement.style.transform = 'scale(0)';">×</span>
    <form method="post" action="add_khuyenmai" enctype="multipart/form-data" onsubmit="return testdate('ngaybd_t','ngaykt_t');">
        @csrf
        <table class="overlayTable table-outline table-content table-header">
            <tbody><tr>
                <th colspan="2">Thêm Sản Phẩm</th>
            </tr>
            <tr>
                <td>Tên khuyến mãi:</td>
                <td><input name="tenkm" type="text" required></td>
            </tr>
            <tr>
                <td>Giá trị khuyến mãi:</td>
                <td><input name="gtkhuyenmai" type="number" required min="0"></td>
            </tr>
            <tr>
                <td>Ngày bắt đầu:</td>
                <td><input name="ngaybd" id="ngaybd_t" type="datetime-local"></td>
            </tr>
            <tr>
                <td>Ngày kết thúc:</td>
                <td><input name="ngaykt" id="ngaykt_t" type="datetime-local"></td>
            </tr>
            
            <tr>
                <td colspan="2" class="table-footer"> <button name="submit">THÊM</button> </td>
            </tr>
        </tbody></table>
    </form>
</div>