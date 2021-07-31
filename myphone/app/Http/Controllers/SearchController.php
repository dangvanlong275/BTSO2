<?php

namespace App\Http\Controllers;

use App\khuyenmai;
use App\loaisanpham;
use App\sanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function search_loc($limit){
        
        $keyword = Session::get('keyword');
        if(!empty($keyword)){
            $sql = "select sanpham.* from sanpham
                   join loaisanpham on sanpham.MaLSP = loaisanpham.MaLSP
                   where (TenSP like '%".$keyword."%'".
                   " or TenLSP like '%".$keyword."%'".
                   " or ManHinh like '%".$keyword."%'".
                   " or CamSau like '%".$keyword."%'".
                   " or CamTruoc like '%".$keyword."%'".
                   " or CPU like '%".$keyword."%'".
                   " or HDH like '%".$keyword."%'".
                   " or Ram like '%".$keyword."%'".
                   " or Rom like '%".$keyword."%'".
                   " or SDCard like '%".$keyword."%'".
                   " or Pin like '%".$keyword."%')";
        }else{                      
            $sql = "select * from sanpham where 1";
        }
        if(!empty(Session::get('sosao'))){
            $sql .= ' and SoSao >= '.Session::get('sosao');
        }
        if(!empty(Session::get('hangsx'))){
            $sql .= ' and sanpham.MaLSP = '.Session::get('hangsx');
        }
        if(!empty(Session::get('giatien'))){
            $sql .= ' and DonGia between '.Session::get('giatien')[0].' and '.Session::get('giatien')[1];
        }
        if(!empty(Session::get('khuyenmai'))){
            $sql.= ' and MaKM = '.Session::get('khuyenmai');
        }
        if(!empty(Session::get('sapxep'))){
            $sql.= ' ORDER BY '.Session::get('sapxep')[0].' '.Session::get('sapxep')[1];
        }
            $sql.= " LIMIT ".$limit;
        $result = DB::select($sql);
        foreach($result as $key=>$value){
            $result[$key] = (object) $value;
        }
        //dump($result);
        return $result;
    }
    public function result_search(){
        $result = $this->search_loc(Session::get('limit_gt'));
        $limit_sp = sanpham::get()->count();
        $limitmax = count($this->search_loc($limit_sp));
        $sl = $limitmax - count($result);
        $loaisp = loaisanpham::get(); 
        $khuyenmai = khuyenmai::get();

        return view('search',['list_sp'=>$result,'loaisp'=>$loaisp,'sl'=>$sl,'khuyenmai'=> $khuyenmai]);
    }
    public function search_gt(Request $request){
        if(!empty($request->hangsx)){
            Session::put('hangsx',$request->hangsx);  
        }  
        if(!empty($request->giatien)){
            Session::put('giatien',explode(",", $request->giatien));
        }
        if(!empty($request->khuyenmai)){
            Session::put('khuyenmai',$request->khuyenmai);
        }
        if(!empty($request->sosao)){
            Session::put('sosao',$request->sosao);
        }
        if(!empty($request->sapxep_dg)){
            Session::put('sapxep',explode(",", $request->sapxep_dg));
        }
        Session::put('limit_gt',15);
        Session::put('keyword',$request->keyword);

        return $this->result_search();
    }
    public function delete_loc(Request $request){
        $loaixoa = $request->loaixoa;
        if(levenshtein($loaixoa,'xoaboloc') == 0){
            Session::forget('hangsx');
            Session::forget('giatien');
            Session::forget('khuyenmai');
            Session::forget('sosao');
            Session::forget('sapxep');
            Session::forget('keyword');
            return $this->result_search();
        }else{
            Session::forget($loaixoa);
            return $this->result_search();
        }
    }
    public function search_xt_loc(){
        $limit = Session::get('limit_gt');
        $limit +=15;
        Session::put('limit_gt',$limit);

        return $this->result_search();
    }
}
