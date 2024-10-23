<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataObatTable extends Migration
{
    public function up()
    {
        Schema::create('data_obat', function (Blueprint $table) {
            $table->unsignedInteger('id_obat')->primary();// Ini akan menjadi primary key dan auto-increment
            $table->string('jenis_obat')->unique(); // Menambahkan unique constraint
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_obat');
    }
}
