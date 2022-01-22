<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{

    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('singer_id');
            $table->unsignedBigInteger('songwriter_id');
            $table->unsignedBigInteger('producer_id');
            $table->unsignedBigInteger('composer_id');
            $table->string('picture');
            $table->string('Link');
            $table->foreign('singer_id')->references('id')->on('singers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('songwriter_id')->references('id')->on('songwriters')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('producer_id')->references('id')->on('producers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('composer_id')->references('id')->on('composers')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('songs');
    }
}
