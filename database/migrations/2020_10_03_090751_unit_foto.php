<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UnitFoto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //
         Schema::create('unit_media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('side')->nullable();
            $table->string('path')->nullable();
            $table->integer('type')->nullable();
            $table->bigInteger('id_unit')->unsigned();
            $table->timestamps();
            $table->foreign('id_unit')
              ->references('id')->on('unit')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('unit_media');

    }
}
