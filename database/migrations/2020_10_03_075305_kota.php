<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Kota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('kota', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('kordinate')->nullable();
            $table->float('range')->nullable();
            $table->string('img_path')->nullable();
            $table->bigInteger('id_provinsi')->unsigned();
            $table->timestamps();
            $table->foreign('id_provinsi')
              ->references('id')->on('provinsi')
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
        Schema::dropIfExists('kota');

    }
}
