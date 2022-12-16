<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        if(Session()->get('username')=="") {
            return redirect('/login')->with(['pesan'=>'belum_login']);
        }
        $data = array(  'title'     => 'Dashboard Admin',
                        'marge'     => 'admin/dash',
                        'username'  => Session()->get('username'));

        return view('admin/layout/wrapper',$data);
    }
}
