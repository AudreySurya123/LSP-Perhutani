<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kuks', function (Blueprint $table) {
            $table->id(); // id PK
            $table->unsignedBigInteger('elemen_id'); // FK ke elemen_kompetensis
            $table->text('kriteria_unjuk_kerja');
            $table->text('bukti_bukti')->nullable();
            $table->timestamps();

            // Foreign key
            $table->foreign('elemen_id')
                  ->references('id')
                  ->on('elemen_kompetensis')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kuks');
    }
};
