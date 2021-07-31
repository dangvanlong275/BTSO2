<?php

namespace App\Http\Controllers;

use App\chitiethoadon;
use App\loaisanpham;
use App\sanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Charts;

class LSanPhamController extends Controller
{
    // public function find($malsp){
    //     $result = loaisanpham::where('MaLSP',$malsp);
    //     return $result;
    // }
    public function image($request){
        if($request->file('hinhanh') != null){
            if($request->file('hinhanh')->isValid()){
                $request->validate(
                    ['hinhanh' => 'required|max:1014|mimes:png,jpg']
                );
                $img = $request->file('hinhanh');
                $img_name = $img->getClientOriginalName();
                $path = 'img/company';
                $img = $img->move($path,$img_name);
                $img_data = $img_name;
            }else{
                $img_data = $request->hinhanhgoc_lsp;
            }
        }else{
            if($request->hinhanhgoc_lsp != ""){
                $img_data = $request->hinhanhgoc_lsp;
            }else{
                $img_data = "";
            }
                
        }
        return $img_data;
    }
    public function product_type($table,$request){
        $table->TenLSP = $request->tenlsp;
        $table->HinhAnh = $this->image($request);
        $table->Mota = $request->mota;

        $table->save();
    }
    public function show_loaisanpham(){
        $l_sanpham = loaisanpham::get();
        return view('admin.loaisanpham',['l_sanpham'=>$l_sanpham]);
    }
    public function add_loaisp(Request $request){
        $new_lsp = new loaisanpham();
        $this->product_type($new_lsp,$request);
        return Redirect::back();
    }
    public function show_khungsua(Request $request){
        $result = loaisanpham::find($request->malsp);
        
        return json_encode(array($result));
    }
    public function update_lsp(Request $request){
        $l_sanpham = loaisanpham::find($request->malsp);
        $this->product_type($l_sanpham,$request);
        return Redirect::back();
    }
    public function delete_lsp(Request $request){
        $lsp = loaisanpham::find($request->malsp);
        $delete = $lsp->delete();
        return $delete;
    }
    static function thongke(){
        $data = [];
        $thongke = chitiethoadon::join('sanpham','chitiethoadon.MaSP','sanpham.MaSP')
                           ->rightjoin('loaisanpham','sanpham.MaLSP','loaisanpham.MaLSP')
                           ->select('loaisanpham.TenLSP',sanpham::raw('IFNULL(SUM(chitiethoadon.SoLuong),0) AS SoLuong'))
                           ->groupBy('loaisanpham.TenLSP')
                           ->get();
        foreach($thongke as $tk){
            $data['TenLSP'][] = $tk->TenLSP;
            $data['SoLuong'][] = $tk->SoLuong;
        }
        return $data;
    }

}
