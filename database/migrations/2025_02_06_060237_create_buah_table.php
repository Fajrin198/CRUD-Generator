<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatebuahTable extends Migration
{
    public function up()
    {
        Schema::create('buah', function (Blueprint $table) {
            $table->id();
            $table->String('Nama');
$table->String('Warna');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('buah');
    }
}