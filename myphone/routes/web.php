<?php


use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//Xử lý trang chủ, chi tiết sản phẩm, giỏ hàng,liên hệ

Route::get('home', 'SanPhamController@sanpham_all')->name('home');
Route::get('chitietsanpham','SanPhamController@detail_product')->name('chitietsanpham');
Route::get('giohang', function () {
    return view('giohang');
});
Route::get('lienhe', function () {
    return view('lienhe');
})->name('lienhe_view');

Route::post('lienhe','AuthController@lienhe')->name('lienhe');
/////////////////////////////////////////////////////////////////////////
///Route login
Route::get('login_nd', function(){
    return view('login');
})->name('login_nd');

Route::post('login_nd',[AuthController::class, 'login_nd'])->name('login_nd');
Route::post('login_ad',[AuthController::class, 'login_ad'])->name('login_ad');

Route::get('register',function(){
    return view('register');
})->name('register');
Route::post('register',[AuthController::class, 'register'])->name('register');


/////////////////////////////////////////////////////////////////////////
//Route admin 

Route::get('login_admin', function () {
    return view('admin.login_admin');
})->name("login_admin");

Route::middleware(['checkAdmin'])->group(function () {
    Route::get('admin', function () {
        return view('admin.sanpham');
    })->name('admin');
    
    Route::prefix('sanpham')->group(function () {
        Route::get('show_sanpham',"SanPhamController@show_sanpham")->name('show_sanpham');
        Route::post('add_sanpham',"SanPhamController@add_sanpham")->name('add_sanpham');
        Route::get('update_TT', "SanPhamController@update_TT")->name('update_TT');
        Route::get('delete_sp', "SanPhamController@delete_sp")->name('delete_sp');
        Route::get('show_khungsua', "SanPhamController@show_khungsua")->name('show_khungsua');
        Route::post('update_sp',"SanPhamController@update_sp")->name('update_sp');
    });
    Route::prefix('loaisanpham')->group(function () {
        Route::get('show_loaisanpham',"LSanPhamController@show_loaisanpham")->name('show_loaisanpham');
        Route::post('add_loaisp', 'LSanPhamController@add_loaisp')->name('add_loaisp');
        Route::get('show_khungSua', "LSanPhamController@show_khungsua")->name('show_khungSua');
        Route::post('update_lsp', "LSanPhamController@update_lsp")->name('update_lsp');
        Route::get('delete_lsp', "LSanPhamController@delete_lsp")->name('delete_lsp');
    });
    Route::prefix('khuyenmai')->group(function () {
        Route::get('show_khuyenmai',"KhuyenMaiController@show_khuyenmai")->name('show_khuyenmai');
        Route::get('khungSuaKM',"KhuyenMaiController@khungSuaKM")->name('khungSuaKM');
        Route::post('update_KM',"KhuyenMaiController@update_KM")->name('update_KM');
        Route::post('add_khuyenmai',"KhuyenMaiController@add_khuyenmai")->name('add_khuyenmai');
        Route::get('delete_km',"KhuyenMaiController@delete_km")->name('delete_km');
    });
    Route::prefix('donhang')->group(function () {
        Route::get('show_donhang',"DonHangController@show_donhang")->name('show_donhang');
        Route::get('update_TT',"DonHangController@update_TT")->name('update_TT');
        Route::get('delete_dh',"DonHangController@delete_dh")->name('delete_dh');
    });
    Route::prefix('khachhang')->group(function () {
        Route::get('show_khachhang',"KhachHangController@show_khachhang")->name('show_khachhang');
        Route::get('update_TT',"KhachHangController@update_TT")->name('update_TT');
        Route::post('add_khachhang',"KhachHangController@add_khachhang")->name('add_khachhang');
        Route::get('delete_kh',"KhachHangController@delete_kh")->name('delete_kh');
    });
    Route::prefix('thongke')->group(function () {
        Route::get('sanphambanra',function(){
            return view('admin.thongke');
        })->name('thongke');
        Route::get('load',"LSanPhamController@thongke")->name('load');
    });
    Route::get('logout_ad', [AuthController::class, 'logout_ad'])->name('logout_ad');
    Route::prefix('suco')->group(function () {
        Route::get('show_lienhe', [AuthController::class, 'show_lienhe'])->name('show_lienhe');
        Route::get('xoabaocao', [AuthController::class, 'xoabaocao'])->name('xoabaocao');
    });
});

// Route::get('upfile',function(){
//     return view('admin.testupfile');
// });
// Route::post('upfile','AuthController@upfile')->name('upfile');
// Route::get('test', 'DanhGiaController@test_sl');

//////////////////////////////////////////////////////////////////////
//Route xử lý khi người dùng đã login

Route::middleware(['checkLogin'])->group(function () {
    Route::get('add_giohang','GioHangController@add_giohang')->name('add_giohang');
    Route::post('danhgia','DanhGiaController@add_comment')->name('danhgia');
    Route::get('giamsl','GioHangController@giamsl')->name('giamsl');
    Route::get('tangsl','GioHangController@tangsl')->name('tangsl');
    Route::get('delete_gh','GioHangController@delete_gh')->name('delete_gh');
    Route::post('thanhtoan','GioHangController@thanhtoan')->name('thanhtoan');
    Route::get('donmua','DonHangController@donmua')->name('donmua');
    Route::get('ctdonhang','DonHangController@ctdonhang')->name('ctdonhang');
    Route::get('trangcanhan',function(){
        return view('trangcanhan');
    })->name('trangcanhan');
    Route::post('edit_user','AuthController@edit_user')->name('edit_user');
    Route::get('logout_nd', [AuthController::class, 'logout_nd'])->name('logout_nd');
});
//////////////////////////////////////////////////////////////////////////

//Route search

Route::get('search_tk','SearchController@search_tk')->name('search_tk');
Route::get('search_xt','SearchController@search_xt')->name('search_xt');
Route::get('search_gt','SearchController@search_gt')->name('search_gt');
Route::get('delete_loc','SearchController@delete_loc')->name('delete_loc');
Route::get('search_xt_loc','SearchController@search_xt_loc')->name('search_xt_loc');

////////////////////////////////////////////////////////////////////////


//show session
Route::get('session', function () {
    dump(Session::all());
});
///


