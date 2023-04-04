<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Katagori;
use App\Models\Tanah;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Svg\Tag\Rect;

class TanahController extends Controller
{
    public function index(){
        if(Session()->get('username')=="") {
            return redirect('/login')->with(['pesan'=>'belum_login']);
        }
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
        $tgl = $request->tgl;
        $bulan = $request->bulan;
        $thn = $request->thn;
        if($tgl == ''){
            $tanah = Tanah::where('created_at','like',"%".$thn."-".$bulan."%")->paginate()->all();
        }else{ 
            $tanah = Tanah::where('created_at','like',"%".$thn."-".$bulan."-".$tgl."%")->paginate()->all();
        }
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

        $file = $request->file('image');
        $nmfile = date('dmY')."_".$file->getClientOriginalName();
	    $tujuan_upload = 'image/tanah';
        $file->move($tujuan_upload,$nmfile);

        $tanah = Tanah::create([
                'tanah' => $request->tanah,
                'picture' => $nmfile,
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
        // if(Session()->get('username')=="") {
        //     return redirect('/login')->with(['pesan'=>'belum_login']);
        // }
        if($request->file('image') == NULL){
            $tanah = Tanah::where('id_tanah', $request->id)->update([
                'tanah' => $request->tanah,
                'texture' => $request->texture,
                'description' => $request->description,
                'procedur' => $request->procedur,
                'superiority' => $request->superiority,
                'recomendation' => $request->recomendation,
            ]);
        }else{
            $file = $request->file('image');
            $nmfile = date('dmY')."_".$file->getClientOriginalName();
            $tujuan_upload = 'image/tanah';
            $file->move($tujuan_upload,$nmfile);
            $tanah = Tanah::where('id_tanah', $request->id)->update([
                'tanah' => $request->tanah,
                'picture' => $nmfile,
                'texture' => $request->texture,
                'description' => $request->description,
                'procedur' => $request->procedur,
                'superiority' => $request->superiority,
                'recomendation' => $request->recomendation,
            ]); 
        }
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
    public function cetakpdf(Request $request){
        $tgl = $request->tgl;
        $bulan = $request->bulan;
        $thn = $request->thn;
        if($tgl == ' '){
            $tanah = Tanah::where('created_at','like',"%".$thn."-".$bulan."-".$tgl."%")->paginate();
        }else{
            $tanah = Tanah::where('created_at','like',"%".$thn."-".$bulan."%")->paginate();
        }

        $pdf = PDF::loadview('admin.tanah.print_tanah',['tanah'=>$tanah]);
        return $pdf->stream();
    }
}
