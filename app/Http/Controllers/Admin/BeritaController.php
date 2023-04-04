<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Katagori;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(){
        if(Session()->get('username')=="") {
            return redirect('/login')->with(['pesan'=>'belum_login']);
        }
        $berita = Berita::get();
        $katagori = Katagori::get();
        $data = array(
            'title'     => 'Dashboard Admin',
            'marge'     => 'admin/berita/index',
            'berita'    => $berita,
            'katagori'  => $katagori,
            'tabel' => 'berita',
            'username'  => Session()->get('username'));

        return view('admin/layout/wrapper',$data);
    }

    public function data(Request $request){
        $tgl = $request->tgl;
        $bulan = $request->bulan;
        $thn = $request->thn;
        if($tgl == ' '){
            $berita = Berita::where('created_at','like',"%".$thn."-".$bulan."-".$tgl."%")->paginate();
        }else{
            $berita = Berita::where('created_at','like',"%".$thn."-".$bulan."%")->paginate();
        }
        $data = array(
            'tabel' => 'Berita',
            'berita' => $berita
        );
        return view('admin/berita/data', $data);
    }

    public function store(Request $request){
        $slun = preg_replace("/[^a-zA-Z]/", "", $request->title);

        $file = $request->file('image');
        $nmfile = date('dmY')."_".$file->getClientOriginalName();
	    $tujuan_upload = 'image/berita';
        $file->move($tujuan_upload,$nmfile);

        $berita = Berita::create([
                'id_user' => $request->id_user,
                'picture' => $nmfile,
                'title' => $request->title ,
                'slun' => $slun,
                'isi' => $request ->isi,
                'status' => 'public',
        ]);
        if($berita){
            return redirect('/');
        }else{
            return redirect('/berita');
        }
    }

    public function edit($id){

        $data = Berita::where('id_berita',$id)->first();

        if ($data) {
            return response()->json($data);
        }else{
            return response()->json('error');
        }
    }

    public function update(Request $request){

        $berita = Berita::where('id_berita',$request->id)->update([
            'status' => $request->status,
        ]);

        if ($berita) {
            echo json_encode(['status' => 'Success']);
            return;
        }else{
            echo json_encode(['status' => 'Error']);
            return;
        }
    }

    public function destroy($id){
        $data = Berita::where('id_berita',$id)->delete();
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
            $berita = berita::where('created_at','like',"%".$thn."-".$bulan."-".$tgl."%")->paginate();
        }else{
            $berita = berita::where('created_at','like',"%".$thn."-".$bulan."%")->paginate();
        }

        $pdf = PDF::loadview('admin.berita.print_berita',['berita'=>$berita]);
        return $pdf->stream();
    }
}
