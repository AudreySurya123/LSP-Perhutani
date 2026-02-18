<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elemen extends Model
{
    protected $table = 'elemen_kompetensis';

    protected $fillable = [
        'unit_id',
        'nama_elemen',
    ];

    public function kuks()
    {
        return $this->hasMany(KUK::class, 'elemen_id');
    }
}


