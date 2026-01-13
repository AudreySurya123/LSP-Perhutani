<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * Kolom yang boleh diisi mass assignment
     */
    protected $fillable = [

        // UMUM
        'name',
        'email',
        'password',
        'plain_password',
        'no_hp',
        'role',
        'status',

        // ASESI
        'nik',
        'skema_sertifikasi',
        'jenis_kelamin',
        'perusahaan',
        'pilihan_pembayaran',
        'tuk',

        // ASESOR
        'no_reg_asesor',
        'alamat',
        'pendidikan',
        'lisensi_berlaku_sampai',
        'cv',
        'bidang_kompetensi',

        // ADMIN
        'admin_level',
        'kode_admin',
    ];

    /**
     * Kolom yang disembunyikan
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting tipe data
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'bidang_kompetensi' => 'array',
        'lisensi_berlaku_sampai' => 'date',
    ];

    /* ======================
     |  HELPER ROLE
     |======================*/
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isAsesor()
    {
        return $this->role === 'asesor';
    }

    public function isAsesi()
    {
        return $this->role === 'asesi';
    }
}
