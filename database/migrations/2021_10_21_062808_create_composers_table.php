<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComposersTable extends Migration
{

    public function up()
    {
        Schema::create('composers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nationality');
            $table->string('age');
            $table->string('about');
            $table->string('picture');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('composers');
    }
}
