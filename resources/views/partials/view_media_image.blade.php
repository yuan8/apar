<!DOCTYPE html>
<html lang="en" dir="">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
        @yield('title',config('yone.title',''))
    </title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="{{asset('dist/admin/css/admin.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/app.css?v='.date('i'))}}" rel="stylesheet" />

    <link href="http://demos.ui-lib.com/gull/dist-assets/css/plugins/perfect-scrollbar.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/652354d01e.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
    <style type="text/css">
        .text-dark, .text-dark a{
            color:#222!important;
        }
    </style>
</head>

<body>
	<div id="gl-c-{{$data_item['id_ads']}}" style="height: 100vh; width:100%; overflow: hidden;" class="carousel slide" data-ride="carousel" data-interval="false">

          <div class="carousel-inner">
          	@php
          		$image=$image??0;
          	@endphp
             @foreach($data_item['_media_images'] as $kimg =>$img)
            
            <div class="carousel-item  {{( $img['path']==$image)?'active':''}}">
             	 <img class="d-block w-100 h-100" src="{{$img['path']}}" alt="First slide">

            </div>
           @endforeach
          </div>
          
          <button class="carousel-control-prev " href="#gl-c-{{$data_item['id_ads']}}" style="height: 100vh; overflow: hidden;" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon bg-primary " aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </button>
          <button class="carousel-control-next" href="#gl-c-{{$data_item['id_ads']}}" style="height: 100vh; overflow: hidden;" role="button" data-slide="next">
            <span class="carousel-control-next-icon bg-primary" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </button>
        </div>
	</div>

	  <script src="http://demos.ui-lib.com/gull/dist-assets/js/plugins/bootstrap.bundle.min.js"></script>
    <script src="http://demos.ui-lib.com/gull/dist-assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="{{asset('/js/affix.js?v='.date('i'))}}"></script>
    <script src="http://demos.ui-lib.com/gull/dist-assets/js/scripts/script.min.js"></script>
    <script src="http://demos.ui-lib.com/gull/dist-assets/js/scripts/sidebar.large.script.min.js"></script>
    <script type="text/javascript">
    	
    </script>


</body>