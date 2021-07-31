<?php

namespace App\Http\Controllers;

use App\chitiethoadon;
use App\DonMua;
use App\hoadon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DonHangController extends Controller
{
    
    public function show_donhang(){
       $donhang = hoadon::with('getDonHang')->get();
       return view('admin.donhang',["donhang"=>$donhang]);
    }
    public function update_TT(Request $request){
        $donhang = hoadon::find($request->mahd);
        $donhang->TrangThai = $request->trangthai;
        $result = $donhang->save();
        return $result;
    }
    public function delete_dh(Request $request){
        $donhang = hoadon::find($request->madh);
        $result = $donhang->delete();
        return $result;
    }
    public function donmua(){
        $mand = Session::get('user')->MaND;
        $donhang = hoadon::where('MaND',$mand)->get();
        foreach($donhang as $dh){
            $ctdhonhang = chitiethoadon::join('sanpham','chitiethoadon.MaSP','sanpham.MaSP')
                                    ->where('MaHD',$dh->MaHD)
                                    ->select('sanpham.MaSP','sanpham.TenSP','sanpham.HinhAnh','chitiethoadon.SoLuong','sanpham.DonGia')
                                    ->get();
            $donmua = new DonMua($ctdhonhang,$dh);
            $detail_dh[] = $donmua;
        }
        
        // foreach($detail_dh as $th){
        //         foreach($th->chitietdon as $ctdhonhang){
        //             dump($ctdhonhang->HinhAnh);
        //         }
                
                   
        // }
        return view('donmua',['donhang'=>$detail_dh]);
    }
}
