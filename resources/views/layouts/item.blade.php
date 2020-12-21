<a href="{{route('unit.detail',['id'=>$data_item['id']])}}" class="">
    <div class="card mb-3">
       <div class="card-body">
           <div class="row">
               <div class="col-md-5 gallery-container" >
                <div id="gl-c-{{$data_item['id_ads']}}" style="height: 200px; overflow: hidden;" class="carousel slide" data-ride="carousel" data-interval="false">
                  <div class="carousel-inner">
                     @foreach($data_item['_media_images'] as $kimg =>$img)

                    <div class="carousel-item {{$kimg==0?'active':''}}">
                      <img class="d-block h-100 w-auto" src="{{str_replace('.jpg', '-thumb.jpg',$img['path'])}}" alt="First slide">
                    </div>
                   @endforeach

                  
                  </div>
                  <button class="carousel-control-prev " href="#gl-c-{{$data_item['id_ads']}}" style="height: 200px; overflow: hidden;" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon bg-primary " aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </button>
                  <button class="carousel-control-next" href="#gl-c-{{$data_item['id_ads']}}" style="height: 200px; overflow: hidden;" role="button" data-slide="next">
                    <span class="carousel-control-next-icon bg-primary" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </button>
                </div>
               </div>
               <div class="col-md-7">
                   <h5 class="text-truncate text-capitalize">{{$data_item['nama']}}</h5>
                   <p class="mb-2 text-truncate">{{$data_item['_sub_district']['nama']}}, {{$data_item['_district']['nama']}}, {{$data_item['_city']['nama']}}, {{$data_item['_province']['nama']}}</p>
                   <div class="list-price mb-2">
                       @if($data_item['price_daily'])
                            <button class="btn btn-sm">
                               <b>Rp. {{number_format($data_item['price_daily'])}}/d</b>
                            </button>
                        @endif

                        @if($data_item['price_monthly'])
                            <button class="btn btn-sm">
                               <b>Rp. {{number_format($data_item['price_monthly'])}}/m</b>
                            </button>
                        @endif
                         @if($data_item['price_yearly'])
                            <button class="btn btn-sm">
                               <b>Rp. {{number_format($data_item['price_yearly'])}}/y</b>
                            </button>
                        @endif
                   
                     
                    
                   </div>
                   <div class="list-feature mb-2">
                     <button class="btn btn-sm">
                           <i class="fa fa-bed"></i> {{$data_item['bedroom']}}
                       </button>
                     <button class="btn btn-sm">
                           <i class="fa fa-shower"></i> {{$data_item['bathroom']}}
                       </button>
                         @if($data_item['btroom_bathup'])
                            <button class="btn btn-sm">
                           <i class="fa fa-bath"></i> 
                       </button>
                        @endif
                        
                       @if($data_item['btroom_water_heater'])
                            <button class="btn btn-sm">
                              <i class="fa fa-hot-tub"></i> 
                           </button>
                        @endif
                      
                        @if($data_item['o_internet_access'])
                            <button class="btn btn-sm">
                             <i class="fa fa-wifi"></i> 
                          </button>
                        @endif
                          @if($data_item['full_furnished'])
                             <button class="btn btn-primary btn-sm">
                           Furnished
                       </button>
                        @endif
                     
                   </div>
                   <p class="text-capitalize">
                    @if(strlen($data_item['deskripsi'])>100)

                    @else
                      {{strtolower($data_item['deskripsi'])}}
                    @endif
                   </p>
               </div>
           </div>
       </div>
       <div class="card-footer">
           <div class="row">
               <div class="col-md-6">
                   <div class="d-flex align-items-center"><img class="avatar-sm rounded-circle mr-2 img-outline-dark" src="http://demos.ui-lib.com/gull/dist-assets/images/faces/13.jpg" alt="alt">
                    <p class="m-0 text-title text-16 flex-grow-1">{{$data_item['_user']['username']}}</p>
                    </div>
               </div>
               <div class="col-md-6">
                   <div class="float-right">
                    <button class="btn  btn-sm btn-icon btn-outline-dark bg-white  m-1" type="button"><span class="ul-btn__icon"><i class="fas fa-phone"></i></span> Call</button>
                       <button class="btn btn-sm bg-white btn-outline-dark btn-icon" type="button">
                        <span><i class="fas fa-comment"></i></span>
                       </button>
                       <button class="btn btn-sm bg-white btn-outline-dark btn-icon" type="button">
                        <span><i class="fas fa-share"></i></span>
                       </button>
                       <button class="btn btn-sm bg-white btn-outline-dark btn-icon" type="button">
                        <span><i class="fas fa-heart"></i></span>
                       </button>
                   </div>
               </div>
           </div>
       </div>
    </div>
 </a>