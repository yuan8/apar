<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class LocationCtrl extends Controller
{
    //


    public function provice(Request $request){
    	$data=DB::table('provinsi')
    	->selectRaw("id as id, nama as text")->where('nama','like',('%'.$request->q.'%'))->get();
    	return array(
    		'items'=>$data
    	);
    }

    public function city(Request $request){
    	$data=DB::table('kota')
    	->selectRaw("id as id, nama as text")
    	->where('id_provinsi',$request->id_provinsi)
    	->where('nama','like',('%'.$request->q.'%'))->get();
    	return array(
    		'items'=>$data
    	);
    }

     public function apartemen(Request $request){
    	$data=DB::table('apartemen')
    	->selectRaw("*,nama as text")
    	->where('nama','like',('%'.$request->q.'%'))->get();
    	return array(
    		'items'=>$data
    	);
    }

    public function district(Request $request){
    	$data=DB::table('kecamatan')
    	->selectRaw("id as id, nama as text")
    	->where('id_kota',$request->id_kota)
    	->where('nama','like',('%'.$request->q.'%'))->get();
    	return array(
    		'items'=>$data
    	);
    }
     public function sub_district(Request $request){
    	$data=DB::table('kelurahan')
    	->selectRaw("id as id, nama as text")
    	->where('id_kecamatan',$request->id_kecamatan)
    	->where('nama','like',('%'.$request->q.'%'))->get();
    	return array(
    		'items'=>$data
    	);
    }
}
