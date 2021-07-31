<?php

namespace App\Http\Controllers;

use App\sanpham;
use App\khuyenmai;
use App\loaisanpham;
use App\nguoidung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SanPhamController extends Controller
{

    public function sanpham_all(){
        $product['noibatnhat'] = sanpham::get();
        $product['sanphammoi'] = sanpham::where('MaKM',5)->get();
        $product['tragop'] = sanpham::where('MaKM',4)->get();
        $product['giasoc'] = sanpham::where('MaKM',3)->get();
        $product['giamgia'] = sanpham::where('MaKM',2)->get();
        foreach($product as $rs){
            foreach($rs as $result){
                $km = khuyenmai::where('MaKM',$result->MaKM)->get();
                $result['khuyenmai'] = $km[0];
            }
        }
        $loaisp = loaisanpham::get();
        $khuyenmai = khuyenmai::get();
        Session::forget('hangsx');
        Session::forget('giatien');
        Session::forget('khuyenmai');
        Session::forget('sosao');
        Session::forget('sapxep');
        Session::forget('keyword');
        //dump($product['tragop'][0]->khuyenmai);
        return view('home.show_products',['list_product'=>$product,'loaisp'=>$loaisp,'khuyenmai'=>$khuyenmai]);
    }
    public function detail_product(Request $request){
        // $result = sanpham::where('MaSP',$request->masp)->get();
        $result = sanpham::find($request->masp);

        $result['binhluan'] = sanpham::join('danhgia','danhgia.MaSP','sanpham.MaSP')
                        ->join('nguoidung','danhgia.MaND','nguoidung.MaND')
                        ->select('danhgia.*',nguoidung::raw('concat(nguoidung.Ho," ",nguoidung.Ten) AS hoten'))
                        ->where('sanpham.MaSP',$request->masp)
                        ->get();
        //dd($result['binhluan'][0]->hoten);
        $result['khuyenmai'] = khuyenmai::find($result->MaKM);

        return view('chitietsanpham',['product'=>$result]);
    }
    public function list_sp(){
        $result = sanpham::get();
        
        foreach($result as $rs){
            $rs['khuyenmai'] = khuyenmai::find($rs->MaKM);
        }
        
        $hangsx = loaisanpham::get(['MaLSP','TenLSP']);
        $storage['hangsx'] = $hangsx; 
        $storage['khuyenmai'] = khuyenmai::get();
        $storage['sanpham'] = $result;
        return $storage;
    }
    public function show_sanpham(){
        $result = $this->list_sp();
        //dd($result);
        return view('admin.sanpham',["product"=>$result]);
        // dump($result[0]->khuyenmai->TenKM);
    }
    public function image($request){
        if($request->hasFile('hinhanh')){
            if($request->file('hinhanh')->isValid()){
                $img = $request->file('hinhanh');
                $img_name = $img->getClientOriginalName();
                $path = 'img/products';
                $img = $img->move($path,$img_name);
                $img_data = $img_name; 
            }else{
                $img_data = $request->hinhanhgoc;
            }
        }else{
            if($request->hinhanhgoc){
                $img_data = $request->hinhanhgoc;
            }else{
                $img_data = "";
            };
        }
        return $img_data;
    }
    public function product($table,$request){
        $img = $this->image($request);
        $table->MaLSP = $request->malsp;
        $table->TenSP = $request->tensp;
        $table->DonGia = $request->dongia;
        $table->SoLuong = $request->soluong;
        $table->HinhAnh = $img;
        $table->MaKM = $request->khuyenmai;
        $table->ManHinh = $request->manhinh;
        $table->HDH = $request->hdh;
        $table->CamSau = $request->camsau;
        $table->CamTruoc = $request->camtruoc;
        $table->CPU = $request->cpu;
        $table->Ram = $request->ram;
        $table->Rom = $request->rom;
        $table->SDCard = $request->sdcard;
        $table->Pin = $request->pin;
        $table->save();
    }
    public function add_sanpham(Request $request){
        
        $sanpham = new sanpham();
        $request->validate(
            ['hinhanh' => 'required|max:1014|mimes:png,jpg']
        );
        $this->product($sanpham,$request);
        return Redirect::back();

    }
    public function update_TT(Request $request){
        $masp = $request->masp;
        $result = sanpham::find($masp);
        $result->TrangThai = $request->trangthai;
        $result->save();
        return $result;
    }
    public function delete_sp(Request $request){
        $masp = $request->masp;
        $result = sanpham::find($masp);
        $delete = $result->delete();
        return $delete;
    }
    public function show_khungsua(Request $request){
        $masp = $request->masp;
        $result = sanpham::find($masp);
        $khuyenmai = khuyenmai::get();
        $loaisp = loaisanpham::get();
        return json_encode(['sanpham'=>$result,'khuyenmai'=>$khuyenmai,'loaisp'=>$loaisp]);
    }
    public function update_sp(Request $request){
        $sanpham = sanpham::find($request->masp);
        //dump($request->all());
        $this->product($sanpham,$request);
        return Redirect::back();
    }

}
