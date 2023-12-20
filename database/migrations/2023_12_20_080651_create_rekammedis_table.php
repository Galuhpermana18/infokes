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
        Schema::create('rekammedis', function (Blueprint $table) {
            $table->id();
            $table->timestamp('tanggalperiksa');
            $table->string('pasien_id');
            $table->string('keluhan');          
            $table->string('dokter_id')->nullable();          
            $table->string('diagnosa')->nullable();          
            $table->string('obat_id')->nullable();      
            $table->enum('status',['selesai','proses','terkonfirmasi','belum di konfirmasi'])->default('belum di konfirmasi');    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekammedis');
    }
};
