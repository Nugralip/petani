<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katagori extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kata',
        'katagori',
        'description',
        'updated_by',
    ];

    public function updatedBy()
    {
        return $this->hasOne('App\Models\User', 'id_produk', 'updated_by');
    }
}
