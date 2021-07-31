<?php

namespace App\Http\Controllers;

use App\Cart;
use App\chitiethoadon;
use App\hoadon;
use App\sanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class GioHangController extends Controller
{
    public function add_giohang(Request $request){
        
        $sanpham = sanpham::find($request->masp);
    
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($sanpham, $sanpham->MaSP);
        Session::put('cart',$cart);
        return true;
    }
    public function giamsl(Request $request){
        $cart = Session::get('cart');
        $masp = $request->masp;
        $cart->items[$masp]['tongsl']--;
        $cart->items[$masp]['tongtien'] = $cart->items[$masp]['tongsl'] * $cart->items[$masp]['sanpham']->DonGia;
        $cart->totalQty--;
        $cart->totalPrice -= $cart->items[$masp]['sanpham']->DonGia;
    }
    public function tangsl(Request $request){
        $cart = Session::get('cart');
        $masp = $request->masp;
        $cart->items[$masp]['tongsl']++;
        $cart->items[$masp]['tongtien'] = $cart->items[$masp]['tongsl'] * $cart->items[$masp]['sanpham']->DonGia;
        $cart->totalQty++;
        $cart->totalPrice += $cart->items[$masp]['sanpham']->DonGia;
    }
    public function delete_gh(Request $request){
        if(levenshtein($request->delete,'xoasp') == 0){
            $cart = Session::get('cart');
            $cart->totalQty--;
            $cart->totalPrice -= $cart->items[$request->masp]['tongtien'];
            unset($cart->items[$request->masp]);
            if($cart->totalQty === 0){
                Session::forget('cart');
            }
        }else{
            Session::forget('cart');
        }
    }
    public function thanhtoan(Request $request){
        $new_dh = new hoadon();
        $donhang = Session::pull('cart');
        $nguoidung = Session::get('user');
        //thêm hóa đơn
        $new_dh->MaND = $nguoidung->MaND;
        $new_dh->NguoiNhan = $request->hoten;
        $new_dh->SDT = $request->sdt;
        $new_dh->DiaChi = $request->diachi;
        $new_dh->PhuongThucTT = $request->hinhthuctt;
        $new_dh->TongTien = $donhang->totalPrice;
        $new_dh->save();
        //thêm chi tiết hóa đơn
        $hoadon = hoadon::orderByDesc('MaHD')->limit(1)->first();
        $mahd = $hoadon->MaHD;
        foreach($donhang->items as $sanpham){
            $ctdh = new chitiethoadon();
            $ctdh->MaHD = $mahd;
            $ctdh->MaSP = $sanpham['sanpham']->MaSP;
            $ctdh->SoLuong = $sanpham['tongsl'];
            $ctdh->DonGia = $sanpham['sanpham']->DonGia;
            $ctdh->save();
        }
        return Redirect::back();

    }
}
