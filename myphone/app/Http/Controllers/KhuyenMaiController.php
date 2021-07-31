<?php

namespace App\Http\Controllers;

use App\khuyenmai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class KhuyenMaiController extends Controller
{
    public function find($makm){
        $result = khuyenmai::where('MaKM',$makm);
        return $result;
    }
    public function show_khuyenmai(){
        $list_km = khuyenmai::get();
        foreach($list_km as $km){
            if(!empty($km->NgayBD) && !empty($km->NgayKT)){
                $km->NgayBD = date("d/m/Y - H:i:s",strtotime($km->NgayBD));
                $km->NgayKT = date("d/m/Y - H:i:s",strtotime($km->NgayKT));
            }
        }
        return view('admin.khuyenmai',['khuyenmai'=>$list_km]);
    }
    public function add_khuyenmai(Request $request){
        $new_km = new khuyenmai();

        $new_km->TenKM = $request->tenkm;
        $new_km->GiaTriKM = $request->gtkhuyenmai;
        $new_km->NgayBD = $request->ngaybd;
        $new_km->NgayKT = $request->ngaykt;

        $new_km->save();
        return Redirect::back();
    }
    public function khungSuaKM(Request $request){
        $km = khuyenmai::find($request->makm);
        return json_encode(array($km));
    }
    public function update_KM(Request $request){
        $km = $this->find($request->makm);
        $update = $km->update([
            'TenKM' => $request->tenkm,
            'GiaTriKM' => $request->gtkhuyenmai,
            'NgayBD' => $request->ngaybd,
            'NgayKT' => $request->ngaykt
        ]);
        return Redirect::back();
    }
    public function delete_km(Request $request){
        $km = $this->find($request->makm);
        $delete = $km->delete();
        return $delete;
    }
}
