<?php

namespace App\Http\Controllers;

use App\nguoidung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class KhachHangController extends Controller
{
    public function show_khachhang(){
        $khachhang = nguoidung::get();
        return view('admin.khachhang',['khachhang'=>$khachhang]);
    }
    public function update_TT(Request $request){
        $status = nguoidung::find($request->mand);

        $status->TrangThai = $request->trangThai;
        $result = $status->save();

        return $result;
    }
    public function khachhang($table,$request){
        $table->Ho = $request->ho;
        $table->Ten = $request->ten;
        $table->GioiTinh = $request->gender;
        $table->SDT = $request->sdt;
        $table->Email = $request->email;
        $table->DiaChi = $request->diachi;
        $table->TaiKhoan = $request->taikhoan;
        $table->MatKhau = bcrypt($request->matkhau);
        $table->save();
    }
    public function add_khachhang(Request $request){
        $new_nd = new nguoidung();
        $this->khachhang($new_nd,$request);
        
        return Redirect::back();
    }
    public function delete_kh(Request $request){
        $nguoidung = nguoidung::find($request->mand);
        $result = $nguoidung->delete();
        return $result;
    }
}
