<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ControllerHome extends Controller
{
    public function index(){
        $data = array(  'content'         => 'home');
        return view('layout/wrapper',$data);
    }
}
