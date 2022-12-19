<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanah extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_tanah',
        'picture',
        'tanah',
        'texture',
        'description',
        'procedur',
        'superiority',
        'recomendation',
        'updated_by',
    ];

    public function updatedBy()
    {
        return $this->hasOne('App\Models\User', 'id_produk', 'updated_by');
    }
}
