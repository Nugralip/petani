<?php

namespace App\Http\Controllers;

use App\Models\user_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //index
    public function index(){
    
    	// $site = DB::table('konfigurasi')->first();
        // if($pesan == 'gagal'){
        //     $aller = "Maaf Password Dan Username Anda Salah";
        // }else if($pesan == 'belum_login'){
        //     $aller = "Anda harus login untuk mengakses halaman admin";
        // }else if($pesan == 'logout'){
        //     $aller = "Anda telah berhasil logout";
        // }else{
        //     $aller = NULL;
        // }

        $data = array(  'title'     => 'Login Admin', 'marge' => 'admin/login', 'aller' => NULL);
        return view('admin/layout/marge',$data);
    }

    public function check(Request $request){
        $username   = $request->username;
        $password   = $request->password;
        $model      = new user_model();
        $user       = $model->login($username,$password);

        if($user) {
            $request->session()->put('id_user', $user->id_user);
            $request->session()->put('nama', $user->name);
            $request->session()->put('username', $user->username);
            $request->session()->put('akses_level', $user->level);
            return redirect('admin/')->with(['sukses' => 'Anda berhasil login']);
        }else{
            return redirect('/login')->with(['warning' => 'Mohon maaf, Username atau password salah']);
        }
    }

    public function logout()
    {
        Session()->forget('id_user');
        Session()->forget('nama');
        Session()->forget('username');
        Session()->forget('akses_level');
        return redirect('/login')->with(['sukses' => 'Anda berhasil logout']);
    }
}
