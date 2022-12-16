<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_berita',
        'id_user',
        'picture',
        'title',
        'slun',
        'isi',
        'status',
    ];

    public function updatedBy()
    {
        return $this->hasOne('App\Models\User', 'id_produk', 'updated_by');
    }
}
