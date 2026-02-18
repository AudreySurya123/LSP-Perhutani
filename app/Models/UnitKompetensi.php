<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKompetensi extends Model
{
    use HasFactory;

    protected $table = 'unit_kompetensis';

    protected $fillable = [
        'skema_id',
        'kode_unit',
        'judul_unit',
        'standar',
    ];

    // Relasi ke Skema
    public function skema()
    {
        return $this->belongsTo(Skema::class);
    }

    public function elemen()
    {
        return $this->hasMany(Elemen::class, 'unit_id');
    }
}
