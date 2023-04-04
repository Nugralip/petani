<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Katagori;
use App\Models\Produk;
use App\Models\Tanah;
use App\Models\user_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        if(Session()->get('username')=="") {
                $berita = Berita::orderBy("created_at", "asc")->limit(3)->get();
                $produk = Produk::orderBy("created_at", "asc")->limit(6)->get();
                $tanah = Tanah::orderBy("created_at", "asc")->get();
                $katagori = Katagori::all();

            $data = array(
                'content' => 'home',
                'beritas' => $berita,
                'produks' => $produk,
                'tanahs'   => $tanah,
                'katagoris' =>$katagori,
                's_id' => "",
                's_user' => "",
            );
        }else{
                $berita = Berita::orderBy("created_at", "asc")->limit(3)->get();
                $produk = Produk::orderBy("created_at", "asc")->limit(6)->get();
                $tanah = Tanah::orderBy("created_at", "asc")->get();
                $katagori = Katagori::all();

            $data = array(
                'content' => 'home',
                'beritas' => $berita,
                'produks' => $produk,
                'tanahs'   => $tanah,
                'katagoris' =>$katagori,
                's_id' => Session()->get('id_user'),
                's_user' => Session()->get('username'),
            );
        }
        
        return view('layout/wrap',$data);
    }

    public function berita(){
        if(Session()->get('username')==""){
            $berita = Berita::join('users', 'users.id_user','=', 'beritas.id_user')->get(['beritas.*','users.name']);
            $katagori = Katagori::all();

        $data = array(
            'content'   => 'berita',
            'beritas'   => $berita,
            'katagoris' =>$katagori,
            's_id' => "",
            's_user' => "",
        );
        }else{
            $berita = Berita::join('users', 'users.id_user','=', 'beritas.id_user')->get(['beritas.*','users.name']);
            $katagori = Katagori::all();

        $data = array(
            'content'   => 'berita',
            'beritas'   => $berita,
            'katagoris' =>$katagori,
            's_id' => Session()->get('id_user'),
            's_user' => Session()->get('username'),
        );
        }
        
        return view('layout/wrap',$data);
    }

    public function produk($id){
        if(Session()->get('username')==""){
            $produks = Produk::join('katagoris', 'katagoris.id_kata','=', 'produks.id_kata')->where('produks.id_kata',$id)->get(['produks.*','katagoris.katagori']);
            $katagori = Katagori::all();

        $data = array(
            'content'   => 'produk',
            'produks'   => $produks,
            'katagoris' =>$katagori,
            's_id' => "",
            's_user' => "",
        );
        }else{
            $produks = Produk::join('katagoris', 'katagoris.id_kata','=', 'produks.id_kata')->where('produks.id_kata',$id)->get(['produks.*','katagoris.katagori']);
            $katagori = Katagori::all();
    
        $data = array(
            'content'   => 'produk',
            'produks'   => $produks,
            'katagoris' =>$katagori,
            's_id' => Session()->get('id_user'),
            's_user' => Session()->get('username'),
        );
        }
        
        return view('layout/wrap',$data);
    }

    public function detail($id){
        if(Session()->get('username')==""){
            $beritas = Berita::join('users', 'users.id_user','=', 'beritas.id_user')->get(['beritas.*','users.name']);
            $berita = Berita::join('users', 'users.id_user','=', 'beritas.id_user')->where('id_berita',$id)->get(['beritas.*','users.name']);
            $katagori = Katagori::all();

        $data = array(
            'content'   => 'detail',
            'berita'   => $berita,
            'beritas'   => $beritas,
            'katagoris' =>$katagori,
            's_id' => "",
            's_user' => "",
        );
        }else{
            $beritas = Berita::join('users', 'users.id_user','=', 'beritas.id_user')->get(['beritas.*','users.name']);
            $berita = Berita::join('users', 'users.id_user','=', 'beritas.id_user')->where('id_berita',$id)->get(['beritas.*','users.name']);
            $katagori = Katagori::all();

        $data = array(
            'content'   => 'detail',
            'berita'   => $berita,
            'beritas'   => $beritas,
            'katagoris' =>$katagori,
            's_id' => Session()->get('id_user'),
            's_user' => Session()->get('username'),
        );
        }
        return view('layout/wrap',$data);  
    }

    public function pdetail($id){
        if(Session()->get('username')==""){
            $produks = Produk::join('katagoris', 'katagoris.id_kata','=', 'produks.id_produk')->where('katagoris.id_kata',$id)->get(['produks.*','katagoris.katagori']);
            $produk = Produk::join('katagoris', 'katagoris.id_kata','=', 'produks.id_produk')->where('id_produk',$id)->get(['produks.*','katagoris.katagori']);
            $katagori = Katagori::all();

        $data = array(
            'content'   => 'detailproduk',
            'produk'   => $produk,
            'produks'   => $produks,
            'katagoris' =>$katagori,
            's_id' => "",
            's_user' => "",
        );
        }else{
            $produks = Produk::join('katagoris', 'katagoris.id_kata','=', 'produks.id_produk')->where('katagoris.id_kata',$id)->get(['produks.*','katagoris.katagori']);
            $produk = Produk::join('katagoris', 'katagoris.id_kata','=', 'produks.id_produk')->where('id_produk',$id)->get(['produks.*','katagoris.katagori']);
            $katagori = Katagori::all();

        $data = array(
            'content'   => 'detailproduk',
            'produk'   => $produk,
            'produks'   => $produks,
            'katagoris' =>$katagori,
            's_id' => Session()->get('id_user'),
            's_user' => Session()->get('username'),
        );
        }
        return view('layout/wrap',$data);  
    }

    public function login(){
        return view('login');
    }
    public function regis(){
        return view('register');
    }
    public function out()
    {
        Session()->forget('id_user');
        Session()->forget('nama');
        Session()->forget('username');
        return redirect('/');
    }

    public function proreg(Request $request){

        $pro = DB::table('users')->insert([
            'username'  => $request->username,
            'name'      =>$request->fname." ".$request->lname,
            'password' => md5($request->pass),
            'address'    =>$request->alamat,
            'level' => 'user'
            ]);
        
        if($pro != NULL ){
            return redirect('/log');
        }else{
            return redirect('/req');
        }
        
    }
    public function prolog(Request $request){

        $username   = $request->username;
        $password   = md5($request->password);
        $model      = new user_model();
        $user       = $model->login($username,$password);

        if($user) {
            $request->session()->put('id_user', $user->id_user);
            $request->session()->put('nama', $user->name);
            $request->session()->put('username', $user->username);
            // $request->session()->put('akses_level', $user->level);
            return redirect('/');
        }else{
            return redirect('/log')->with(['warning' => 'Mohon maaf, Username atau password salah']);
        }
        
    }
}
