<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KUK extends Model
{
    protected $table = 'kuks';

    protected $fillable = [
        'elemen_id',
        'kriteria_unjuk_kerja',
        'bukti_bukti',
    ];

    public function elemen()
    {
        return $this->belongsTo(Elemen::class, 'elemen_id');
    }
}
