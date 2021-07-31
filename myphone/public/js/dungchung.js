//////////////////////////////////////
function themVaoGioHang(masp, tensp, trangthai_tk) {
    if (trangthai_tk === 0) {
        Swal.fire({
            title: 'Tài Khoản Bị Khóa ',
            text: 'Tài khoản của bạn hiện đang bị khóa nên không thể thêm hàng!',
            type: 'error',
            confirmButtonText: 'Trở về',
            footer: '<a href>Liên hệ với Admin</a>'
        });
    } else if (trangthai_tk === -1) {
        Swal.fire({
            title: 'Chưa đăng nhập',
            text: 'Bạn cần đăng nhập để thực hiện thêm hàng!',
            type: 'error',
            confirmButtonText: 'Trở về'
        });
    } else {
        $.ajax({
            type: 'get',
            url: 'add_giohang',
            data: {
                masp: masp
            },
            success: function() {
                Swal.fire({
                    toast: true,
                    position: 'bottom-end',
                    type: 'success',
                    html: ' Đã thêm <strong>' + tensp + '</strong> vào giỏ.',
                    showConfirmButton: true,
                    timer: 2000
                }).then((result) => {
                    location.href = 'chitietsanpham?masp=' + masp;
                })
            },
            error: function() {
                Swal.fire({
                    type: 'error',
                    title: 'Lỗi dungchung.js < themVaoGioHang'
                })
            }
        })
    }
}


//  ================================ END WEB 2 =================================


// Di chuyển lên đầu trang
function gotoTop() {
    if (window.jQuery) {
        jQuery('html,body').animate({
            scrollTop: 0
        }, 1000);
    } else {
        document.getElementsByClassName('top-nav')[0].scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
}

function gotoBot() {
    if (window.jQuery) {
        jQuery('html,body').animate({
            scrollTop: $(document).height()
        }, 1000);
    } else {
        document.getElementsByClassName('footer')[0].scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
}

function checkComment(trangthai) {
    if (trangthai === 0) {
        Swal.fire({
            type: 'waring',
            title: 'Bạn cần đăng nhập để bình luận'
        })
        return false;
    } else {
        return true;
    }
}