<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Katagori;
use Illuminate\Http\Request;

class KatagoriController extends Controller
{
    public function index(){
        if(Session()->get('username')=="") {
            return redirect('/login')->with(['pesan'=>'belum_login']);
        }
        // $katagori = Katagori::get();
        $katagori = Katagori::get();
        $data = array(
            'title'     => 'Dashboard Admin',
            'marge'     => 'admin/katagori/index',
            'katagori'    => $katagori,
            'tabel' => 'Katagori',
            // 'katagori'  => $katagori,
            'username'  => Session()->get('username'));

        return view('admin/layout/wrapper',$data);
    }

    public function data(Request $request){
        $cari = $request->cari;
        $filter = $request->filter;
        $katagori = Katagori::where('katagori','like',"%".$cari."%")->paginate();
        $data = array(
            'katagori' => $katagori
        );
        return view('admin/katagori/data', $data);
    }

    public function store(Request $request){
        $this->validate($request,[
                'katagori' => 'required',
                'description' => 'required',
        ]);

        $katagori = Katagori::create([
                'katagori' => $request->katagori,
                'description' => $request->description
        ]);
        if ($katagori) {
            echo json_encode(['status' => 'Success', 'data' => $katagori]);
            return;
        }else{
            echo json_encode(['status' => 'Error', 'data' => $katagori]);
            return;
        }
    }

    public function edit($id){

        $data = Katagori::where('id_kata',$id)->first();
        if ($data) {
            return response()->json($data);
        }else{
            return response()->json('error');
        }
    }

    public function update(Request $request){
        $katagori = Katagori::where('id_kata',$request->id)->update([
                'katagori' => $request->katagori,
                'description' => $request->description
        ]);

        if ($katagori) {
            echo json_encode(['status' => 'Success']);
            return;
        }else{
            echo json_encode(['status' => 'Error']);
            return;
        }
    }

    public function destroy($id){
        $data = Katagori::where('id_kata',$id)->delete();
        if ($data) {
            echo json_encode(['status' => 'Success', 'data' => $data]);
            return;
        }else{
            echo json_encode(['status' => 'Error', 'data' => $data]);
            return;
        }
    }
}
