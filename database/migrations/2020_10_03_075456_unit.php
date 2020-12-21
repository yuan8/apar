<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Unit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

         Schema::create('unit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_ads')->nullable()->unique();
            $table->string('nama');
            $table->string('kordinate')->nullable();
            $table->bigInteger('id_apartemen')->unsigned()->nullable();
            $table->text('alamat')->nullable();
            $table->integer('star')->nullable();
            $table->float('range')->nullable();
            $table->string('img_path')->nullable();
            $table->mediumText('deskripsi')->nullable();
            
            $table->boolean('livingroom')->default(0);
            $table->integer('bedroom')->default(0);
            $table->boolean('kitchen')->default(0);
            $table->boolean('balcony')->default(0);
            $table->integer('bathroom')->nullable();
            $table->boolean('familyroom')->nullable();
            $table->integer('electricity')->nullable();
            $table->boolean('full_furnished')->default(1);

            $table->integer('public_swimmingpool')->nullable();
            $table->integer('public_fitnes_center')->nullable();
            $table->integer('public_medical_center')->nullable();
            $table->integer('public_school_center')->nullable();
            $table->integer('public_spa_center')->nullable();
            $table->integer('public_shalon')->nullable();
            $table->integer('public_garden')->nullable();
            $table->integer('public_mall')->nullable();
            $table->integer('public_joging_track')->nullable();
            $table->integer('public_elevator')->nullable();
            $table->boolean('public_24_scurity')->nullable();
            $table->boolean('public_cctv')->nullable();
            $table->boolean('public_access_card')->nullable();


            $table->integer('public_foodcourt')->nullable();
            $table->integer('public_laundry')->nullable();

            

            $table->string('tower')->default('');
            $table->integer('flor')->default(1);

            $table->text('deposite_note')->nullable();
            $table->boolean('deposite_dayly',25,3)->default(0);

            $table->double('price_daily',25,3)->default(0);
            $table->boolean('deposite_monthly',25,3)->default(0);

            $table->double('price_monthly',25,3)->default(0);
            $table->double('price_saving_mothly',25,3)->default(0);

            $table->boolean('deposite_yearly',25,3)->default(0);
            $table->double('price_yearly',25,3)->default(0);
            $table->double('price_saving_yearly',25,3)->default(0);

            $table->bigInteger('id_provinsi')->unsigned();
            $table->bigInteger('id_kota')->unsigned();
            $table->bigInteger('id_kecamatan')->unsigned();
            $table->bigInteger('id_kelurahan')->unsigned();


            // kitchen
            $table->boolean('kitchen_trash_been')->default(false);
            $table->boolean('kitchen_sauce_pan')->default(false);
            $table->boolean('kitchen_plate')->default(false);
            $table->boolean('kitchen_kitchen_set')->default(false);
            $table->boolean('kitchen_gas_stove')->default(false);
            $table->boolean('kitchen_exhaust_fan')->default(false);
            $table->boolean('kitchen_dining_chair')->default(false);
            $table->boolean('kitchen_bowl')->default(false);
            $table->boolean('kitchen_dining_spoon')->default(false);
            $table->boolean('kitchen_rice_cooker')->default(false);
            $table->boolean('kitchen_mops')->default(false);
            $table->boolean('kitchen_kettle')->default(false);
            $table->boolean('kitchen_fraying_pan')->default(false);
            $table->boolean('kitchen_dispenser')->default(false);
            $table->boolean('kitchen_cooking_knife')->default(false);
            $table->boolean('kitchen_spatula')->default(false);
            $table->boolean('kitchen_refrigerator')->default(false);
            $table->boolean('kitchen_microwive')->default(false);
            $table->boolean('kitchen_glass')->default(false);
            $table->boolean('kitchen_fork')->default(false);
            $table->boolean('kitchen_dining_table')->default(false);
            $table->boolean('kitchen_chopping_board')->default(false);
            $table->boolean('kitchen_electric_plugs')->default(false);


            // living room
            $table->boolean('lroom_air_conditioner')->default(false);
            $table->boolean('lroom_sofa_pillow')->default(false);
            $table->boolean('lroom_iron_board')->default(false);
            $table->boolean('lroom_tv')->default(false);
            $table->boolean('lroom_table')->default(false);
            $table->boolean('lroom_sofa_bed')->default(false);
            $table->boolean('lroom_iron')->default(false);
            $table->boolean('lroom_electric_plugs')->default(false);


            // bedroom
            $table->boolean('broom_air_conditioner')->default(false);
            $table->boolean('broom_king_bed')->default(false);
            $table->boolean('broom_queen_bed')->default(false);
            $table->boolean('broom_single_bed')->default(false);
            $table->boolean('broom_hanger')->default(false);
            $table->boolean('broom_sofa')->default(false);
            $table->boolean('broom_tv')->default(false);
            $table->boolean('broom_wardrope')->default(false);
            $table->boolean('broom_mirror')->default(false);
            $table->boolean('broom_chair')->default(false);
            $table->boolean('broom_pillow')->default(false);
            $table->boolean('broom_side_table')->default(false);
            $table->boolean('broom_table')->default(false);
            $table->boolean('broom_electric_plugs')->default(false);


            // bathroom
            $table->boolean('btroom_water_heater')->default(false);
            $table->boolean('btroom_sink')->default(false);
            $table->boolean('btroom_toilet_bowl')->default(false);
            $table->boolean('btroom_bathup')->default(false);
            $table->boolean('btroom_exhaust_fan')->default(false);
            $table->boolean('btroom_electric_plugs')->default(false);
            $table->boolean('btroom_mirror')->default(false);


            // other
            $table->boolean('o_balcony')->default(false);
            $table->boolean('o_cctv')->default(false);
            $table->boolean('o_tv')->default(false);
            $table->boolean('o_laundry')->default(false);
            $table->boolean('o_cleaning_service_request')->default(false);
            $table->boolean('o_internet_access')->default(false);
            $table->boolean('o_access_card')->default(false);
            $table->boolean('o_air_conditioner')->default(false);
            $table->boolean('o_mirror')->default(false);
            $table->boolean('o_window')->default(false);



            $table->integer('request_ads_month')->nullable();
            $table->boolean('approve_content')->nullable();
            $table->boolean('approve_payment')->nullable();
            $table->dateTime('approve_time')->nullable();
            $table->double('price_ads',25,3)->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->integer('priority')->nullable();
            $table->string('phone')->nullable();


            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_user_handle')->nullable()->unsigned();

            $table->timestamps();

            $table->foreign('id_provinsi')
              ->references('id')->on('provinsi')
              ->onDelete('cascade');

            $table->foreign('id_apartemen')
              ->references('id')->on('apartemen')
              ->onDelete('cascade');

            $table->foreign('id_kecamatan')
              ->references('id')->on('kecamatan')
              ->onDelete('cascade');

               $table->foreign('id_kelurahan')
              ->references('id')->on('kelurahan')
              ->onDelete('cascade');
            
            $table->foreign('id_kota')
              ->references('id')->on('kota')
              ->onDelete('cascade');

            $table->foreign('id_user')
              ->references('id')->on('users')
              ->onDelete('cascade');

            $table->foreign('id_user_handle')
              ->references('id')->on('users')
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
        Schema::dropIfExists('unit');

    }
}
