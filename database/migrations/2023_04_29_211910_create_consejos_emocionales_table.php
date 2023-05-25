<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsejosEmocionalesTable extends Migration
{
    public function up()
    {
        Schema::create('consejos_emocionales', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->integer('utilidad')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('consejos_emocionales');
    }
};
