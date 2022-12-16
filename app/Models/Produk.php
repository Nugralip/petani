<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_produk',
        'id_kata',
        'produk',
        'price',
        'description',
        'procedur',
        'superiority',
        'deficiency',
    ];

    public function updatedBy()
    {
        return $this->hasOne('App\Models\User', 'id_produk', 'updated_by');
    }

}
