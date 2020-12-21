<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Kecamatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
          Schema::create('kecamatan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('kordinate')->nullable();
            $table->float('range')->nullable();
            $table->bigInteger('id_provinsi')->unsigned();
            $table->bigInteger('id_kota')->unsigned();
            $table->timestamps();
             $table->foreign('id_provinsi')
              ->references('id')->on('provinsi')
              ->onDelete('cascade');
        
            $table->foreign('id_kota')
              ->references('id')->on('kota')
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
        Schema::dropIfExists('kecamatan');

    }
}
