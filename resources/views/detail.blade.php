@extends('layouts.front.master')


@section('header-content')
<nav aria-label="breadcrumb " class="full-content p-10" style="background: linear-gradient(163deg, rgba(102,51,153,1) 17%, rgba(156,99,213,1) 52%, rgba(142,26,135,1) 88%)">

  <ol class="breadcrumb text-white">
    <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Library</a></li>
    <li class="breadcrumb-item text-white active" aria-current="page">Data</li>
  </ol>
</nav>


@if(!empty($data_item['_media_360']->toArray()))
	<div class="card-header with-border" style="margin-right: -2rem; margin-left: -2rem;">
		 <div id="gl-c-{{$data_item['id_ads']}}" style="height: 400px; width:100%; overflow: hidden;" class="carousel slide" data-ride="carousel" data-interval="false">

          <div class="carousel-inner">
             @foreach($data_item['_media_360'] as $kimg =>$img)
            
            <div class="carousel-item  {{$kimg==0?'active':''}}">
             <a href="javascript:void(0)" onclick="panoramic_view('{{$img['path']}}');">
             	 <img class="d-block w-panoramic w-auto" src="{{str_replace('.jpg', '-thumb.jpg',$img['path'])}}" alt="First slide">
             </a>

            </div>
           @endforeach
          </div>
           <div style="position: absolute; border-bottom-right-radius:5px; padding: 5px; top:0px; z-index: 5;  height: 50px; background: #ddd; margin:auto;">
           	<h5 style="line-height: 40px;"><b><i class="fa fa-image"></i> 360&deg; Panoramic </b></h5>
           </div>
          <button class="carousel-control-prev " href="#gl-c-{{$data_item['id_ads']}}" style="height: 400px; overflow: hidden;" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon bg-primary " aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </button>
          <button class="carousel-control-next" href="#gl-c-{{$data_item['id_ads']}}" style="height: 400px; overflow: hidden;" role="button" data-slide="next">
            <span class="carousel-control-next-icon bg-primary" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </button>
        </div>
	</div>

@endif


@stop

@section('content')
<div class="container" style="margin-top: 20px;">
	<div class="row">
	<div class="col-md-8">
		
				<h3><b>{{$data_item['nama']}}</b></h3>
				 <p class="mb-2 text-truncate">{{$data_item['_sub_district']['nama']}}, {{$data_item['_district']['nama']}}, {{$data_item['_city']['nama']}}, {{$data_item['_province']['nama']}}</p>
				 <p><i>{{$data_item['alamat']}}</i></p>

				 <div class="btn-group">
				 	<button class="btn btn-primary"><i class="fa fa-heart"></i> Wishlist</button>
				 	<button class="btn btn-success"><i class="fa fa-phone"></i> {{$data_item['']}}</button>
				 </div>
				 <br>
				 <br>
				 <p>{!!nl2br($data_item['deskripsi'])!!}</p>
				
				 <br>
				 <h5><b>GALERY</b></h5>
				 	<div class="row row-eq-height no-gutters" style="border:1px; border-color:#ddd; border-style: solid;">
				 	@foreach($data_item['_media_images'] as $key=> $img)
						 @if($key<=6)
						 	 <a href="javascript:void(0)" class="col-md-3 col-xs-2" onclick="view_images('{{route('view.media.images',['id'=>$data_item['id'],'image'=>$img['path']])}}')" style="padding: 0px;">
						  	<img  src="{{str_replace('.jpg', '-icon.jpg',$img['path'])}}" class="img-fluid min-h-100 w-100" alt="...">
						  </a>
						 @endif
				 	@endforeach		

				 	@php
				 	@endphp

				 	@if(isset($data_item['_media_images']->toArray()[7]))
				 	 <a href="javascript:void(0)" onclick="view_images('{{route('view.media.images',['id'=>$data_item['id']])}}')" class="col-md-3 col-xs-2 background-dark" onclick="view_images('{{route('view.media.images',['id'=>$data_item['id']])}}" style="padding: 0px; height: 100px; ">
						  	<h5 class="text-center text-white" style="line-height: 100px;"><i class="fa fa-image"></i> Lebih Banyak</h5>
						  </a>
				 	@endif


				 </div>
				 <br>

				 <h5><b>PERABOT</b></h5>
				 <br>
				 <h5>Ruang Tamu</h5>
				 <div class="row no-gutter">
				 	@if($data_item['lroom_air_conditioner'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> air conditioner</p> 
						 @endif 

						 @if($data_item['lroom_sofa_pillow'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> sofa pillow</p> 
						 @endif 

						 @if($data_item['lroom_iron_board'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> iron board</p> 
						 @endif 

						 @if($data_item['lroom_tv'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> tv</p> 
						 @endif 

						 @if($data_item['lroom_table'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> table</p> 
						 @endif 

						 @if($data_item['lroom_sofa_bed'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> sofa bed</p> 
						 @endif 

						 @if($data_item['lroom_iron'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> iron</p> 
						 @endif 

						 @if($data_item['lroom_electric_plugs'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> electric plugs</p> 
						 @endif 

				 </div>

				 <br>


				 <h5> Kamar Tidur ({{$data_item['bedroom']?$data_item['bedroom']:0}} Kamar)</h5>

				 <div class="row no-gutter">
				 	 @if($data_item['broom_air_conditioner'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> air conditioner</p> 
					 @endif 

					 @if($data_item['broom_king_bad'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> king bad</p> 
					 @endif 

					 @if($data_item['broom_queen_bad'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> queen bad</p> 
					 @endif 

					 @if($data_item['broom_sigle_bad'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> sigle bad</p> 
					 @endif 

					 @if($data_item['broom_hanger'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> hanger</p> 
					 @endif 

					 @if($data_item['broom_sofa'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> sofa</p> 
					 @endif 

					 @if($data_item['broom_tv'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> tv</p> 
					 @endif 

					 @if($data_item['broom_wardrope'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> wardrope</p> 
					 @endif 

					 @if($data_item['broom_mirror'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> mirror</p> 
					 @endif 

					 @if($data_item['broom_chair'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> chair</p> 
					 @endif 

					 @if($data_item['broom_pillow'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> pillow</p> 
					 @endif 

					 @if($data_item['broom_side_table'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> side table</p> 
					 @endif 

					 @if($data_item['broom_table'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> table</p> 
					 @endif 

					 @if($data_item['broom_electric_plugs'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> electric plugs</p> 
					 @endif 
				 </div>

				 <br>
				 <h5>Kamar Mandi</h5>

				 <div class="row no-gutter">
				 	@if($data_item['btroom_water_heater'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> water heater</p> 
					 @endif 

					 @if($data_item['btroom_sink'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> sink</p> 
					 @endif 

					 @if($data_item['btroom_toilet_bowl'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> toilet bowl</p> 
					 @endif 

					 @if($data_item['btroom_bathup'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> bathup</p> 
					 @endif 

					 @if($data_item['btroom_exhaust_fan'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> exhaust fan</p> 
					 @endif 

					 @if($data_item['btroom_electric_plugs'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> electric plugs</p> 
					 @endif 

					 @if($data_item['btroom_mirror'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> mirror</p> 
					 @endif 
				 </div>
				 <br>
				 <h5>Dapur</h5>
				 <div class="row no-gutter">
				 	@if($data_item['kitchen_trash_been'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> trash been</p> 
					 @endif 

					 @if($data_item['kitchen_sauce_pan'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> sauce pan</p> 
					 @endif 

					 @if($data_item['kitchen_plate'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> plate</p> 
					 @endif 

					 @if($data_item['kitchen_kitchen_set'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> set</p> 
					 @endif 

					 @if($data_item['kitchen_gas_stove'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> gas stove</p> 
					 @endif 

					 @if($data_item['kitchen_exhaust_fan'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> exhaust fan</p> 
					 @endif 

					 @if($data_item['kitchen_dining_chair'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> dining chair</p> 
					 @endif 

					 @if($data_item['kitchen_bowl'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> bowl</p> 
					 @endif 

					 @if($data_item['kitchen_dining_spoon'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> dining spoon</p> 
					 @endif 

					 @if($data_item['kitchen_rice_cooker'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> rice cooker</p> 
					 @endif 

					 @if($data_item['kitchen_mops'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> mops</p> 
					 @endif 

					 @if($data_item['kitchen_kettle'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> kettle</p> 
					 @endif 

					 @if($data_item['kitchen_fraying_pan'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> fraying pan</p> 
					 @endif 

					 @if($data_item['kitchen_dispenser'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> dispenser</p> 
					 @endif 

					 @if($data_item['kitchen_cooking_knife'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> cooking knife</p> 
					 @endif 

					 @if($data_item['kitchen_spatula'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> spatula</p> 
					 @endif 

					 @if($data_item['kitchen_refrigerator'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> refrigerator</p> 
					 @endif 

					 @if($data_item['kitchen_microwive'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> microwive</p> 
					 @endif 

					 @if($data_item['kitchen_glass'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> glass</p> 
					 @endif 

					 @if($data_item['kitchen_fork'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> fork</p> 
					 @endif 

					 @if($data_item['kitchen_dining_table'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> dining table</p> 
					 @endif 

					 @if($data_item['kitchen_chopping_board'])
					 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> chopping board</p> 
					 @endif 

				 </div>
				 <br>
				 <h5><b>FASILITAS PENUNJANG</b></h5>
				 <div class="row no-guuter">
				 	 @if($data_item['o_balcony'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> balcony</p> 
						 @endif 

						 @if($data_item['o_cctv'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> cctv</p> 
						 @endif 

						 @if($data_item['o_tv'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> tv</p> 
						 @endif 

						 @if($data_item['o_laundry'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> laundry</p> 
						 @endif 

						 @if($data_item['o_cleaning_service_request'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> cleaning service request</p> 
						 @endif 

						 @if($data_item['o_internet_access'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> internet access</p> 
						 @endif 

						 @if($data_item['o_access_card'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> access card</p> 
						 @endif 

						 @if($data_item['o_air_conditioner'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> air conditioner</p> 
						 @endif 

						 @if($data_item['o_mirror'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> mirror</p> 
						 @endif 

						 @if($data_item['o_window'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> window</p> 
						 @endif 
				 </div>
				 <br>
				 <h5><b>FASILITAS UMUM</b></h5>
				 <div class="row no-guuter">
				 	@if($data_item['public_swimmingpool'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> swimmingpool</p> 
						 @endif 

						 @if($data_item['public_fitnes_center'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> fitnes center</p> 
						 @endif 

						 @if($data_item['public_medical_center'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> medical center</p> 
						 @endif 

						 @if($data_item['public_school_center'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> school center</p> 
						 @endif 

						 @if($data_item['public_spa_center'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> spa center</p> 
						 @endif 

						 @if($data_item['public_shalon'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> shalon</p> 
						 @endif 

						 @if($data_item['public_garden'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> garden</p> 
						 @endif 

						 @if($data_item['public_mall'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> mall</p> 
						 @endif 

						 @if($data_item['public_joging_track'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> joging track</p> 
						 @endif 

						 @if($data_item['public_elevator'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> elevator</p> 
						 @endif 

						 @if($data_item['public_24_scurity'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> 24 scurity</p> 
						 @endif 

						 @if($data_item['public_cctv'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> cctv</p> 
						 @endif 

						 @if($data_item['public_access_card'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> access card</p> 
						 @endif 

						 @if($data_item['public_foodcourt'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> foodcourt</p> 
						 @endif 

						 @if($data_item['public_laundry'])
						 <p class="col-4 text-capitalize"><i class="fa fa-check text-success"></i> laundry</p> 
						 @endif 
				 </div>

	</div>
	   <div class="col-md-4">
        <div class='card' data-spy="affix" data-offset-top="{{!empty($data_item['_media_360']->toArray())?550:150}}" style="top:65px;"  id="card-order">
            <div class="card-body">
               	<p>{!!nl2br($data_item['deposite_note'])!!}</p>
               <h5><b>Harga Sewa</b></h5>
               	<div class="btn-group-vertical w-100" style="margin-bottom: 10px;">
               		@if($data_item['price_yearly'])
                            <button class="btn btn-sm col-12 bg-info text-white">
                               <b>Rp. {{number_format($data_item['price_yearly'])}} / Yearly</b>
                            </button>
                        @endif
                         @if($data_item['price_monthly'])
                            <button class="btn btn-sm col-12 btn-warning">
                               <b>Rp. {{number_format($data_item['price_monthly'])}} / Mothly</b>
                            </button>
                        @endif
               		 @if($data_item['price_daily'])
                            <button class="btn btn-sm col-12 btn-blue " >
                               <b>Rp. {{number_format($data_item['price_daily'])}} / Day</b>
                            </button>
                        @endif

                       
                         
               	</div>
               	<h5><b>Ajukan Sewa</b></h5>
               	<div class="input-group">
  
				  <input type="number" min="1" max="10"  class="form-control" required="" value="1">
				  <select class="form-control">
				  	 @if($data_item['price_daily'])
                            <option class="Daily">Hari</option>
                        @endif
                         @if($data_item['price_monthly'])
                            <option class="Mothly">Bulan</option>
                        @endif
                         @if($data_item['price_yearly'])
                            <option class="Yearly">Tahun</option>
                        @endif
				  	
				  </select>
				</div>
               	<button class="btn btn-primary col-12" >Kirim Pengajuan</button>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade"  id="modal-view-image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
  	<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
    </button>
    <div class="modal-content" style="height: 70vh;">
    	<iframe src="" style="height: 100%; width: 100%;  z-index: 999; overflow: hidden;" id="iframe-modal-view-image" allowfullscreen></iframe>
    </div>
   
  </div>
</div>
@stop

@section('js')
	<script type="text/javascript">
		function panoramic_view(url_img){
			$('#modal-view-image #iframe-modal-view-image').attr('src','{{route('view.media.360')}}/?image360='+url_img);
			$('#modal-view-image').modal();

		}

		function view_images(url){

			$('#modal-view-image #iframe-modal-view-image').attr('src',url);
			$('#modal-view-image').modal();

		}

		
	</script>

@stop