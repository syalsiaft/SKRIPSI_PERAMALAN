<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPenjualanTable extends Migration
{
    public function up()
    {
        Schema::create('data_penjualan', function (Blueprint $table) {
            $table->id('id_penjualan');//(primary key)
            $table->integer('tahun');
            $table->integer('musim');
            $table->integer('bulan');
            $table->unsignedBigInteger('jenis_obat');
            $table->integer('total_terjual');
            $table->timestamps();

            $table->foreign('jenis_obat')->references('id_obat')->on('data_obat')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_penjualan');
    }
}
