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
        Schema::create('datapasiens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('namapasien');
            // $table->string('foto')->nullable();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            // $table->string('emailpasien')->unique();
            $table->string('no_telp_pasien')->unique();
            $table->string('alamat');
            // $table->string('keluhan');
            $table->date('tanggal');
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
        Schema::dropIfExists('datapasiens');
    }
};
