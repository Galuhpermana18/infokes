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
        Schema::create('dataobats', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id');
            $table->string('kode_obat');
            $table->string('keluhan');//kolom ini untuk mengetahui obat ini untuk pasien dengan keluhan tersebut 
            $table->string('nama_obat');
            $table->string('keterangan_obat');
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
        Schema::dropIfExists('dataobats');
    }
};
