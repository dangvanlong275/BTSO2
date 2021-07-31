<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
	integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
@include("./view_s/header_v")

<table class="listSanPham">
	<tbody>
		<tr>
			<th>Sản phẩm</th>
			<th>Giá</th>
			<th>Số lượng</th>
			<th>Thành tiền</th>
			<th>Xóa</th>
		</tr>

		@if(session()->has('cart'))
		@foreach (session('cart')->items as $sanpham)
		<tr>
			<td class="noPadding">
				<a target="_blank" href="{{ route('chitietsanpham',['masp'=>$sanpham['sanpham']->MaSP]) }}"
					title="Xem chi tiết">
					<img class="smallImg" src="img/products/{{$sanpham['sanpham']->HinhAnh}}">
					<br>
					{{$sanpham['sanpham']->TenSP}}
				</a>
			</td>
			<td class="alignRight">{{number_format($sanpham['sanpham']->DonGia,0)}} ₫</td>
			<td class="soluong">
				{{--  --}}
				<button onclick="giamSoLuong('{{$sanpham['sanpham']->MaSP}}')"><i class="fa fa-minus"></i></button>
				<input size="1" onchange="capNhatSoLuongFromInput(this, '2')" value="{{$sanpham['tongsl']}}">
				<button onclick="tangSoLuong('{{$sanpham['sanpham']->MaSP}}')"><i class="fa fa-plus"></i></button>
			</td>
			<td class="alignRight">{{number_format($sanpham['tongtien'],0)}}₫</td>
			<td class="noPadding">
				<i class="fa fa-trash"
					onclick="xoaSanPhamTrongGioHang({{$sanpham['sanpham']->MaSP}},'{{$sanpham['sanpham']->TenSP}}')"></i>
			</td>
		</tr>
		<tr style="font-weight:bold; text-align:center">
			<td colspan="3">TỔNG TIỀN: </td>
			<td class="alignRight" style="color:red">{{number_format(session('cart')->totalPrice,0)}} ₫</td>
			<td></td>
		</tr>
		@endforeach
		@else
		<tr>
			<td colspan="7">
				<h1 style="color:green; background-color:white; font-weight:bold; text-align:center; padding: 15px 0;">
					Giỏ hàng trống !!
				</h1>
			</td>
		</tr>


		@endif
		<tr>
			<td colspan="5">
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
					<i class="fa fa-usd"></i> Thanh Toán
				</button>
				<button class="btn btn-danger" onclick="xoaHet()">
					<i class="fa fa-trash-o"></i> Xóa hết
				</button>
			</td>
		</tr>
	</tbody>
</table>
@if(session()->has('user'))
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
			</div>
			<form action="{{route('thanhtoan')}}" method="post" enctype="multipart/form-data"> @csrf
				<div class="modal-body" id="thongtinthanhtoan">

					<div class="form-group">
						<p>Tổng tiền : </p>
						<h2>
							@if(session()->has('cart'))
							{{number_format(session('cart')->totalPrice,0)}}
							@endif
						</h2>
						<p></p>
					</div>
					<div class="form-group">
						<label for="inputTen">Tên người nhận</label>
						<input class="form-control input-sm" name="hoten" required type="text"
							value="{{session('user')->Ho." ".session('user')->Ten}}">
					</div>
					<div class="form-group">
						<label for="inputSDT">SDT người nhận</label>
						<input class="form-control input-sm" name="sdt" required="" type="text" pattern="\d*"
							minlength="0" maxlength="10" value="{{session('user')->SDT}}">
					</div>
					<div class="form-group">
						<label for="inputDiaChi">Địa chỉ giao hàng</label>
						<input class="form-control input-sm" name="diachi" required type="text"
							value="{{session('user')->DiaChi}}">
					</div>
					<div class="form-group">
						<select class="browser-default custom-select" name="hinhthuctt" required>
							<option value="" disabled selected>Hình thức thanh toán</option>
							<option value="Trực tiếp khi nhận hàng">Trực tiếp khi nhận hàng</option>
							<option value="Qua thẻ ngân hàng">Qua thẻ ngân hàng</option>
						</select>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Xác nhận</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endif

@include("./view_s/footer_v")