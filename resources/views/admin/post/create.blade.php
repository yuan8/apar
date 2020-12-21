@extends('layouts.admin.master')

@section('header-content')
<link rel="stylesheet" type="text/css" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">
	<script type="text/javascript" src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>

<h5 >NEW UNIT</h5>


@stop

@section('content')
<form action="#" id="form-create">
	<div class="row">

	<div class="col-12 bg-gray mb-3" style="">
	<label>Images</label>
	<div class="input-group mb-3 " >
        <div class="custom-file">
            <input class="custom-file-input " id="file_images" type="file">
            <label class="custom-file-label" for="file_images" aria-describedby="inputGroupFileAddon02">Choose file</label>
    	</div>
        
    </div>
	<div class="progress">
	  	<div class="progress-bar" id="file_images_progres" style="width:0%"></div>
	</div>
	<div class="float-left p-2" id="box-images" style="background: #ddd; min-height: 10px; width: 100%">
	</div>
</div>
	<div class="col-12 mb-3">
		<label>Images 360</label>
	<div class="input-group mb-3">
        <div class="custom-file">
            <input class="custom-file-input" id="file_images-360" type="file">
            <label class="custom-file-label" for="file_images-360" aria-describedby="inputGroupFileAddon02">Choose file</label>
    	</div>
        
    </div>
    <div class="progress">
	  	<div class="progress-bar" id="file_images-360_progres" style="width:0%"></div>
	</div>
		<div class="float-left p-2" id="box-images-360" style="background: #ddd; min-height: 10px; width: 100%"></div>

	</div>
{{-- 	<div class="col-12 mb-3">
			<label>Videos</label>
	<div class="input-group mb-3">
        <div class="custom-file">
            <input class="custom-file-input" id="inputGroupFile02" type="file">
            <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
    	</div>
        
    </div>
    <div class="progress">
	  	<div class="progress-bar" id="progress-bar-video" style="width:0%"></div>
	</div>
		<div class="" id="box-images-video" style="background: #ddd; min-height: 100px; width: 100%"></div>
	</div> --}}

	</div>
<div class="row">
	<div class="col-6">
		<div class="form-group">
			<label>Apartemen</label>
			<select class="form-control" name="apartemen" id="apartemen"></select>
		</div>
		<div class="form-group">
			<label>Title*</label>
			<input type="text" class="form-control" name="title" required="">
		</div>
		
		<div class="form-group">
			<label>Tower</label>
			<input type="text" class="form-control" name="tower" required="">
		</div>
		<div class="form-group">
			<label>Flor</label>
			<input type="number" min="1" class="form-control" name="flor" required="">
		</div>
	</div>
	

	<div class="col-6">
		<div class="form-group">
			<label>Address*</label>
			<textarea class="form-control" name="address" required=""></textarea>
		</div>
		<div class="form-group">
			<label>Province*</label>
			<select class="form-control" name="province" id="province" required=""></select>
		</div>
		<div class="form-group">
			<label>City*</label>
			<select class="form-control" name="city"  id="city" required=""></select>
		</div>
		<div class="form-group">
			<label>District*</label>
			<select class="form-control" name="district" id="district" required=""></select>
		</div>
		<div class="form-group">
			<label>Sub-District*</label>
			<select class="form-control" id="sub_district" name="sub_district"></select>
		</div>
	</div>
	<div class="col-12">
		<h5>DESCRIPTION</h5>
		<hr>
		<div class="form-group mb-3">

		<textarea class="form-control" style="height: 200px;" placeholder="Detail" name="decription"></textarea>
		</div>

	</div>
	<div class="col-12">
		<h5>PRICE</h5>
		<hr>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Daily</label>
					<div class="input-group mb-3">
                        <div class="input-group-prepend">
                        	<span class="input-group-text currency" >Rp.</span>
                        </div>
                       	<input class="form-control" type="number" name="price_daily"  placeholder="Price"  >
                    </div>
				</div>

			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Monthly</label>
					<div class="input-group mb-3">
                        <div class="input-group-prepend">
                        	<span class="input-group-text currency" >Rp.</span>
                        </div>
                       	<input class="form-control" type="number"  name="price_monthly" placeholder="Price"  >
                    </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Yearly</label>
					<div class="input-group mb-3">
                        <div class="input-group-prepend">
                        	<span class="input-group-text currency" >Rp.</span>
                        </div>
                       	<input class="form-control" type="number" name="price_yearly"  placeholder="Price"  >
                    </div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Currency</label>
					<select class="form-control" id="currecy-choose" name="currecy">
						<option value="Rp.">IDR - Rp</option>
						<option value="$">USD - Dollar</option>

					</select>
					
				</div>

			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Deposit Information</label>
					<textarea class="form-control" name="deposite_note"></textarea>
					
				</div>
			</div>
		</div>
	</div>

	<div class="col-12">
		<h5>FASILITY</h5>
		<hr>
		<div class="row">
			<div class="col-md-3">
				<div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1" name="full_furnished" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Full Furnished
		            </label>
		        </div>

				<div class="form-group">
					<label>Electricity</label>
					<div class="input-group mb-3">
                       	<input class="form-control" type="number" name="electricity" placeholder="Count"  >
                       	  <div class="input-group-append">
                        	<span class="input-group-text currecy" >Watt</span>
                        </div>
                    </div>
				</div>
				<p><b>Livingroom</b></p>
				<div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1" name="lroom_air_conditioner" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Air Conditioner
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1" name="lroom_tv" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                TV
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" name="lroom_table" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Table
		            </label>
		        </div>
		       
		        <div class="form-check mb-3">
		            <input class="form-check-input" name="lroom_sofa_bed" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Soffa Bed
		            </label>
		        </div>
		         <div class="form-check mb-3">
		            <input class="form-check-input" name="lroom_sofa_pillow" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Soffa Pillow
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" name="lroom_iron" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Iron
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" name="lroom_iron_board" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Iron Board
		            </label>
		        </div>
		         <div class="form-check mb-3">
		            <input class="form-check-input"  name="lroom_electric_plugs" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Electic Plugs
		            </label>
		        </div>



				
			</div>
			<div class="col-md-3">
				<p><b>Bedroom</b></p>
				<div class="form-group">
					<label>Bedroom</label>
					<div class="input-group mb-3">
                       	<input class="form-control" type="number" name="bedroom" placeholder="Count"  >
                       	  <div class="input-group-append">
                        	<span class="input-group-text currecy" >Bedroom</span>
                        </div>
                    </div>
				</div>
				<div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1" name="broom_air_conditioner" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Air Conditioner
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1" name="broom_king_bed" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                King-bed
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1" name="broom_queen_bed" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Quin-bed
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1" name="broom_single_bed" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Single-bed
		            </label>
		        </div>
		         <div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1" name="broom_hanger" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Hanger
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1" name="broom_tv" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                TV
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1" name="broom_sofa" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Soffa
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1" name="broom_wardrope" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Wardrop
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1" name="broom_mirror" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Mirror
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1" name="broom_chair" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Chair
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1" name="broom_pillow" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Pillow
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1" name="broom_side_table" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Side Table
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1" name="broom_table" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Table
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" name="broom_electric_plugs" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Electic Plugs
		            </label>
		        </div>
			</div>
			<div class="col-md-3">
				<p><b>Kitchen</b></p>
				
				<div class="form-check mb-3">
		            <input class="form-check-input" name="kitchen_trash_been" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Trash Been
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input"  name="kitchen_sauce_pan"  id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Souce Pan
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input"  name="kitchen_plate"  id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Plate
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1"  name="kitchen_kitchen_set"  type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Kitchenset
		            </label>
		        </div>
		         <div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1"  name="kitchen_gas_stove"  type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Gas Stove
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1"  name="kitchen_exhaust_fan"  type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Exhaust Fan
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1"  name="kitchen_glass"  type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Glass
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1"  name="kitchen_fork"  type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Fork
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1"  name="kitchen_dining_table"  type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Dining Table
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1"  name="kitchen_dining_chair"  type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Dining Chair
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input"  name="kitchen_dining_spoon"  id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Dining Spoon
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input"  name="kitchen_rice_cooker"  id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Rice Cooker
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input"  name="kitchen_mops"  id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Mops
		            </label>
		        </div>
		      
		        <div class="form-check mb-3">
		            <input class="form-check-input"  name="kitchen_kettle"  id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Kettle
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input"  name="kitchen_fraying_pan"  id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Fraying Pan
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input"  name="kitchen_dispenser"  id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Dispenser - empty
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input"  name="kitchen_cooking_knife"  id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Cooking Knife
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input"  name="kitchen_spatula"  id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Spatula
		            </label>
		        </div>
		         <div class="form-check mb-3">
		            <input class="form-check-input"  name="kitchen_bowl"  id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Bowl
		            </label>
		        </div>
		         <div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1"   name="kitchen_refigerator" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Refrigerator
		            </label>
		        </div>
		         <div class="form-check mb-3">
		            <input class="form-check-input"  name="kitchen_microwive" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Microwive
		            </label>
		        </div>
		         <div class="form-check mb-3">
		            <input class="form-check-input" name="kitchen_chopping_board" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Chopping Board
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" name="kitchen_electric_plugs" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Electic Plugs
		            </label>
		        </div>
			</div>
			<div class="col-md-3">
				<p><b>Bathroom</b></p>
				<div class="form-group">
					<label>Bathroom</label>
					<div class="input-group mb-3">
                       	<input class="form-control" type="number" name="bathroom" placeholder="Count"  >
                       	  <div class="input-group-append">
                        	<span class="input-group-text currecy" >Bathroom</span>
                        </div>
                    </div>
				</div>
				<div class="form-check mb-3">
		            <input class="form-check-input"  name="btroom_water_heater" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Water Heater
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1"  name="btroom_sink" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Sink
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input"  name="btroom_toilet_bowl"  id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Toilet Bowl
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input"  name="btroom_bathup" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Bathup
		            </label>
		        </div>
		         <div class="form-check mb-3">
		            <input class="form-check-input"  name="btroom_exhaust_fan" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Exhaust Fan
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input"  name="btroom_mirror" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Mirror
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" name="btroom_electric_plugs" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Electic Plugs
		            </label>
		        </div>
		        <p><b>Other</b></p>
		         <div class="form-check mb-3">
		            <input class="form-check-input" name="o_balcony" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Balcony
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" name="o_cctv" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                CCTV
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" name="o_tv" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                TV
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input"  name="o_laundry" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Loundry
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input"  name="o_cleaning_service_request" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Cleaning Service
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" name="o_internet_access" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Internet Access
		            </label>
		        </div>
		         <div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1" name="o_access_card" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Access Card
		            </label>
		        </div>
		         <div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1" name="o_air_conditioner" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Air Conditioner
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" id="ch-1" name="o_mirror" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Mirror
		            </label>
		        </div>
		         <div class="form-check mb-3">
		            <input class="form-check-input" name="o_window"  id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Window
		            </label>
		        </div>
		        <div class="form-check mb-3">
		            <input class="form-check-input" name="o_carport" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Carport
		            </label>
		        </div>
		       
			</div>
			
		</div>
	</div>

	<div class="col-12">
		<h5>PUBLIC FASILITY</h5>
		<hr>
		<div class="row">
			<div class="col-md-3">
				<div class="form-check mb-3">
		            <input class="form-check-input" name="public_swimmingpool" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Swimming Pool
		            </label>
		        </div>
			</div>
			<div class="col-md-3">
				<div class="form-check mb-3">
		            <input class="form-check-input" name="public_fitnes_center" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Fitnes Center
		            </label>
		        </div>
			</div>
			<div class="col-md-3">
				<div class="form-check mb-3">
		            <input class="form-check-input" name="public_medical_center" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Medical Center
		            </label>
		        </div>
			</div>
			<div class="col-md-3">
				<div class="form-check mb-3">
		            <input class="form-check-input" name="public_school_center" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                School Center
		            </label>
		        </div>
			</div>
			<div class="col-md-3">
				<div class="form-check mb-3">
		            <input class="form-check-input" name="public_spa_center" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Spa 
		            </label>
		        </div>
			</div>
			<div class="col-md-3">
				<div class="form-check mb-3">
		            <input class="form-check-input" name="public_shalon" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Shalon 
		            </label>
		        </div>
			</div>
			<div class="col-md-3">
				<div class="form-check mb-3">
		            <input class="form-check-input" name="public_garden" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Garden / Park 
		            </label>
		        </div>
			</div>
			<div class="col-md-3">
				<div class="form-check mb-3">
		            <input class="form-check-input" name="public_joging_track" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Joging Track 
		            </label>
		        </div>
			</div>
			<div class="col-md-3">
				<div class="form-check mb-3">
		            <input class="form-check-input" name="public_elevator" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Elevator 
		            </label>
		        </div>
			</div>
			<div class="col-md-3">
				<div class="form-check mb-3">
		            <input class="form-check-input" name="public_24_scurity" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Scurity 24 Hours 
		            </label>
		        </div>
			</div>

			<div class="col-md-3">
				<div class="form-check mb-3">
		            <input class="form-check-input" name="public_mall" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Mall 
		            </label>
		        </div>
			</div>
			<div class="col-md-3">
				<div class="form-check mb-3">
		            <input class="form-check-input" name="public_foodcourt" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                FOODCOURT 
		            </label>
		        </div>
			</div>
			<div class="col-md-3">
				<div class="form-check mb-3">
		            <input class="form-check-input" name="public_cctv" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                CCTV 
		            </label>
		        </div>
			</div>
			<div class="col-md-3">
				<div class="form-check mb-3">
		            <input class="form-check-input" name="public_laundry" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Laundry 
		            </label>
		        </div>
			</div>
			<div class="col-md-3">
				<div class="form-check mb-3">
		            <input class="form-check-input" name="public_access_card" id="ch-1" type="checkbox">
		            <label class="form-check-label ml-3" for="ch-1">
		                Access Card 
		            </label>
		        </div>
			</div>
		</div>
	</div>
	<div class="col-12 mt-3">
		<h5>CONTACT </h5>
		<hr>
		
		<div class="row">
			<div class="col-md-3">

			<div class="form-group">
					<label>Phone</label>
					<div class="input-group mb-3">
                        <div class="input-group-prepend">
                        	<span class="input-group-text currecy" >+62</span>
                        </div>
                       	<input class="form-control" type="number" name="phone" placeholder="Phone Number"  >
                    </div>
				</div>
			</div>
		</div>
		<div class="row">

			<div class="col-md-3">
			<div class="form-check mb-3">
	            <input class="form-check-input" id="ch-1" name="phone_whatsapp" type="checkbox">
	            <label class="form-check-label ml-3" for="ch-1">
	                Whatsapp
	            </label>
	        </div>
		</div>
		<div class="col-md-3">
			<div class="form-check mb-3">
	            <input class="form-check-input" id="ch-1" name="phone_call" type="checkbox">
	            <label class="form-check-label ml-3" for="ch-1">
	                Phone Call 
	            </label>
	        </div>
		</div>
		<div class="col-md-3">
			<div class="form-check mb-3">
	            <input class="form-check-input" id="ch-1"  name="phone_sms"  type="checkbox">
	            <label class="form-check-label ml-3" for="ch-1">
	                SMS 
	            </label>
	        </div>
		</div>
		</div>
	</div>
</div>
<div class="btn-group">
	<button type="submit" class="btn btn-success">Create Unit</button>
</div>
</form>

@stop

@section('js')
<script type="text/javascript">

$('.def-images').on('change',function(){
	if($(this).prop('checked')){
		$(this).parent().find('input[type="hidden"]').val(1);
	}else{
		$(this).parent().find('input[type="hidden"]').val(1);

	}
});


$('#file_images').on('change',function(){
	if(this.value){
		postFile(this.id,'images');
	}
});
$('#file_images-360').on('change',function(){
	if(this.value){
		postFile(this.id,'images-360');
	}
});

function postFile(id,type) {
    var formdata = new FormData();
    formdata.append('file', $('#'+id)[0].files[0]);
    formdata.append('type', type);
    var request = new XMLHttpRequest();
    
    request.upload.addEventListener('progress', function (e) {
        var file1Size = $('#'+id)[0].files[0].size;
        if (e.loaded <= file1Size) {
            var percent = Math.round(e.loaded / file1Size * 100);
            $('#'+id+'_progres').width(percent + '%').html(percent + '%');
        } 
        if(e.loaded == e.total){
            $('#'+id+'_progres').width(100 + '%').html(100 + '%');
        }
    });  

    request.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
   	      	var data=JSON.parse(request.responseText);
   	      	console.log(data.data);
   	      	$('#'+id+'_progres').width(0 + '%').html('');
   	      	switch(data.data.type){
   	      		case 1:
   	      			build_images(data);
					// $('.def-images').trigger('change');

   	      		break;
   	      		case 2:
   	      			build_images_360(data);

   	      		break;
   	      	}
	    }
	};

    request.open('post', '{{route('api.upload.media')}}');
    request.setRequestHeader('Authorization','Bearer {{Auth::User()->api_token}}');
    request.setRequestHeader('Accept','application/json');
    request.timeout = 45000;
    request.send(formdata);
}

$('#currecy-choose').on('change',function(){
	$('.currency').html(this.value);
});

$('#currecy-choose').trigger('change');

(function ($) {
    $.fn.serializeFormJSON = function () {

        var o = {};
        var a = this.serializeArray();
        $.each(a, function () {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };
})(jQuery);

$("#form-create").on("submit", function(event){
        event.preventDefault();
 
        var formValues= $(this).serialize();
 
        API.post('{{route('api.unit.store')}}',formValues).then(function(res){
        	console.log(res);
        });
    });



function build_images(data){
	def=false;
	if($('#box-images .card').html()==undefined){
		def=true;
	}
	var dom=`<div class="card float-left draggable" style="width:100px; overflow: hidden; margin: 5px;"><div class="card-body p-0 " ><div class="bg-gray" style="width:100px; background: #ddd; height:100px; overflow: hidden;"><img src="`+data.data.thumb+`" style="margin:auto;" class="img-round"><input type="hidden" name="images[i`+data.data.id+`][url]" value="`+data.data.url+`"> 
		<input type="hidden" name="images[i`+data.data.id+`][type]" value="`+data.data.type+`"> </div><div class=""><button style="position: absolute;bottom:5px; right:5px; " class="btn-circle text-danger btn-transparent btn btn-xs" onclick="$(this).parent().parent().parent().remove()">x</button> </div></div></div>`;
	$('#box-images').append(dom);
}


function build_images_360(data){
	def=false;
	if($('#box-images-360 .card').html()==undefined){
		def=true;
	}
	var dom=`<div class="card float-left draggable" style="width:100px; overflow: hidden; margin: 5px;"><div class="card-body p-0 " ><div class="bg-gray" style="width:100px; background: #ddd; height:100px; overflow: hidden;"><img src="`+data.data.thumb+`" style="margin:auto;" class="img-round"><input type="hidden" name="images[i`+data.data.id+`][url]" value="`+data.data.url+`"> 
		<input type="hidden" name="images[i`+data.data.id+`][type]" value="`+data.data.type+`"> </div><div class=""><button style="position: absolute;bottom:5px; right:5px; " class="btn-circle text-danger btn-transparent btn btn-xs" onclick="$(this).parent().parent().parent().remove()">x</button> </div></div></div>`;
		$('#box-images-360').append(dom);
}


$('#province').select2({
  ajax: {
  	headers: {
        "Authorization" : "Bearer {{Auth::User()->api_token}}",
        "Content-Type" : "application/json",
    },
    url: '{{route('api.loc.province')}}',
    dataType: 'json',
    delay: 250,
    data: function (params) {
      var query = {
        q: params.term,
      }

      // Query parameters will be ?search=[term]&type=public
      return query;
    },
     processResults: function (data) {
     	$('#city').val(null).trigger('change');
      	$('#district').val(null).trigger('change');
      	$('#sub_district').val(null).trigger('change');
      // Transforms the top-level key of the response object from 'items' to 'results'
      return {
        results: data.items
      };
     

    }
    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
  }
});

$('#city').select2({
  ajax: {
  	headers: {
        "Authorization" : "Bearer {{Auth::User()->api_token}}",
        "Content-Type" : "application/json",
    },
    url: '{{route('api.loc.city')}}',
    dataType: 'json',
    delay: 250,
    data: function (params) {
      var query = {
        q: params.term,
        id_provinsi:$('#province').val() ,
      }

      // Query parameters will be ?search=[term]&type=public
      return query;
    },
     processResults: function (data) {
     	$('#district').val(null).trigger('change');
      $('#sub_district').val(null).trigger('change');
      // Transforms the top-level key of the response object from 'items' to 'results'
      return {
        results: data.items
      };
     

    }
    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
  }
});


$('#district').select2({
  ajax: {
  	headers: {
        "Authorization" : "Bearer {{Auth::User()->api_token}}",
        "Content-Type" : "application/json",
    },
    url: '{{route('api.loc.district')}}',
    dataType: 'json',
    delay: 250,
    data: function (params) {
      var query = {
        q: params.term,
        id_kota:$('#city').val() ,
      }

      // Query parameters will be ?search=[term]&type=public
      return query;
    },
     processResults: function (data) {
      $('#sub_district').val(null).trigger('change');

      // Transforms the top-level key of the response object from 'items' to 'results'
      return {
        results: data.items
      };

    }
    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
  }
});

$('#sub_district').select2({
  ajax: {
  	headers: {
        "Authorization" : "Bearer {{Auth::User()->api_token}}",
        "Content-Type" : "application/json",
    },
    url: '{{route('api.loc.sub_district')}}',
    dataType: 'json',
    delay: 250,
    data: function (params) {
      var query = {
        q: params.term,
        id_kecamatan:$('#district').val() ,
      }

      // Query parameters will be ?search=[term]&type=public
      return query;
    },
     processResults: function (data) {
      // Transforms the top-level key of the response object from 'items' to 'results'
      return {
        results: data.items
      };

    }
    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
  }
});

$('#apartemen').select2({
  ajax: {
  	headers: {
        "Authorization" : "Bearer {{Auth::User()->api_token}}",
        "Content-Type" : "application/json",
    },
    url: '{{route('api.apartemen.data')}}',
    dataType: 'json',
    delay: 250,
    data: function (params) {
      var query = {
        q: params.term,
      }

      // Query parameters will be ?search=[term]&type=public
      return query;
    },
     processResults: function (data) {
      // Transforms the top-level key of the response object from 'items' to 'results'
      return {
        results: data.items
      };

    }
    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
  }
});




</script>
<style type="text/css">
	.progress{
		border-radius: 0px;
	}
</style>
<script type="text/javascript">
	$( function() {
    $( "#box-images" ).sortable();
    $( "#box-images" ).disableSelection();
     $( "#box-images-360" ).sortable();
    $( "#box-images-360" ).disableSelection();
  } );
</script>
@stop