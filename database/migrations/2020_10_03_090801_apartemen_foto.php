<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApartemenFoto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

         Schema::create('apartemen_foto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('side')->nullable();
            $table->string('path')->nullable();
            $table->integer('type')->nullable();
            $table->bigInteger('id_apartemen')->unsigned();
            $table->timestamps();
            $table->foreign('id_apartemen')
              ->references('id')->on('apartemen')
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
        Schema::dropIfExists('apartemen_foto');

    }
}
