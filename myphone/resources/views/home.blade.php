<style>
	.themvaogio {
		z-index: 20;
		border: 1px solid #e3e7eb;
		border-radius: 50%;
		width: 1.5em;
		height: 1.5em;
		font-size: 1.5em;
		color: rgb(163, 161, 161);
		background: none;
		transition-duration: .2s;
	}
</style>
@include("./view_s/header_v")
@include ("./view_s/home_v")
<div class="contain-khungSanPham">
	@yield('NoiBatNhat')
	@yield('SanPhamMoi')
	@yield('TraGop')
	@yield('GiamSocOnline')
	@yield('GiamGiaLon')
</div>


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