<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Apartemen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('apartemen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('kordinate')->nullable();
            $table->text('alamat')->nullable();
            $table->integer('star')->nullable();
            $table->float('range')->nullable();
            $table->string('img_path')->nullable();
            $table->mediumText('deskripsi')->nullable();
            $table->bigInteger('id_provinsi')->unsigned();
            $table->bigInteger('id_kota')->unsigned();
            $table->bigInteger('id_kecamatan')->unsigned();
            
            $table->integer('public_swimmingpool')->nullable();
            $table->integer('public_gym')->nullable();
            $table->integer('public_garden')->nullable();
            $table->integer('public_mall')->nullable();
            $table->integer('public_foodcourt')->nullable();
            $table->integer('public_laundry')->nullable();

            $table->timestamps();


             $table->foreign('id_provinsi')
              ->references('id')->on('provinsi')
              ->onDelete('cascade');

             $table->foreign('id_kecamatan')
              ->references('id')->on('kecamatan')
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
        Schema::dropIfExists('apartemen');

    }
}
