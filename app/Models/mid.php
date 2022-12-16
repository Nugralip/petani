<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class mid extends Model
{
    public function index(){
        $query = DB::table('mids')->get();

        return $query; 
    }
    // public function edit($id){
    //     $query = DB::table('mid')->where('id', $id)->get();

    //     return $query;
    // }
}
