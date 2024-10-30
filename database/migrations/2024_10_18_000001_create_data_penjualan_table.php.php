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
            $table->unsignedBigInteger('id_obat'); //foreign key
            $table->integer('tahun');
            $table->integer('musim');
            $table->integer('bulan');
            $table->integer('jenis_obat');
            $table->integer('total_terjual');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_penjualan');
    }
}
