<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateolahragaTable extends Migration
{
    public function up()
    {
        Schema::create('olahraga', function (Blueprint $table) {
            $table->id();
            $table->String('Nama');
$table->String('Asal Sekolah');
$table->String('Jenis Kelamin');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('olahraga');
    }
}