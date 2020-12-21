<!DOCTYPE html>
<html>

<head>
	<title>PAPARTEMEN Q MEDIA RENDER 360&deg; IMAGE</title>
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
	<style type="text/css">
		*{
			margin:0px;
			padding: 0px;

		}
		body{
			max-height: 100vh;
			overflow: hidden;
		}
	</style>
	
	<script type="text/javascript" src="{{asset('dist/three/three.js?v='.date('i'))}}"></script>

<script type="text/javascript" src="{{asset('panolens/build/panolens.js?v='.date('i'))}}"></script>
</head>
<body>

	   
	@if($source)
	<p id="text-load" class="text-center" style="line-height: 100vh;">Loading Apertemnt-Q 360° Media Render...</p>
	<div style="width: 100%; height: 100vh" id="view_render"></div>

<script>


$(function(){
	setTimeout(function(){
		$('#text-load').remove();
		const panorama = new PANOLENS.ImagePanorama( '{{$source}}' );
		
		setTimeout(function(){
		const viewer = new PANOLENS.Viewer({
			container:$('#view_render')[0],
			controlButtons:['fullscreen','video'],
		});
		viewer.add( panorama );
		},500);
	},1000);
});

</script>

@else
<p class="text-center"><b>DATA TIDAK DAPAT DI TAMPILKAN</b></p>
	
@endif

<div class="" style="position: absolute; top:0px; height: 40px; background: #ddddddbd; padding: 5PX; ">
	<h5 style="line-height: 40px;"><b>APARTEMENT-Q 360&deg; MEDIA</b></h5>
</div>



</body>
</html>