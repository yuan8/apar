<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="{{asset('dist/three/three.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('dist/panolens/panolens.min.js')}}"></script>
</head>
<body>
<script>

const panorama = new PANOLENS.ImagePanorama( 'http://localhost/apartemen/storage/2020/10/1/images/g5Pgn1aYnALacneLziaZ1_2020-10.jpg' );
const viewer = new PANOLENS.Viewer();
viewer.add( panorama );

</script>
</body>

	

    <script src="http://demos.ui-lib.com/gull/dist-assets/js/plugins/bootstrap.bundle.min.js"></script>
    <script src="http://demos.ui-lib.com/gull/dist-assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="{{asset('/js/affix.js?v='.date('i'))}}"></script>
    <script src="http://demos.ui-lib.com/gull/dist-assets/js/scripts/script.min.js"></script>
    <script src="http://demos.ui-lib.com/gull/dist-assets/js/scripts/sidebar.large.script.min.js"></script>
    <script type="text/javascript">
    	
    </script>
</html>

