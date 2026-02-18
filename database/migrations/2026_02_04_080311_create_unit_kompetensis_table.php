<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('unit_kompetensis', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('skema_id'); // HARUS unsignedBigInteger
    $table->string('kode_unit');
    $table->string('judul_unit');
    $table->text('standar')->nullable();
    $table->timestamps();

    $table->foreign('skema_id')->references('id')->on('skemas')->onDelete('cascade');
});

    }

    public function down(): void
    {
        Schema::dropIfExists('unit_kompetensis');
    }
};
