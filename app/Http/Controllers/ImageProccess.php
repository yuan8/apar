<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use Storage;
use Validator;
class ImageProccess extends Controller
{
    //
	public function index(){
		return view('admin.post.test');
	}
    public function store(Request $request){
    	$percent_thumb=0.4;
    	$percent=0.8;
    	$percent_icon=0.08;

    	$valid=Validator::make($request->all(),[
    		'file'=>'file|required|max:3240|mimes:jpg,png,jpeg',

    	]);

    	if($valid->fails()){
    		return array(
    			'code'=>500,
    			'message'=>'',
    			'data'=>[],
    		);
    	}

    	$type=$request->type=='images'?1:2;

    	$filename=Str::random(20).$request->user()->id.'_'.date('Y').'-'.date('m');
    	list($width, $height) = getimagesize($request->file);
    	$image=$request->file('file');
    	$image_dump=Image::make($image->getRealPath());

    	$path='public/'.date('Y').'/'.date('m').'/'.$request->User()->id.'/'.$type;
		$destinationPath=storage_path('app/'.$path);

		Storage::put($path.'/index.txt','');

		$image_dump->resize(($width * $percent), ($height * $percent), function ($constraint) {
            $constraint->aspectRatio();
        });
    	if($type==1){
    		$x = 0;
		 	while ($x < $image_dump->width()) {
		       $y = 0;

		       while($y < $image_dump->height()) {

		         $image_dump->text('ApartementQ.com', $x, $y, function($font){
		                     // $font->file(public_path('fonts/'.$fontn));
		                     $font->size(14);
		                     $font->color([221,221,221,1]);
		                     $font->align('left');
		                     // $font->valign();
		                     $font->angle(20);
		                 });


		             $y += 150;
		       }

		       $x +=150;
		 	}

    	}else{
    		 // $image_dump->text('ApartementQ.com (360)','center',function(){
    		 // 	 $font->size(20);
    		 // });

    		// $watermark = Image::make(storage_path('app/watermark.png'));
	    	// $watermark->resize((100 ), (100 ), function ($constraint) {
	     //        $constraint->aspectRatio();
	     //    });

	    	// $image_dump->insert($watermark, 'center');

			$x = 0;


		 	while ($x < $image_dump->width()) {
		       $y = 0;

		       while($y < $image_dump->height()) {

		         $image_dump->text('ApartementQ.com', $x, $y, function($font){
		                     // $font->file(public_path('fonts/'.$fontn));
		                     $font->size(14);
		                     $font->color([221,221,221,1]);
		                     $font->align('left');
		                     // $font->valign();
		                     $font->angle(20);
		                 });


		             $y += 200;
		       }

		       $x +=200;
		 	}

    	}
    	


    	$img_thumb = $image_dump;
    	$img = $image_dump;
    	$img_icon = Image::make($image->getRealPath());


    	
    	$img->save($destinationPath.'/'.$filename.'.jpg');

		$img_thumb->resize(($width * $percent_thumb), ($height * $percent_thumb), function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$filename.'-thumb.jpg');

	

        $img_icon->resize(($width * $percent_icon), ($height * $percent_icon), function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$filename.'-icon.jpg');

        return array(
        	'code'=>200,
    		'message'=>'',
    		'type'=>$type,
        	'data'=>[
        		'url'=>asset(Storage::url(str_replace('public/', '', explode('public/',$destinationPath)[1]).'/'.$filename.'.jpg')),
	        	'thumb'=>asset(Storage::url(str_replace('public/', '', explode('public/',$destinationPath)[1]).'/'.$filename.'-thumb.jpg')),
	        	'icon'=>asset(Storage::url(str_replace('public/', '', explode('public/',$destinationPath)[1]).'/'.$filename.'-icon.jpg')),
	        	'type'=>$type,
	        	'id'=>"ax".rand(0,20000).'-'.date('ymdhis')
        	]
        );
		
    }


	static function FileSizeConvert($bytes)
	{
	    $bytes = floatval($bytes);
	        $arBytes = array(
	            0 => array(
	                "UNIT" => "TB",
	                "VALUE" => pow(1024, 4)
	            ),
	            1 => array(
	                "UNIT" => "GB",
	                "VALUE" => pow(1024, 3)
	            ),
	            2 => array(
	                "UNIT" => "MB",
	                "VALUE" => pow(1024, 2)
	            ),
	            3 => array(
	                "UNIT" => "KB",
	                "VALUE" => 1024
	            ),
	            4 => array(
	                "UNIT" => "B",
	                "VALUE" => 1
	            ),
	        );

	    foreach($arBytes as $arItem)
	    {
	        if($bytes >= $arItem["VALUE"])
	        {
	            $result = $bytes / $arItem["VALUE"];
	            $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
	            break;
	        }
	    }
	    return $result;
	}
}
