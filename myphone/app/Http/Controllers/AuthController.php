<?php

namespace App\Http\Controllers;

use App\lienhe;
use Illuminate\Http\Request;
use App\nguoidung;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function user($table,$request)
    {
        $table->Ho = $request->Firstname;
        $table->Ten = $request->Lastname;
        $table->GioiTinh = $request->Gender;
        $table->SDT = $request->Phone;
        $table->Email = $request->Email;
        $table->DiaChi = $request->Address;
    }
    
    public function register(Request $request)
    {
        $user = new nguoidung();
        $this->user($user,$request);
        $user->TaiKhoan = $request->Username;
        $user->MatKhau = bcrypt($request->Password);
        $user->save();

        return redirect()->route('login')->with('success', 'Đăng ký thành công');
    }
    public function edit_user(Request $request){
        //dump($request->all());
        $tk = Session::get('user');
        $user = nguoidung::find($tk->MaND);
        $this->user($user,$request);
        $user->TaiKhoan = $tk->TaiKhoan;
        $user->MatKhau = $tk->MatKhau;
        $user->save();
        $user_new = nguoidung::find($tk->MaND);
        Session::put('user',$user_new);
        return Redirect::back();
    }

    public function login_nd(Request $request)
    {
        $result = nguoidung::where('TaiKhoan', $request->username)->get();
       
        if (!empty($result[0])) {
            
            if($result[0]->MaQuyen != -1){
                if (password_verify($request->password,$result[0]->MatKhau)) {
                    Session::put('user', $result[0]);
                    return redirect()->route('home');
                }
                return redirect()->route('login_nd')->with('errors', 'Tài khoản, mật khẩu không đúng');
            }
            return redirect()->route('login_nd')->with('errors', 'Tài khoản, mật khẩu không đúng');
            
                
        }else{
            return redirect()->route('login_nd')->with('errors', 'Tài khoản, mật khẩu không đúng');
        }
    }
    public function login_ad(Request $request)
    {
        $result = nguoidung::where('TaiKhoan', $request->username)->get();
        if (!empty($result[0])) {
            if ($result[0]->MaQuyen === -1) {
                if (password_verify($request->password,$result[0]->MatKhau)) {
                    Session::put('user_admin', $result[0]);
                    return redirect()->route('show_sanpham');
                }
                return redirect()->route('login_admin')->with('errors', 'Tài khoản, mật khẩu không đúng');
            }
                return redirect()->route('login_admin')->with('errors', 'Tài khoản, mật khẩu không đúng');
        }else{
            return redirect()->route('login_admin')->with('errors', 'Tài khoản, mật khẩu không đúng');
        }
    }
    public function logout_nd()
    {
        if (Session::has('user')) {
            Session::forget('user');
            return redirect()->route('login_nd');
        }
    }

    public function logout_ad()
    {
        if (Session::has('user_admin')) {
            Session::forget('user_admin');
            return redirect()->route('login_admin');
        }
    }
    public function lienhe(Request $request){
        $baocao = new lienhe();

        $baocao->NguoiGui = $request->Fullname;
        $baocao->SDT = $request->Phone;
        $baocao->Email = $request->Email;
        $baocao->NoiDung = $request->noidung;
        $baocao->save();

        return redirect()->route('lienhe_view')->with('success','Gửi thành công');
    }
    public function show_lienhe(){
        $lienhe = lienhe::get();
        return view('admin.lienhe',['lienhe'=>$lienhe]);
    }
    public function xoabaocao(Request $request){
        $lienhe = lienhe::find($request->malh);
        return $lienhe->delete();
    }
}
