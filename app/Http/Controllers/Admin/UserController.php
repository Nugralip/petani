<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        if(Session()->get('username')=="") {
            return redirect('/login')->with(['pesan'=>'belum_login']);
        }
        $user = DB::table('users')->get();
        $data = array(  'title'     => 'Dashboard Admin',
                        'marge'     => 'admin/user',
                        'user'      => $user,
                        'nomor'     => 1,
                        'username'  => Session()->get('username'));

        return view('admin/layout/wrapper',$data);
    }
}
