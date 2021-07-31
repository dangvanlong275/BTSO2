//Vẽ biểu đồ
function addChart(id, chartOption) {
    var ctx = document.getElementById(id).getContext('2d');
    var chart = new Chart(ctx, chartOption);
}

function addThongKe(ds_lsp, data) {
    var dataChart = {
        type: 'bar',
        data: {
            labels: ds_lsp,
            datasets: [{
                label: 'Số lượng bán ra',
                data: data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(191 62 255)',
                    'rgba(238 130 238)',
                    'rgba(160 32 240)',
                    'rgba(236 171 83)',
                    'rgba(0 128 128)',
                    'rgba(255 204 153)',
                    'rgba(255 52 179)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(238 130 238)',
                    'rgba(255 52 179)',
                    'rgba(0 128 128)',
                    'rgba(191 62 255)',
                    'rgba(160 32 240)',
                    'rgba(236 171 83)',
                    'rgba(255 204 153)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            title: {
                fontColor: '#fff',
                fontSize: 25,
                display: true,
                text: 'Sản phẩm bán ra'
            }
        }
    };

    var pieChart = copyObject(dataChart);
    pieChart.type = 'pie';
    addChart('myChart1', pieChart);

}

function copyObject(o) {
    return JSON.parse(JSON.stringify(o));
}

function thongke() {
    $.ajax({
        type: "get",
        url: "load",
        dataType: "json",
        success: function(data) {

            addThongKe(data['TenLSP'], data['SoLuong']);
        },
        error: function(e) {
            Swal.fire({
                type: "error",
                title: "Lỗi thống kê",
                html: e.responseText
            });
        }
    });
}


function showKhuyenMai(id_khung, id_gtkm, id_km, data) {
    var s = "";
    if (id_km == "") {
        s += `<option selected="selected" value="` + data[0].MaKM + `">` + data[0].TenKM + `</option>`;
        for (var i = 1; i < data.length; i++) {
            var d = data[i];
            s += `<option value="` + d.MaKM + `">` + d.TenKM + `</option>`;
        }
    } else {
        for (var i = 0; i < data.length; i++) {
            var d = data[i];
            if (d.MaKM === id_km) {
                s += `<option selected="selected" value="` + d.MaKM + `">` + d.TenKM + `</option>`;
                document.getElementById(id_gtkm).value = d.GiaTriKM;
                continue;
            }
            s += `<option value="` + d.MaKM + `">` + d.TenKM + `</option>`;

        }
    }
    document.getElementById(id_khung).innerHTML = s;
}

function showGTKM(id_khuyenmai, id_gtkm) {

    var giaTri = document.getElementById(id_khuyenmai).value;
    console.log(giaTri);
    switch (giaTri) {
        // lấy tất cả khuyến mãi
        case "1":
            document.getElementById(id_gtkm).value = 0;
            break;

        case "2":
            document.getElementById(id_gtkm).value = 500000;
            break;

        case "3":
            document.getElementById(id_gtkm).value = 650000;
            break;

        case "4":
            document.getElementById(id_gtkm).value = 0;
            break;

        case "5":
            document.getElementById(id_gtkm).value = 0;
            break;

        default:
            break;
    }
}

// ========================== Sản Phẩm ========================
// Vẽ bảng danh sách sản phẩm

// Tìm kiếm
function timKiemSanPham(inp) {
    var kieuTim = document.getElementsByName('kieuTimSanPham')[0].value;
    var text = inp.value;
    console.log(kieuTim);
    // Lọc
    var vitriKieuTim = {
        'ma': 1,
        'ten': 2
    }; // mảng lưu vị trí cột

    var listTr_table = document.getElementsByClassName('sanpham')[0].getElementsByClassName('table-content')[0].getElementsByTagName('tr');
    for (var tr of listTr_table) {
        var td = tr.getElementsByTagName('td')[vitriKieuTim[kieuTim]].innerHTML.toLowerCase();

        if (td.indexOf(text.toLowerCase()) < 0) {
            tr.style.display = 'none';
        } else {
            tr.style.display = '';
        }
    }
}

// Sửa

function capNhatAnhSanPham(files, id, id_div) {
    var src = window.URL.createObjectURL(files[0]);
    document.getElementById(id).src = src;

    document.getElementById(id_div).style.display = "block";
}

function resethinh(id_ha, id_div, id_hatemp, id_imgdd) {

    document.getElementById(id_ha).value = "";
    document.getElementById(id_hatemp).value = "";
    document.getElementById(id_imgdd).src = "";
    document.getElementById(id_div).style.display = "none";
}


// Cập nhật ảnh sản phẩm

// Sắp Xếp sản phẩm
function sortProductsTable(loai) {
    var list = document.getElementsByClassName('sanpham')[0].getElementsByClassName("table-content")[0];
    var tr = list.getElementsByTagName('tr');

    quickSort(tr, 0, tr.length - 1, loai, getValueOfTypeInTable_SanPham); // type cho phép lựa chọn sort theo mã hoặc tên hoặc giá ... 
    decrease = !decrease;
}

// Lấy giá trị của loại(cột) dữ liệu nào đó trong bảng
function getValueOfTypeInTable_SanPham(tr, loai) {
    var td = tr.getElementsByTagName('td');
    switch (loai) {
        case 'stt':
            return Number(td[0].innerHTML);
        case 'masp':
            return Number(td[1].innerHTML);
        case 'ten':
            return td[2].innerHTML.toLowerCase();
        case 'gia':
            return stringToNum(td[3].innerHTML);
        case 'khuyenmai':
            return td[4].innerHTML.toLowerCase();
    }
    return false;
}
// =========================Loại sản phẩm ======================

//sửa
function addKhungLSP(csrf, malsp) {
    $.ajax({
        type: "get",
        url: "show_khungSua",
        dataType: "json",
        // timeout: 1500, // sau 1.5 giây mà không phản hồi thì dừng => hiện lỗi
        data: {
            malsp: malsp
        },
        success: function(data, status, xhr) {
            //console.log(data);
            addKhungSuaLSP(csrf, data);
        },
        error: function() {
            Swal.fire({
                type: "error",
                title: "Lỗi addKhungLSP < admin.js"
            });
        }
    });
}

// function addKhungSuaLSP(csrf, data) {
//     console.log(data[0]);
// }

function addKhungSuaLSP(csrf, data) {
    var lsp = data[0];
    var s = `<span class="close" onclick="this.parentElement.style.transform = 'scale(0)';">&times;</span>
    <form method="post" action="update_lsp" enctype="multipart/form-data" >
        <input type="hidden" name="_token" value="` + csrf + `"/>
        <table class="overlayTable table-outline table-content table-header">
            <tr>
                <th colspan="2">` + lsp.TenLSP + `</th>
            </tr>
            <tr style = "display:none">
                <td><input type="text" id="malsp" name="malsp" value="` + lsp.MaLSP + `" required></td>
            </tr>
            <tr>
                <td>Tên loại sản phẩm:</td>
                <td><input type="text" name="tenlsp" value="` + lsp.TenLSP + `" required></td>
            </tr>
            <tr>
                <td>Hình Ảnh:</td>
                <td>
                    <div>
                        <div id="exit_slsp" class="pull-right" onclick="resethinh('hinhanh_slsp','exit_slsp','hinhanhgoc_lsp','anhDaiDienLSPSua')">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </div>
                        <img class="hinhDaiDien" id="anhDaiDienLSPSua" src="../img/company/` + lsp.HinhAnh + `">
                    </div>
                    <input type="file" name ="hinhanh" id="hinhanh_slsp" onchange="capNhatAnhSanPham(this.files,'anhDaiDienLSPSua','exit_slsp')">
                    <input style="display: none;" type="text" name="hinhanhgoc_lsp" id="hinhanhgoc_lsp" value="` + lsp.HinhAnh + `">
                </td>
            </tr>
            <tr>
                <td>Mô tả:</td>
                <td><textarea name="mota" rows="5" cols="40"    >` + lsp.Mota + `</textarea></td>
            </tr>
            <tr>
                <td colspan="2"  class="table-footer"> <button name="submit">SỬA</button> </td>
            </tr>
        </table>`

    var khung = document.getElementById('khungSuaLSP');
    khung.innerHTML = s;
    khung.style.transform = 'scale(1)';
}
//xóa
function xoaLoaiSanPham(malsp) {

    if (window.confirm('Bạn có chắc muốn xóa ! Sau khi xóa không thể khôi phục')) {
        // Xóa
        $.ajax({
            type: "get",
            url: "delete_lsp",
            dataType: "json",
            timeout: 1500, // sau 1.5 giây mà không phản hồi thì dừng => hiện lỗi
            data: {
                request: "delete",
                malsp: malsp
            },
            success: function(data, status, xhr) {

                Swal.fire({
                    type: 'success',
                    title: 'Xóa thành công'
                }).then((result) => {
                    location.href = 'show_loaisanpham';
                });
            },
            error: function() {
                Swal.fire({
                    type: "error",
                    title: "Lỗi xóa xoaLoaiSanPham < admin.js"
                });
            }
        });
    }

}


//tìm kiếm   
function timKiemLSP(inp) {
    var kieuTim = document.getElementsByName('kieuTimLSP')[0].value;
    var text = inp.value;

    // Lọc
    var vitriKieuTim = {
        'malsp': 1,
        'tenlsp': 2
    }; // mảng lưu vị trí cột
    var listTr_table = document.getElementsByClassName('loaisanpham')[0].getElementsByClassName('table-content')[0].getElementsByTagName('tr');

    for (var tr of listTr_table) {
        var td = tr.getElementsByTagName('td')[vitriKieuTim[kieuTim]].innerHTML.toLowerCase();

        if (td.indexOf(text.toLowerCase()) < 0) {
            tr.style.display = 'none';
        } else {
            tr.style.display = '';
        }

    }
}

function sortLSPTable(loai) {
    var list = document.getElementsByClassName('loaisanpham')[0].getElementsByClassName("table-content")[0];
    var tr = list.getElementsByTagName('tr');

    quickSort(tr, 0, tr.length - 1, loai, getValueOfTypeInTable_LSP);
    decrease = !decrease;
}

// Lấy giá trị của loại(cột) dữ liệu nào đó trong bảng
function getValueOfTypeInTable_LSP(tr, loai) {
    var td = tr.getElementsByTagName('td');
    switch (loai) {
        case 'stt':
            return Number(td[0].innerHTML);
        case 'malsp':
            return Number(td[1].innerHTML);
        case 'tenlsp':
            return td[2].innerHTML.toLowerCase();

        case 'mota':
            return td[4].innerHTML.toLowerCase();
    }
    return false;
}
//==========================Khuyến mãi===========================

//sửa
function addKhungKM(csrf, makm) {
    $.ajax({
        type: "GET",
        url: "khungSuaKM",
        dataType: "json",
        // timeout: 1500, // sau 1.5 giây mà không phản hồi thì dừng => hiện lỗi
        data: {
            makm: makm
        },
        success: function(data, status, xhr) {
            //console.log(data);
            addKhungSuaKM(csrf, data);
        },
        error: function() {
            Swal.fire({
                type: "error",
                title: "Lỗi addKhungKM < admin.js"
            });
        }
    });
}

function testdate(id_ngaybd, id_ngaykt) {
    today = (new Date()).getDate();
    ngaybd = new Date(document.getElementById(id_ngaybd).value).getDate();
    ngaykt = new Date(document.getElementById(id_ngaykt).value).getDate();
    if (ngaybd < today) {
        alert("Thời gian bắt đầu không được trước hiện tại");
        return false;
    } else if (ngaybd == "") {
        alert("Vui lòng nhập thời gian bắt đầu");
        return false;
    } else if (ngaykt == "") {
        alert("Vui lòng nhập thời gian kết thúc");
        return false;
    } else if (ngaybd > ngaykt) {
        alert("Thời gian bắt đầu phải trước thời gian kết thúc")
        return false;
    } else {
        return true;
    }
}

function addKhungSuaKM(csrf, data) {
    km = data[0];
    var s = `<span class="close" onclick="this.parentElement.style.transform = 'scale(0)';">&times;</span>
    <form method="post" action="update_KM" enctype="multipart/form-data" onsubmit="return testdate('ngaybd_s','ngaykt_s');">
    <input type="hidden" name="_token" value="` + csrf + `"/>
        <table class="overlayTable table-outline table-content table-header">
            <tr>
                <th colspan="2">` + km.TenKM + `</th>
            </tr>
            <tr style = "display:none">
                <td><input type="text" id="makm" name="makm" value="` + km.MaKM + `" required></td>
            </tr>
            <tr>
                <td>Tên khuyến mãi:</td>
                <td><input type="text" name="tenkm" value="` + km.TenKM + `" required></td>
            </tr>
            <tr>
                <td>Giá trị khuyến mãi:</td>
                <td><input type="number" min="0" name="gtkhuyenmai" value="` + km.GiaTriKM + `" required></td>
            </tr>
            <tr>
                <td>Ngày bắt đầu:</td>
                <td><input type="datetime-local" name="ngaybd" id="ngaybd_s" value="` + km.NgayBD + `"></td>
            </tr>
            <tr>
                <td>Ngày kết thúc:</td>
                <td><input type="datetime-local" name="ngaykt" id="ngaykt_s" value="` + km.NgayKT + `"></td>
            </tr>
            <tr>
                <td colspan="2"  class="table-footer"> <button name="submit">SỬA</button> </td>
            </tr>
        </table>`

    var khung = document.getElementById('khungSuaKM');
    khung.innerHTML = s;
    khung.style.transform = 'scale(1)';
}
//xóa
function xoaKM(makm) {

    if (window.confirm('Bạn có chắc muốn xóa ! Sau khi xóa không thể khôi phục')) {
        // Xóa
        $.ajax({
            type: "get",
            url: "delete_km",
            dataType: "json",
            timeout: 1500, // sau 1.5 giây mà không phản hồi thì dừng => hiện lỗi
            data: {

                makm: makm
            },
            success: function(data, status, xhr) {
                Swal.fire({
                    type: 'success',
                    title: 'Xóa thành công'
                }).then(($result) => {
                    location.href = 'show_khuyenmai';
                });

            },
            error: function() {
                Swal.fire({
                    type: "error",
                    title: "Lỗi xóa xoaKM < admin.js"
                });
            }
        });
    }

}

//tìm kiếm   
function timKiemKM(inp) {
    var kieuTim = document.getElementsByName('kieuTimKM')[0].value;
    var text = inp.value;

    // Lọc
    var vitriKieuTim = {
        'makm': 1,
        'tenkm': 2
    }; // mảng lưu vị trí cột
    var listTr_table = document.getElementsByClassName('khuyenmai')[0].getElementsByClassName('table-content')[0].getElementsByTagName('tr');

    for (var tr of listTr_table) {
        var td = tr.getElementsByTagName('td')[vitriKieuTim[kieuTim]].innerHTML.toLowerCase();

        if (td.indexOf(text.toLowerCase()) < 0) {
            tr.style.display = 'none';
        } else {
            tr.style.display = '';
        }

    }
}

function sortKMTable(loai) {
    var list = document.getElementsByClassName('khuyenmai')[0].getElementsByClassName("table-content")[0];
    var tr = list.getElementsByTagName('tr');

    quickSort(tr, 0, tr.length - 1, loai, getValueOfTypeInTable_KM);
    decrease = !decrease;
}

// Lấy giá trị của loại(cột) dữ liệu nào đó trong bảng
function getValueOfTypeInTable_KM(tr, loai) {
    var td = tr.getElementsByTagName('td');
    switch (loai) {
        case 'stt':
            return Number(td[0].innerHTML);
        case 'makm':
            return Number(td[1].innerHTML);
        case 'tenkm':
            return td[2].innerHTML.toLowerCase();
        case 'gtkhuyenmai':
            return Number(td[3].innerHTML);
        case 'ngaybd':
            return new Date(td[4].innerHTML);
        case 'ngaykt':
            return new Date(td[5].innerHTML);
    }
    return false;
}
//sắp xếp theo cột loại sản phẩm

// ========================= Đơn Hàng ===========================
// Vẽ bảng


function update_TT(maDonHang, trangthai) {
    $.ajax({
        type: "get",
        url: "update_TT",
        dataType: "json",
        timeout: 1500, // sau 1.5 giây mà không phản hồi thì dừng => hiện lỗi
        data: {

            mahd: maDonHang,
            trangthai: trangthai
        },
        success: function(data, status, xhr) {
            Swal.fire({
                type: 'success',
                title: "Cập nhật thành công"
            }).then((result) => {
                location.href = 'show_donhang';
            });

        },
        error: function(e) {
            Swal.fire({
                type: "error",
                title: "Cập nhật thất bại",
                html: e.responseText
            });
        }
    });
}


// Duyệt
function duyet(select, madh) {
    // var status = document.getElementById('status_dh').name; 
    var selectedOption = select.options[select.selectedIndex];
    var name = selectedOption.getAttribute('name');
    var trangthai = selectedOption.getAttribute('value');
    Swal.fire({
        type: 'question',
        title: 'Bạn có chắc chắn muốn chuyển sang trạng thái ' + name + " !",
        showCancelButton: true
    }).then((result) => {
        if (result.value) {
            update_TT(madh, trangthai);
        }
    })
}

function xoaDonHang(maDonHang, trangThai) {
    if (trangThai == 0 || trangThai == -1) {
        Swal.fire({
            type: 'warning',
            title: 'Bạn có chắc chắn muốn xóa đơn hàng !',
            showCancelButton: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "GET",
                    url: "delete_dh",
                    dataType: "json",
                    timeout: 1500, // sau 1.5 giây mà không phản hồi thì dừng => hiện lỗi
                    data: {

                        madh: maDonHang
                    },
                    success: function(data, status, xhr) {
                        Swal.fire({
                            type: 'success',
                            title: 'Xóa thành công đơn hàng'
                        }).then((result) => {
                            location.href = 'show_donhang';
                        });

                    },
                    error: function(e) {
                        Swal.fire({
                            type: "error",
                            title: "Xóa thất bại",
                            html: e.responseText
                        });
                    }
                });
            }

        })
    } else {
        Swal.fire({
            type: "error",
            title: "Chỉ được xóa đơn hàng đã giao hoặc đã hủy đơn !"
        });
    }

}

function locDonHangTheoKhoangNgay() {
    var from = document.getElementById('fromDate').valueAsDate;
    var to = document.getElementById('toDate').valueAsDate;

    var listTr_table = document.getElementsByClassName('donhang')[0].getElementsByClassName('table-content')[0].getElementsByTagName('tr');
    for (var tr of listTr_table) {
        var td = tr.getElementsByTagName('td')[5].innerHTML;
        var d = new Date(td);

        if (d >= from && d <= to) {
            tr.style.display = '';
        } else {
            tr.style.display = 'none';
        }
    }
}

function timKiemDonHang(inp) {
    var kieuTim = document.getElementsByName('kieuTimDonHang')[0].value;
    var text = inp.value;

    // Lọc
    var vitriKieuTim = {
        'ma': 1,
        'khachhang': 2,
        'trangThai': 6
    };

    var listTr_table = document.getElementsByClassName('donhang')[0].getElementsByClassName('table-content')[0].getElementsByTagName('tr');
    for (var tr of listTr_table) {
        var td = tr.getElementsByTagName('td')[vitriKieuTim[kieuTim]].innerHTML.toLowerCase();

        if (td.indexOf(text.toLowerCase()) < 0) {
            tr.style.display = 'none';
        } else {
            tr.style.display = '';
        }
    }
}

// Sắp xếp
function sortDonHangTable(loai) {
    var list = document.getElementsByClassName('donhang')[0].getElementsByClassName("table-content")[0];
    var tr = list.getElementsByTagName('tr');

    quickSort(tr, 0, tr.length - 1, loai, getValueOfTypeInTable_DonHang);
    decrease = !decrease;
}

// Lấy giá trị của loại(cột) dữ liệu nào đó trong bảng
function getValueOfTypeInTable_DonHang(tr, loai) {
    var td = tr.getElementsByTagName('td');
    switch (loai) {
        case 'stt':
            return Number(td[0].innerHTML);
        case 'ma':
            return new Date(td[1].innerHTML); // chuyển về dạng ngày để so sánh ngày
        case 'khach':
            return td[2].innerHTML.toLowerCase(); // lấy tên khách
        case 'sanpham':
            return td[3].children.length; // lấy số lượng hàng trong đơn này, length ở đây là số lượng <p>
        case 'tongtien':
            return stringToNum(td[4].innerHTML); // trả về dạng giá tiền
        case 'ngaygio':
            return new Date(td[5].innerHTML); // chuyển về ngày
        case 'trangthai':
            return td[6].innerHTML.toLowerCase(); //
    }
    return false;
}

// ====================== Khách Hàng =============================

function thayDoiTrangThaiND(inp, mand) {
    var trangthai = (inp.checked ? 1 : 0);
    $.ajax({
        type: "get",
        url: "update_TT",
        dataType: "json",
        timeout: 1500, // sau 1.5 giây mà không phản hồi thì dừng => hiện lỗi
        data: {
            mand: mand,
            trangThai: trangthai
        },
        success: function(data, status, xhr) {
            Swal.fire({
                title: 'Cập nhật thành công',
                type: 'success'
            }).then((result) => {
                location.href = 'show_khachhang'
            })

        },
        error: function(e) {
            Swal.fire({
                type: "error",
                title: "Lỗi lấy thay đổi trạng thái khách Hàng (admin.js > thayDoiTrangThaiND)",
                html: e.responseText
            });
        }
    });
}


// Tìm kiếm
function timKiemNguoiDung(inp) {
    var kieuTim = document.getElementsByName('kieuTimKhachHang')[0].value;
    var text = inp.value;

    // Lọc
    var vitriKieuTim = {
        'ten': 1,
        'email': 2,
        'taikhoan': 3
    };

    var listTr_table = document.getElementsByClassName('khachhang')[0].getElementsByClassName('table-content')[0].getElementsByTagName('tr');
    for (var tr of listTr_table) {
        var td = tr.getElementsByTagName('td')[vitriKieuTim[kieuTim]].innerHTML.toLowerCase();

        if (td.indexOf(text.toLowerCase()) < 0) {
            tr.style.display = 'none';
        } else {
            tr.style.display = '';
        }
    }
}

// Xóa người dùng
function xoaNguoiDung(mand) {
    Swal.fire({
        title: "Bạn có chắc muốn xóa?",
        type: "question",
        showCancelButton: true,
        cancelButtonText: "Hủy"
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "get",
                url: "delete_kh",
                dataType: "json",
                data: {
                    mand: mand
                },
                success: function(data, status, xhr) {
                    Swal.fire({
                        type: "success",
                        title: "Xóa thành công"
                    }).then((result) => {
                        location.href = 'show_khachhang'
                    });
                },
                error: function(e) {
                    Swal.fire({
                        type: "error",
                        title: "Xóa thất bại admin.js < xoaNguoiDung",
                        html: e.responseText
                    });
                }
            });
        }
    })
}

// Sắp xếp
function sortKhachHangTable(loai) {
    var list = document.getElementsByClassName('khachhang')[0].getElementsByClassName("table-content")[0];
    var tr = list.getElementsByTagName('tr');

    quickSort(tr, 0, tr.length - 1, loai, getValueOfTypeInTable_KhachHang);
    decrease = !decrease;
}

function getValueOfTypeInTable_KhachHang(tr, loai) {
    var td = tr.getElementsByTagName('td');
    switch (loai) {
        case 'stt':
            return Number(td[0].innerHTML);
        case 'hoten':
            return td[1].innerHTML.toLowerCase();
        case 'email':
            return td[2].innerHTML.toLowerCase();
        case 'taikhoan':
            return td[3].innerHTML.toLowerCase();
        case 'matkhau':
            return td[4].innerHTML.toLowerCase();
    }
    return false;
}

// ================== Sort ====================
var decrease = true; // Sắp xếp giảm dần

// loại là tên cột, func là hàm giúp lấy giá trị từ cột loai
function quickSort(arr, left, right, loai, func) {
    var pivot,
        partitionIndex;

    if (left < right) {
        pivot = right;
        partitionIndex = partition(arr, pivot, left, right, loai, func);

        //sort left and right
        quickSort(arr, left, partitionIndex - 1, loai, func);
        quickSort(arr, partitionIndex + 1, right, loai, func);
    }
    return arr;
}

function partition(arr, pivot, left, right, loai, func) {
    var pivotValue = func(arr[pivot], loai),
        partitionIndex = left;

    for (var i = left; i < right; i++) {
        if (decrease && func(arr[i], loai) > pivotValue ||
            !decrease && func(arr[i], loai) < pivotValue) {
            swap(arr, i, partitionIndex);
            partitionIndex++;
        }
    }
    swap(arr, right, partitionIndex);
    return partitionIndex;
}

function swap(arr, i, j) {
    var tempi = arr[i].cloneNode(true);
    var tempj = arr[j].cloneNode(true);
    arr[i].parentNode.replaceChild(tempj, arr[i]);
    arr[j].parentNode.replaceChild(tempi, arr[j]);
}


//////////////////////////////////////////////////////////
function trangthai_sp(masp, trangthai) {
    $.ajax({
        type: 'get',
        url: 'update_TT',
        data: {
            masp: masp,
            trangthai: trangthai
        },
        success: function(data) {
            Swal.fire({
                type: 'success',
                title: "Cập nhật thành công trạng thái !"
            }).then((result) => {
                location.href = 'show_sanpham'
            })
        },
        error: function() {
            Swal.fire({
                type: 'error',
                title: 'Lỗi ẩn sản phẩm'
            });
        }
    })
}

function updatett_sp(masp, trangthai, tensp) {
    if (trangthai == 1) {
        Swal.fire({
            type: 'question',
            title: 'Bạn có muốn ẨN ' + tensp + ' không!',
            showCancelButton: true
        }).then((result) => {
            if (result.value) {
                trangthai_sp(masp, 0);
            }

        })
    } else {
        Swal.fire({
            type: 'question',
            title: 'Bạn có muốn Hiện ' + tensp + ' không!',
            showCancelButton: true
        }).then((result) => {
            if (result.value) {
                trangthai_sp(masp, 1);
            }

        })
    }
}

function xoaSanPham(masp, trangthai, tensp) {

    if (trangthai == 1) {
        Swal.fire({
            type: 'error',
            title: 'Chỉ được xóa sản phẩm đã ở trạng thái ẩn'
        });
    } else {
        Swal.fire({
            type: 'question',
            title: 'Bạn có muốn xóa ' + tensp + ' không!',
            showCancelButton: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'get',
                    url: 'delete_sp',
                    data: {
                        masp: masp
                    },
                    success: function(data) {
                        Swal.fire({
                            type: 'success',
                            title: "Xóa thành công !"
                        }).then((result) => {
                            location.href = 'show_sanpham'
                        })
                    },
                    error: function() {
                        Swal.fire({
                            type: 'error',
                            title: 'Lỗi xóa sản phẩm admin.js < xoaSanPham'
                        });
                    }
                })
            }

        })
    }

}

function addKhungSP(csrf, masp) {
    $.ajax({
        type: "get",
        url: 'show_khungsua',
        dataType: "json",
        // timeout: 1500, // sau 1.5 giây mà không phản hồi thì dừng => hiện lỗi
        data: {
            // _token: '{{ csrf_token() }}',
            masp: masp
        },
        success: function(data, status, xhr) {
            //console.log(data);
            addKhungSuaSanPham(csrf, data);
        },
        error: function() {
            Swal.fire({
                type: "error",
                title: "Lỗi truy xuất khung sửa admin.js < addKhung"
            });
        }
    });
}

function addKhungSuaSanPham(csrf, data) {
    var khuyenmai = data['khuyenmai'];
    var loaisp = data['loaisp'];
    var sanpham = data['sanpham'];
    var s = `<span class="close" onclick="this.parentElement.style.transform = 'scale(0)';">&times;</span>
    <form method="post" action="update_sp" enctype="multipart/form-data" >
        <input type="hidden" name="_token" value="` + csrf + `"/>
        <table class="overlayTable table-outline table-content table-header">
            <tr>
                <th colspan="2">` + sanpham.TenSP + `</th>
            </tr>
            <tr style="display: none;">
                <td>Mã sản phẩm:</td>
                <td><input readonly type="text" id="masp" name="masp" value="` + sanpham.MaSP + `"></td>
            </tr>
            <tr>
                <td>Tên sẩn phẩm:</td>
                <td><input type="text" name="tensp" value="` + sanpham.TenSP + `" required></td>
            </tr>
            <tr>
                <td>Hãng:</td>
                <td>
                    <select name="malsp" onchange="autoMaSanPham(this.value)">`

    for (var c of loaisp) {
        if (sanpham.MaLSP == c.MaLSP)
            s += (`<option value="` + sanpham.MaLSP + `" selected="selected">` + c.TenLSP + `</option>`);
        else
            s += (`<option value="` + c.MaLSP + `" > ` + c.TenLSP + ` < /option>`);
    }
    s += `</select>
                </td>
            </tr>
            <tr>
                <td>Hình:</td>
                <td>
                    <div>
                        <div id="exit" class="pull-right" onclick="resethinh('hinhanh2','exit','hinhanhgoc','anhDaiDienSanPhamThem')">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </div>
                        <img class="hinhDaiDien" id="anhDaiDienSanPhamThem" src="../img/products/` + sanpham.HinhAnh + `">
                    </div>
                    <input type="file" name ="hinhanh" id="hinhanh2" onchange="capNhatAnhSanPham(this.files,'anhDaiDienSanPhamThem','exit')">
                    <input hidden type="text" name="hinhanhgoc" id="hinhanhgoc" value="` + sanpham.HinhAnh + `">
                    
                </td>
            </tr>
            <tr>
                <td>Giá tiền:</td>
                <td><input type="number" min="0" name = "dongia" value="` + sanpham.DonGia + `" required></td>
            </tr>
            <tr>
                <td>Số lượng:</td>
                <td><input type="number" min="0" name = "soluong" value="` + sanpham.SoLuong + `" required></td>
            </tr>
            <tr>
                <td>Số sao:</td>
                <td><input type="text" name="sosao" value="` + sanpham.SoSao + `" required></td>
            </tr>
            <tr>
                <td>Đánh giá:</td>
                <td><input type="text" name="sodanhgia" value="` + sanpham.SoDanhGia + `" required></td>
            </tr>
            <tr>
                <td>Khuyến mãi:</td>
                <td>
                    <select name="khuyenmai" id="khuyenmai_ssp" onchange="showGTKM('khuyenmai_ssp','gtkhuyenmai_ssp')">`;
    for (var km of khuyenmai) {
        if (sanpham.MaKM == km.MaKM)
            s += (` <option value = "` + km.MaKM + `"
                                            selected = "selected" > ` + km.TenKM + ` </option>`);
        else
            s += (`<option value="` + km.MaKM + `" > ` + km.TenKM + ` </option>`);
    }
    s += ` </select>
            </td>
        </tr>
        <tr>
            <td>Giá trị khuyến mãi:</td>
            <td><input id="gtkhuyenmai_ssp" type="number" min="0" value="0" required></td>
        </tr>
        <tr>
            <th colspan="2">Thông số kĩ thuật</th>
        </tr>
        <tr>
            <td>Màn hình:</td>
            <td><input type="text" name = "manhinh" value="` + sanpham.ManHinh + `" required></td>
        </tr>
        <tr>
            <td>Hệ điều hành:</td>
            <td><input type="text" name = "hdh" value="` + sanpham.HDH + `" required></td>
        </tr>
        <tr>
            <td>Camara sau:</td>
            <td><input type="text" name = "camsau" value="` + sanpham.CamSau + `" required></td>
        </tr>
        <tr>
            <td>Camara trước:</td>
            <td><input type="text" name = "camtruoc" value="` + sanpham.CamTruoc + `" required></td>
        </tr>
        <tr>
            <td>CPU:</td>
            <td><input type="text" name = "cpu" value="` + sanpham.CPU + `" required></td>
        </tr>
        <tr>
            <td>RAM:</td>
            <td><input type="text" name = "ram" value="` + sanpham.Ram + `" required></td>
        </tr>
        <tr>
            <td>Bộ nhớ trong:</td>
            <td><input type="text" name = "rom" value="` + sanpham.Rom + `" required></td>
        </tr>
        <tr>
            <td>Thẻ nhớ:</td>
            <td><input type="text" name="sdcard" value="` + sanpham.SDCard + `" required></td>
        </tr>
        <tr>
            <td>Dung lượng Pin:</td>
            <td><input type="text" name="pin" value="` + sanpham.Pin + `" required></td>
        </tr>
        <tr>
            <td>Trạng thái:</td>
            <td><input type="number" min = "0" max="1" name="trangthai" value="` + sanpham.TrangThai + `"></td>
        </tr>
        <tr>
            <td colspan="2"  class="table-footer"> <button name="submit">SỬA</button> </td>
        </tr>
        </table>`

    var khung = document.getElementById('khungSuaSanPham');
    khung.innerHTML = s;
    khung.style.transform = 'scale(1)';
}

function xoaBaoCao(malh) {
    Swal.fire({
        type: 'question',
        title: 'Bạn chắc chắn muốn xóa báo cáo này ?',
        showCancelButton: true
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'get',
                url: 'xoabaocao',
                data: {
                    malh: malh
                },
                success: function() {
                    Swal.fire({
                        type: 'success',
                        title: 'Xóa thành công !'
                    }).then((result) => {
                        location.href = 'show_lienhe';
                    })
                }
            })
        }
    })
}

function sortLienHeTable(loai) {
    var list = document.getElementsByClassName('lienhe')[0].getElementsByClassName("table-content")[0];
    var tr = list.getElementsByTagName('tr');

    quickSort(tr, 0, tr.length - 1, loai, getValueOfTypeInTable_LienHe);
    decrease = !decrease;
}

function getValueOfTypeInTable_LienHe(tr, loai) {
    var td = tr.getElementsByTagName('td');
    switch (loai) {
        case 'stt':
            return Number(td[0].innerHTML);
        case 'hoten':
            return td[1].innerHTML.toLowerCase();
        case 'ngaygui':
            return new Date(td[5].innerHTML);
    }
    return false;
}