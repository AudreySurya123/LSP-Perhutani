<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('plain_password')->nullable();

            // ROLE & STATUS
            $table->enum('role', ['admin', 'asesor', 'asesi'])->default('asesi');
            $table->enum('status', ['pending', 'verified', 'rejected', 'aktif'])->default('pending');

            /*
            |------------------------------------------------------------------
            | ADMIN
            |------------------------------------------------------------------
            */
            $table->string('admin_level')->nullable();
            $table->string('kode_admin')->nullable()->unique();
            $table->string('tuk')->nullable();

            /*
            |------------------------------------------------------------------
            | ASESOR
            |------------------------------------------------------------------
            */
            $table->string('no_reg_asesor')->nullable()->unique();
            $table->string('nik')->nullable()->unique();
            $table->text('alamat')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('no_hp')->nullable();
            $table->date('lisensi_berlaku_sampai')->nullable();
            $table->string('cv')->nullable();
            $table->json('bidang_kompetensi')->nullable();

            /*
            |------------------------------------------------------------------
            | ASESI
            |------------------------------------------------------------------
            */
            $table->string('skema_sertifikasi')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('perusahaan')->nullable();
            $table->string('pilihan_pembayaran')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
