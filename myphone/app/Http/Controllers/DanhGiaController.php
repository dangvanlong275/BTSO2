<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\danhgia;
use App\sanpham;
use Illuminate\Support\Facades\Redirect;

class DanhGiaController extends Controller
{
    //
    public function comment($table,$request){
        $table->MaSP = $request->masp;
        $table->MaND = session('user')->MaND;
        $table->SoSao = $request->star;
        $table->BinhLuan = $request->commentcontent;
        $table->save();
    }
    public function avg_star($masp){
        $product = danhgia::where('MaSP',$masp)->get('SoSao');
        foreach($product as $produc){
            $star[] = $produc->SoSao;
        }
        $avg_star = round(collect($star)->avg());
        $sanpham = sanpham::find($masp);
        $sanpham->SoSao = $avg_star; 
        $sanpham->SoDanhGia =  $product->count();
        $sanpham->save();
    }
    public function add_comment(Request $request){
        $comment = new danhgia();
        $this->comment($comment,$request);
        $this-> avg_star($request->masp);
        return Redirect::back();
    }
}
