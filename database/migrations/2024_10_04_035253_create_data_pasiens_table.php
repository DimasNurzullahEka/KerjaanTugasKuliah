<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('riwayat_penyakit');
            $table->unsignedBigInteger('dokter_id'); // Foreign Key ke tabel dokter
            $table->date('jadwal_kunjungan');
            $table->timestamps();

             // Relasi dengan tabel dokter
            $table->foreign('dokter_id')->references('id')->on('data_dokters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_pasiens');
    }
};
