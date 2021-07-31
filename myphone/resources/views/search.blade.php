 
@include("./view_s/header_v")
@include ("./view_s/home_v")
<hr>
@includeIf('home.products_search')

</section>
<div class="plc">
    <section>
        <ul class="flexContain">
            <li>Giao hàng hỏa tốc trong 1 giờ</li>
            <li>Thanh toán linh hoạt: tiền mặt, visa / master, trả góp</li>
            <li>Trải nghiệm sản phẩm tại nhà</li>
            <li>Lỗi đổi tại nhà trong 1 ngày</li>
            <li>Hỗ trợ suốt thời gian sử dụng.
                <br>Hotline:
                <a href="tel:12345678" style="color: #288ad6;">1234.5678</a>
            </li>
        </ul>
    </section>
</div>
@include("./view_s/footer_v")