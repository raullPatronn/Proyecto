<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatTable extends Migration
{
    public function up()
    {
        Schema::create('chat', function (Blueprint $table) {
            $table->id();
            $table->string('usuario');
            $table->string('mensaje');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chat');
    }
};
