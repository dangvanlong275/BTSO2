// Cập nhật số lượng lúc nhập số lượng vào input
function tangSoLuong(masp) {
    $.ajax({
        type: 'get',
        url: 'tangsl',
        data: {
            masp: masp
        },
        success: function() {
            location.href = 'giohang';
        }
    })
}

function giamSoLuong(masp) {
    $.ajax({
        type: 'get',
        url: 'giamsl',
        data: {
            masp: masp
        },
        success: function() {
            location.href = 'giohang';
        }
    })
}

function xoaSanPhamTrongGioHang(masp, tensp) {

    Swal.fire({
        type: "question",
        title: "Xác nhận?",
        html: "Bạn có chắc muốn xóa sản phẩm <b style='color:red'>" + tensp + "</b> ?",
        cancelButtonText: 'Hủy',
        showCancelButton: true

    }).then((result) => {
        if (result.value) {

            $.ajax({
                type: 'get',
                url: 'delete_gh',
                data: {
                    masp: masp,
                    delete: "xoasp"
                },
                success: function() {
                    location.href = 'giohang';
                }
            })
        }
    });
}

function xoaHet() {

    Swal.fire({
        title: 'Xóa Hết?',
        text: 'Bạn có chắc muốn xóa hết sản phẩm trong giỏ! Việc này không thể được hoàn lại.',
        type: 'warning',
        confirmButtonText: 'Tôi đồng ý',
        cancelButtonText: 'Hủy',
        showCancelButton: true

    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'get',
                url: 'delete_gh',
                data: {
                    delete: "deletefull"
                },
                success: function() {
                    location.href = 'giohang';
                }
            })
        }
    })

}