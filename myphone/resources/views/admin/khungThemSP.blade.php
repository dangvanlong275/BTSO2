
  <span class="close" onclick="this.parentElement.style.transform = 'scale(0)';">×</span>
    <form method="post" action="{{route('add_sanpham')}}" enctype="multipart/form-data"> @csrf
      <table class="overlayTable table-outline table-content table-header">
        <tbody>
          <tr>
            <th colspan="2">Thêm Sản Phẩm</th>
          </tr>
          <tr>
            <td>Tên sản phẩm:</td>
            <td><input name="tensp" type="text" required/></td>
          </tr>
          <tr>
            <td>Hãng:</td>
            <td>
              <select name="malsp">
                @foreach ($hangsx as $company)
                  
                  <option value="{{$company->MaLSP}}">{{$company->TenLSP}}</option>
                
                @endforeach
              </select>
            </td>
          </tr>

          <tr>
            <td>Hình:</td>
            <td>
              <div>
                <div style="display: none" id="exit1" class="pull-right" onclick="resethinh('hinhanh1','exit1','anhDaiDienSP1')">
                  <i class="fa fa-times-circle" aria-hidden="true"></i>
                </div>
                <img class="hinhDaiDien" id="anhDaiDienSP1" src="" />
              </div>
              <input type="file" name="hinhanh" id="hinhanh1" onchange="capNhatAnhSanPham(this.files,'anhDaiDienSP1','exit1')"/>
              
              <input style="display: none;" type="text" name="hinhanhgoc">
            </td>
          </tr>
          <tr>
            <td>Giá tiền:</td>
            <td><input name="dongia" type="number" required min="0"/></td>
          </tr>
          <tr>
            <td>Số lượng:</td>
            <td><input name="soluong" type="text" value="0" required/></td>
          </tr>
          <tr>
            <td>Khuyến mãi:</td>
            <td>
              <select name="khuyenmai" id="khuyenmai_spt" onchange="showGTKM('khuyenmai_spt','gtkhuyenmai_spt')">
                @foreach ($khuyenmai as $km)
                  <option value="{{$km->MaKM}}">{{$km->TenKM}}</option>
                @endforeach
              </select>
            </td>
          </tr>
          <tr>
            <td>Giá trị khuyến mãi:</td>
            <td><input id="gtkhuyenmai_spt" type="number" required min="0"/></td>
          </tr>
          <tr>
            <th colspan="2">Thông số kĩ thuật</th>
          </tr>
          <tr>
            <td>Màn hình:</td>
            <td><input name="manhinh" type="text" required/></td>
          </tr>
          <tr>
            <td>Hệ điều hành:</td>
            <td><input name="hdh" type="text" required/></td>
          </tr>
          <tr>
            <td>Camara sau:</td>
            <td><input name="camsau" type="text" required/></td>
          </tr>
          <tr>
            <td>Camara trước:</td>
            <td><input name="camtruoc" type="text" required/></td>
          </tr>
          <tr>
            <td>CPU:</td>
            <td><input name="cpu" type="text" required/></td>
          </tr>
          <tr>
            <td>RAM:</td>
            <td><input name="ram" type="text" required/></td>
          </tr>
          <tr>
            <td>Bộ nhớ trong:</td>
            <td><input name="rom" type="text" required/></td>
          </tr>
          <tr>
            <td>Thẻ nhớ:</td>
            <td><input name="sdcard" type="text" required/></td>
          </tr>
          <tr>
            <td>Dung lượng Pin:</td>
            <td><input name="pin" type="text" required/></td>
          </tr>
          <tr>
            <td colspan="2" class="table-footer">
              <button name="submit">THÊM</button>
            </td>
          </tr>
        </tbody>
      </table>
    </form>