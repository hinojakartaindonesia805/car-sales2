<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('suaras', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_kegiatan');
            $table->integer('id_kandidat');
            $table->dateTime('tanggal_waktu');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suaras');
    }
};
