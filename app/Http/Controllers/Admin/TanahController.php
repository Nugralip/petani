<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Katagori;
use App\Models\Tanah;
use Illuminate\Http\Request;
use Svg\Tag\Rect;

class TanahController extends Controller
{
    public function index(){
        $tanah = Tanah::get();
        $katagori = Katagori::get();
        $data = array(
            'title'     => 'Dashboard Admin',
            'marge'     => 'admin/tanah/index',
            'tanah'    => $tanah,
            'katagori'  => $katagori,
            'tabel' => 'Tanah',
            'username'  => Session()->get('username'));

        return view('admin/layout/wrapper',$data);
    }

    public function data(Request $request){
        $cari = $request->cari;
        $filter = $request->filter;
        $tanah = Tanah::where('tanah','like',"%".$cari."%")->paginate();
        $data = array(
            'tabel' => 'tanah',
            'tanah' => $tanah
        );
        return view('admin/tanah/data', $data);
    }


    public function store(Request $request){
        $this->validate($request,[
                'tanah' => 'required',
                'texture' => 'required',
                'description' => 'required',
                'procedur' => 'required',
                'superiority' => 'required',
                'recomendation' => 'required',
        ]);

        $tanah = Tanah::create([
                'tanah' => $request->tanah,
                'texture' => $request->texture,
                'description' => $request->description,
                'procedur' => $request->procedur,
                'superiority' => $request->superiority,
                'recomendation' => $request->recomendation,
        ]);
        if ($tanah) {
            echo json_encode(['status' => 'Success', 'data' => $tanah]);
            return;
        }else{
            echo json_encode(['status' => 'Error', 'data' => $tanah]);
            return;
        }
    }

    public function edit($id){

        $data = Tanah::where('id_tanah',$id)->first();

        if ($data) {
            return response()->json($data);
        }else{
            return response()->json('error');
        }
    }

    public function update(Request $request){
        if(Session()->get('username')=="") {
            return redirect('/login')->with(['pesan'=>'belum_login']);
        }
        $tanah = Tanah::where('id_tanah', $request->id)->update([
            'tanah' => $request->tanah,
            'texture' => $request->texture,
            'description' => $request->description,
            'procedur' => $request->procedur,
            'superiority' => $request->superiority,
            'recomendation' => $request->recomendation,
        ]);

        if ($tanah) {
            echo json_encode(['status' => 'Success']);
            return;
        }else{
            echo json_encode(['status' => 'Error']);
            return;
        }
    }

    public function destroy($id){
        $data = Tanah::where('id_tanah',$id)->delete();
        if ($data) {
            echo json_encode(['status' => 'Success', 'data' => $data]);
            return;
        }else{
            echo json_encode(['status' => 'Error', 'data' => $data]);
            return;
        }
    }
}
