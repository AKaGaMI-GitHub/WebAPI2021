<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPemiliksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pemiliks', function (Blueprint $table) {
            $table->id('id_pemilik');
            $table->string('nama_pemilik');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('no_telp');
            $table->datetime('tgl_daftar');
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
        Schema::dropIfExists('data_pemiliks');
    }
}
