<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataHewansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_hewans', function (Blueprint $table) {
            $table->id('id_hewan');
            $table->foreignId('id_pemilik');
            $table->string('nama_hewan');
            $table->string('jenis_hewan');
            $table->string('jenis_kelamin');
            $table->string('nama_pemilik');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_hewans');
    }
}
