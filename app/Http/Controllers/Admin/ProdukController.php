<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Katagori;
use App\Models\Produk;
// use App\Models\Tanah;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(){
        if(Session()->get('username')=="") {
            return redirect('/login')->with(['pesan'=>'belum_login']);
        }
        $produk = Produk::get();
        $katagori = Katagori::get();
        $data = array(
            'title'     => 'Dashboard Admin',
            'marge'     => 'admin/produk/index',
            'produk'    => $produk,
            'katagori'  => $katagori,
            'tabel' => 'Produk',
            'username'  => Session()->get('username'));

        return view('admin/layout/wrapper',$data);
    }

    public function data(Request $request){
        $tgl = $request->tgl;
        $bulan = $request->bulan;
        $thn = $request->thn;
        if($tgl == ''){
            $produk = Produk::where('created_at','like',"%".$thn."-".$bulan."%")->paginate()->all();
        }else{ 
            $produk = Produk::where('created_at','like',"%".$thn."-".$bulan."-".$tgl."%")->paginate()->all();
        }

        $data = array(
            'tabel' => 'Produk',
            'produk' => $produk
        );
        return view('admin/produk/data', $data);
    }

    public function store(Request $request){
        $this->validate($request,[
                'kata' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'produk' => 'required',
                'price' => 'required',
                'description' => 'required',
                'procedur' => 'required',
                'superiority' => 'required',
                'deficiency' => 'required',
        ]);
        
        $file = $request->file('image');
        $nmfile = date('dmY')."_".$file->getClientOriginalName();
	    $tujuan_upload = 'image/produk';
        $file->move($tujuan_upload,$nmfile);

        $produk = Produk::create([
                'id_kata' => $request->kata,
                'produk' => $request->produk,
                'picture' => $nmfile,
                'price' => $request->price,
                'description' => $request->description,
                'procedur' => $request->procedur,
                'superiority' => $request->superiority,
                'deficiency' => $request->deficiency,
        ]);
        if ($produk) {
            echo json_encode(['status' => 'Success', 'data' => $produk]);
            return;
        }else{
            echo json_encode(['status' => 'Error', 'data' => $produk]);
            return;
        }
    }

    public function edit($id){

        $data = Produk::where('id_produk',$id)->first();

        if ($data) {
            return response()->json($data);
        }else{
            return response()->json('error');
        }
    }

    public function update(Request $request){
    
        if($request->file('image') == NULL){
            $produk = Produk::where('id_produk',$request->id)->update([
                'id_kata' => $request->kata,
                'produk' => $request->produk,
                'price' => $request->price,
                'description' => $request->description,
                'procedur' => $request->procedur,
                'superiority' => $request->superiority,
                'deficiency' => $request->deficiency
            ]);
        }else{
            $file = $request->file('image');
            $nmfile = date('dmY')."_".$file->getClientOriginalName();
            $tujuan_upload = 'image/produk';
            $file->move($tujuan_upload,$nmfile);
            $produk = Produk::where('id_produk',$request->id)->update([
                'id_kata' => $request->kata,
                'produk' => $request->produk,
                'picture' => $nmfile,
                'price' => $request->price,
                'description' => $request->description,
                'procedur' => $request->procedur,
                'superiority' => $request->superiority,
                'deficiency' => $request->deficiency
            ]);
        }

        

        if ($produk) {
            echo json_encode(['status' => 'Success']);
            return;
        }else{
            echo json_encode(['status' => 'Error']);
            return;
        }
    }

    public function destroy($id){
        $data = Produk::where('id_produk',$id)->delete();
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
            $produk = Produk::where('created_at','like',"%".$thn."-".$bulan."-".$tgl."%")->paginate();
        }else{
            $produk = Produk::where('created_at','like',"%".$thn."-".$bulan."%")->paginate();
        }

        $pdf = PDF::loadview('admin.produk.produk_pdf',['produk'=>$produk]);
        return $pdf->stream();
    }
}
