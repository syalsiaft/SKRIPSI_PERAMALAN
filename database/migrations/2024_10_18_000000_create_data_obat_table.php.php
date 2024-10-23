<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataObatTable extends Migration
{
    public function up()
    {
        Schema::create('data_obat', function (Blueprint $table) {
            $table->unsignedInteger('id_obat')->primary();//
            $table->string('jenis_obat')->unique(); // 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_obat');
    }
}
