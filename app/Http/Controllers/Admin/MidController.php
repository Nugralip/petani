<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\mid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MidController extends Controller
{
    public function index(){
        if(Session()->get('username')=="") {
            return redirect('/login')->with(['pesan'=>'belum_login']);
        }
        $mid = new mid();
        $tabel = $mid->index();
        $data = array(  'title'     => 'Dashboard Admin',
                        'marge'     => 'admin/mid',
                        'mid'       => $tabel,
                        'nomor'     => 1,
                        'username'  => Session()->get('username'));

        return view('admin/layout/wrapper',$data); 
    }
    public function tambah(){
        $data = array(  'title'     => 'Dashboard Admin',
                        'marge'     => 'admin/tambah',
                        'username'  => Session()->get('username'));

        return view('admin/layout/wrapper',$data);
    }
    public function prosest(Request $request){
        DB::table('mid')->insert([
            'username'  => $request->username,
            'nama'      =>$request->nama,
            'level'      =>$request->level,
            'alamat'    =>$request->alamat
            ]);
        
        return redirect('/mid');
    }
    public function edited($id){
        $tabel = DB::table('mid')->where('id', $id)->get();
        $data = array(  'title'     => 'Dashboard Admin',
                        'marge'     => 'admin/edit',
                        'mid'       => $tabel,
                        'username'  => Session()->get('username'));

        return view('admin/layout/wrapper',$data);
    }

    public function update(Request $request)
    {
        DB::table('mid')->where('id',$request->id)->update([
            'username'  => $request->username,
            'nama'      =>$request->nama,
            'level'      =>$request->level,
            'alamat'    =>$request->alamat  
        ]);
        
        return redirect('/mid');
    }

    public function dalete($id)
    {
        DB::table('mid')->where('id',$id)->delete();
        
        return redirect('/mid');
    }

}
