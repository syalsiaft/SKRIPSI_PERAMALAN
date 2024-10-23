<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPenjualanTable extends Migration
{
    public function up()
    {
        Schema::create('data_penjualan', function (Blueprint $table) {
            $table->id('id_penjualan');// kolom id (primary key)
            $table->unsignedBigInteger('id_obat'); // kolom foreign key
            $table->integer('musim'); // kolom musim
            $table->integer('bulan'); // kolom bulan
            $table->integer('jenis_obat'); // kolom
            $table->year('total_terjual'); // kolom
            $table->timestamps(); // kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_penjualan');
    }
}
