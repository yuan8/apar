<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Support\Str;
use Auth;
use App\UnitModel;
use Carbon\Carbon;
class UnitCtrl extends Controller
{
    //

	public function api_list_search(Request $request){
		$data=DB::table('unit as u')
		->selectRaw("concat('unit|@|',nama) as id, nama as text")
		->whereRaw("u.nama like '%".$request->q."%'")
		->groupBy('u.nama')
		->limit(10)->get();
		return array('items'=> $data);

	}

    public function index(){
    	$lokasi=DB::table('kota')->selectRaw(
    		"id,(select nama from provinsi where provinsi.id=kota.id_provinsi) as nama_provinsi,nama as text"
    	)->get();


    	return view('admin.post.index')->with('lokasi_search',$lokasi);
    }


    public function api_index(Request $request){
    	$data=UnitModel::with(['_user','_media_images'=>function($q){
    		return $q->where('type',1);

    	},'_province','_city','_district','_sub_district'])->orderBy('end_date','desc')->paginate(10);
    	$return='';
    	foreach ($data as $key => $d) {
    		$return.=view('layouts.item')->with('data_item',$d->toArray())->render();
    	}

    	return $return;
    }


    public function store(Request $request){
    	foreach ($request->all() as $key => $value) {
    		$request->$key=($value=='on'?true:$value);
    	}

    	$valid=Validator::make($request->all(),[
    		'title'=>'required|string|max:195',
    		'apartemen'=>'nullable|exists:apartemen,id',
    		'province'=>'required|exists:provinsi,id',
    		'city'=>'required|exists:kota,id',
    		'district'=>'required|exists:kecamatan,id',
    		'sub_district'=>'required|exists:kelurahan,id',
    		'images'=>'required|array',
    		'flor'=>'numeric|nullable',
    		'tower'=>'string|nullable',

    	]);

    	if($valid->fails()){
    		return $valid->error()->first();
    	}

    	$id_ads='A';
    	do {
    		$id_ads=Str::random(60);
    	} while (DB::table('unit')->where('id_ads',$id_ads)->first());

    	$data=[
    		'id_ads'=>$id_ads,
    		'nama'=>$request->title,
    		'id_provinsi'=>$request->province,
    		'alamat'=>$request->address,
    		'deskripsi'=>$request->decription,
    		'id_kota'=>$request->city,
    		'id_kecamatan'=>$request->district,
    		'id_kelurahan'=>$request->sub_district,
    		'price_monthly'=>$request->price_monthly??0,
    		'price_yearly'=>$request->price_yearly??0,
    		'price_daily'=>$request->price_daily??0,
    		'bedroom'=>$request->bedroom??0,
    		'bathroom'=>$request->bathroom??0,
    		'electricity'=>$request->electricity??0,

    		'livingroom'=>$request->livingroom?true:false,
    		'kitchen'=>$request->kitchen?true:false,
    		'balcony'=>$request->balcony?true:false,
    		'familyroom'=>$request->familyroom?true:false,
    		'full_furnished'=>$request->full_furnished?true:false,

    		"public_swimmingpool"=>$request->public_swimmingpool??false,
			"public_fitnes_center"=>$request->public_fitnes_center??false,
			"public_medical_center"=>$request->public_medical_center??false,
			"public_school_center"=>$request->public_school_center??false,
			"public_spa_center"=>$request->public_spa_center??false,
			"public_shalon"=>$request->public_shalon??false,
			"public_garden"=>$request->public_garden??false,
			"public_mall"=>$request->public_mall??false,
			"public_joging_track"=>$request->public_joging_track??false,
			"public_elevator"=>$request->public_elevator??false,
			"public_24_scurity"=>$request->public_24_scurity??false,
			"public_cctv"=>$request->public_cctv??false,
			"public_access_card"=>$request->public_access_card??false,
			"public_foodcourt"=>$request->public_foodcourt??false,
			"public_laundry"=>$request->public_laundry??false,

			"kitchen_trash_been"=>$request->kitchen_trash_been??false,
			"kitchen_sauce_pan"=>$request->kitchen_sauce_pan??false,
			"kitchen_plate"=>$request->kitchen_plate??false,
			"kitchen_kitchen_set"=>$request->kitchen_kitchen_set??false,
			"kitchen_gas_stove"=>$request->kitchen_gas_stove??false,
			"kitchen_exhaust_fan"=>$request->kitchen_exhaust_fan??false,
			"kitchen_dining_chair"=>$request->kitchen_dining_chair??false,
			"kitchen_bowl"=>$request->kitchen_bowl??false,
			"kitchen_dining_spoon"=>$request->kitchen_dining_spoon??false,
			"kitchen_rice_cooker"=>$request->kitchen_rice_cooker??false,
			"kitchen_mops"=>$request->kitchen_mops??false,
			"kitchen_kettle"=>$request->kitchen_kettle??false,
			"kitchen_fraying_pan"=>$request->kitchen_fraying_pan??false,
			"kitchen_dispenser"=>$request->kitchen_dispenser??false,
			"kitchen_cooking_knife"=>$request->kitchen_cooking_knife??false,
			"kitchen_spatula"=>$request->kitchen_spatula??false,
			"kitchen_refrigerator"=>$request->kitchen_refrigerator??false,
			"kitchen_microwive"=>$request->kitchen_microwive??false,
			"kitchen_glass"=>$request->kitchen_glass??false,
			"kitchen_fork"=>$request->kitchen_fork??false,
			"kitchen_dining_table"=>$request->kitchen_dining_table??false,
			"kitchen_chopping_board"=>$request->kitchen_chopping_board??false,
			"kitchen_electric_plugs"=>$request->kitchen_electric_plugs??false,
			"lroom_air_conditioner"=>$request->lroom_air_conditioner??false,
			"lroom_sofa_pillow"=>$request->lroom_sofa_pillow??false,
			"lroom_iron_board"=>$request->lroom_iron_board??false,
			"lroom_tv"=>$request->lroom_tv??false,
			"lroom_table"=>$request->lroom_table??false,
			"lroom_sofa_bed"=>$request->lroom_sofa_bed??false,
			"lroom_iron"=>$request->lroom_iron??false,
			"lroom_electric_plugs"=>$request->lroom_electric_plugs??false,
			"broom_air_conditioner"=>$request->broom_air_conditioner??false,
			"broom_king_bed"=>$request->broom_king_bed??false,
			"broom_queen_bed"=>$request->broom_queen_bed??false,
			"broom_single_bed"=>$request->broom_single_bed??false,
			"broom_hanger"=>$request->broom_hanger??false,
			"broom_sofa"=>$request->broom_sofa??false,
			"broom_tv"=>$request->broom_tv??false,
			"broom_wardrope"=>$request->broom_wardrope??false,
			"broom_mirror"=>$request->broom_mirror??false,
			"broom_chair"=>$request->broom_chair??false,
			"broom_pillow"=>$request->broom_pillow??false,
			"broom_side_table"=>$request->broom_side_table??false,
			"broom_table"=>$request->broom_table??false,
			"btroom_water_heater"=>$request->btroom_water_heater??false,
			"btroom_sink"=>$request->btroom_sink??false,
			"btroom_toilet_bowl"=>$request->btroom_toilet_bowl??false,
			"btroom_bathup"=>$request->btroom_bathup??false,
			"btroom_exhaust_fan"=>$request->btroom_exhaust_fan??false,
			"btroom_electric_plugs"=>$request->btroom_electric_plugs??false,
			"btroom_mirror"=>$request->btroom_mirror??false,
			"o_balcony"=>$request->o_balcony??false,
			"o_cctv"=>$request->o_cctv??false,
			"o_tv"=>$request->o_tv??false,
			"o_laundry"=>$request->o_laundry??false,
			"o_cleaning_service_request"=>$request->o_cleaning_service_request??false,
			"o_internet_access"=>$request->o_internet_access??false,
			"o_access_card"=>$request->o_access_card??false,
			"o_air_conditioner"=>$request->o_air_conditioner??false,
			"o_mirror"=>$request->o_mirror??false,
			"o_window"=>$request->o_window??false,
    		'id_user'=>$request->user()->id,
    		'end_date'=>Carbon::now()->addDay(7),
    		'deposite_note'=>$request->deposite_note??null,
    		'phone'=>($request->phone)?((strpos('+62', $request->phone??"")!==true)?preg_replace('/^[0]/','+62',$request->phone??""):$request->phone):null,

    	];

    	if((strpos('+',$data['phone'])) and $data['phone']!=null){
    		$data['phone']='+'.$data['phone'];
    	}

    	$data_unit=DB::table('unit')->insertGetId($data);


    	if($data_unit){
    		foreach ($request->images as $key => $value) {
    			$value= (array)$value;
    			DB::table('unit_media')->insert([
    				'path'=>$value["url"],
    				'type'=>$value['type'],
    				'id_unit'=>$data_unit
    			]);
    		}
    	

    	}

    	if($data_unit){
    		$data_unit= DB::table('unit')->where('id',$data_unit)->first();
    		return (array)($data_unit);
    	}

    	
    }


    public function create(){
    	return view('admin.post.create');
    }


    public function init(){

    	$lokasi=[["1","Gambir","Gambir","Jakarta Pusat"],
				["2","Kebon Kelapa","Gambir","Jakarta Pusat"],
				["3","Petojo Utara","Gambir","Jakarta Pusat"],
				["4","Duri Pulo","Gambir","Jakarta Pusat"],
				["5","Cideng","Gambir","Jakarta Pusat"],
				["6","Petojo Selatan","Gambir","Jakarta Pusat"],
				["7","Bendungan Hilir","Tanah Abang","Jakarta Pusat"],
				["8","Karet Tengsin","Tanah Abang","Jakarta Pusat"],
				["9","Kebon Melati","Tanah Abang","Jakarta Pusat"],
				["10","Kebon Kacang","Tanah Abang","Jakarta Pusat"],
				["11","Kampung Bali","Tanah Abang","Jakarta Pusat"],
				["12","Petamburan","Tanah Abang","Jakarta Pusat"],
				["13","Gelora","Tanah Abang","Jakarta Pusat"],
				["14","Menteng","Menteng","Jakarta Pusat"],
				["15","Pegangsaan","Menteng","Jakarta Pusat"],
				["16","Cikini","Menteng","Jakarta Pusat"],
				["17","Kebon Sirih","Menteng","Jakarta Pusat"],
				["18","Gondangdia","Menteng","Jakarta Pusat"],
				["19","Senen","Senen","Jakarta Pusat"],
				["20","Kwitang","Senen","Jakarta Pusat"],
				["21","Kenari","Senen","Jakarta Pusat"],
				["22","Paseban","Senen","Jakarta Pusat"],
				["23","Kramat","Senen","Jakarta Pusat"],
				["24","Bungur","Senen","Jakarta Pusat"],
				["25","Cempaka Putih Timur","Cempaka Putih","Jakarta Pusat"],
				["26","Cempaka Putih Barat","Cempaka Putih","Jakarta Pusat"],
				["27","Galur","Johar Baru","Jakarta Pusat"],
				["28","Tanah Tinggi","Johar Baru","Jakarta Pusat"],
				["29","Kampung Rawa","Johar Baru","Jakarta Pusat"],
				["30","Johar Baru","Johar Baru","Jakarta Pusat"],
				["31","Rawasari","Cempaka Putih","Jakarta Pusat"],
				["32","Gunung Sahari Selatan","Kemayoran","Jakarta Pusat"],
				["33","Kemayoran","Kemayoran","Jakarta Pusat"],
				["34","Kebon Kosong","Kemayoran","Jakarta Pusat"],
				["35","Cempaka Baru","Kemayoran","Jakarta Pusat"],
				["36","Harapan Mulya","Kemayoran","Jakarta Pusat"],
				["37","Sumur Batu","Kemayoran","Jakarta Pusat"],
				["38","Serdang","Kemayoran","Jakarta Pusat"],
				["39","Utan Panjang","Kemayoran","Jakarta Pusat"],
				["40","Pasar Baru","Sawah Besar","Jakarta Pusat"],
				["41","Gunung Sahari Utara","Sawah Besar","Jakarta Pusat"],
				["42","Mangga Dua Selatan","Sawah Besar","Jakarta Pusat"],
				["43","Karang Anyar","Sawah Besar","Jakarta Pusat"],
				["44","Kartini","Sawah Besar","Jakarta Pusat"],
				["45","Pinangsia","Tamansari","Jakarta Barat"],
				["46","Glodok","Tamansari","Jakarta Barat"],
				["47","Keagungan","Tamansari","Jakarta Barat"],
				["48","Krukut","Tamansari","Jakarta Barat"],
				["49","Tamansari","Tamansari","Jakarta Barat"],
				["50","Maphar","Tamansari","Jakarta Barat"],
				["51","Tangki","Tamansari","Jakarta Barat"],
				["52","Mangga Besar","Tamansari","Jakarta Barat"],
				["53","Tanah Sareal","Tambora","Jakarta Barat"],
				["54","Tambora","Tambora","Jakarta Barat"],
				["55","Roa Malaka","Tambora","Jakarta Barat"],
				["56","Pekojan","Tambora","Jakarta Barat"],
				["57","Jembatan Lima","Tambora","Jakarta Barat"],
				["58","Krendang","Tambora","Jakarta Barat"],
				["59","Duri Selatan","Tambora","Jakarta Barat"],
				["60","Duri Utara","Tambora","Jakarta Barat"],
				["61","Kalianyar","Tambora","Jakarta Barat"],
				["62","Jembatan Besi","Tambora","Jakarta Barat"],
				["63","Angke","Tambora","Jakarta Barat"],
				["64","Slipi","Palmerah","Jakarta Barat"],
				["65","Kota Bambu Selatan","Palmerah","Jakarta Barat"],
				["66","Kota Bambu Utara","Palmerah","Jakarta Barat"],
				["67","Jati Pulo","Palmerah","Jakarta Barat"],
				["68","Tomang","Grogol Petamburan","Jakarta Barat"],
				["69","Grogol","Grogol Petamburan","Jakarta Barat"],
				["70","Jelambar","Grogol Petamburan","Jakarta Barat"],
				["71","Jelambar Baru","Grogol Petamburan","Jakarta Barat"],
				["72","Wijaya Kusuma","Grogol Petamburan","Jakarta Barat"],
				["73","Tanjung Duren","Grogol Petamburan","Jakarta Barat"],
				["74","Tanjung Duren Utara","Grogol Petamburan","Jakarta Barat"],
				["75","Kemanggisan","Palmerah","Jakarta Barat"],
				["76","Palmerah","Palmerah","Jakarta Barat"],
				["77","Duri Kepa","Kebon Jeruk","Jakarta Barat"],
				["78","Kedoya Selatan","Kebon Jeruk","Jakarta Barat"],
				["79","Kedoya Utara","Kebon Jeruk","Jakarta Barat"],
				["80","Kebon Jeruk","Kebon Jeruk","Jakarta Barat"],
				["81","Sukabumi Utara","Kebon Jeruk","Jakarta Barat"],
				["82","Kelapa Dua","Kebon Jeruk","Jakarta Barat"],
				["83","Sukabumi Selatan","Kebon Jeruk","Jakarta Barat"],
				["84","Kembangan Barat","Kembangan","Jakarta Barat"],
				["85","Kembangan Timur","Kembangan","Jakarta Barat"],
				["86","Meruya Utara","Kembangan","Jakarta Barat"],
				["87","Serengseng","Kembangan","Jakarta Barat"],
				["88","Joglo","Kembangan","Jakarta Barat"],
				["89","Meruya Selatan","Kembangan","Jakarta Barat"],
				["90","Kedaung Kaliangke","Cengkareng","Jakarta Barat"],
				["91","Kapuk","Cengkareng","Jakarta Barat"],
				["92","Cengkareng Barat","Cengkareng","Jakarta Barat"],
				["93","Cengkareng Timur","Cengkareng","Jakarta Barat"],
				["94","Rawa Buaya","Cengkareng","Jakarta Barat"],
				["95","Duri Kosambi","Cengkareng","Jakarta Barat"],
				["96","Kamal","Kalideres","Jakarta Barat"],
				["97","Tegal Alur","Kalideres","Jakarta Barat"],
				["98","Pegadungan","Kalideres","Jakarta Barat"],
				["99","Kalideres","Kalideres","Jakarta Barat"],
				["100","Semanan","Kalideres","Jakarta Barat"],
				["101","Selong","Kebayoran Baru","Jakarta Selatan"],
				["102","Gunung","Kebayoran Baru","Jakarta Selatan"],
				["103","Kramat Pela","Kebayoran Baru","Jakarta Selatan"],
				["104","Gandaria Utara","Kebayoran Baru","Jakarta Selatan"],
				["105","Cipete Utara","Kebayoran Baru","Jakarta Selatan"],
				["106","Melawai","Kebayoran Baru","Jakarta Selatan"],
				["107","Pulo","Kebayoran Baru","Jakarta Selatan"],
				["108","Petogogan","Kebayoran Baru","Jakarta Selatan"],
				["109","Rawa Barat","Kebayoran Baru","Jakarta Selatan"],
				["110","Senayan","Kebayoran Baru","Jakarta Selatan"],
				["111","Grogol Utara","Kebayoran Lama","Jakarta Selatan"],
				["112","Grogol Selatan","Kebayoran Lama","Jakarta Selatan"],
				["113","Cipulir","Kebayoran Lama","Jakarta Selatan"],
				["114","Kebayoran Lama Selatan","Kebayoran Lama","Jakarta Selatan"],
				["115","Kebayoran Lama Utara","Kebayoran Lama","Jakarta Selatan"],
				["116","Ulujami","Pesanggrahan","Jakarta Selatan"],
				["117","Petukangan Utara","Pesanggrahan","Jakarta Selatan"],
				["118","Petukangan Selatan","Pesanggrahan","Jakarta Selatan"],
				["119","Pondok Pinang","Kebayoran Lama","Jakarta Selatan"],
				["120","Pesanggrahan","Pesanggrahan","Jakarta Selatan"],
				["121","Bintaro","Pesanggrahan","Jakarta Selatan"],
				["122","Cipete Selatan","Cilandak","Jakarta Selatan"],
				["123","Gandaria Selatan","Cilandak","Jakarta Selatan"],
				["124","Cilandak Barat","Cilandak","Jakarta Selatan"],
				["125","Lebak Bulus","Cilandak","Jakarta Selatan"],
				["126","Pondok Labu","Cilandak","Jakarta Selatan"],
				["127","Pejaten Barat","Pasar Minggu","Jakarta Selatan"],
				["128","Pejaten Timur","Pasar Minggu","Jakarta Selatan"],
				["129","Kebagusan","Pasar Minggu","Jakarta Selatan"],
				["130","Pasar Minggu","Pasar Minggu","Jakarta Selatan"],
				["131","Tanjung Barat","Jagakarsa","Jakarta Selatan"],
				["132","Jati Padang","Pasar Minggu","Jakarta Selatan"],
				["133","Ragunan","Pasar Minggu","Jakarta Selatan"],
				["134","Cilandak Timur","Pasar Minggu","Jakarta Selatan"],
				["135","Lenteng Agung","Jagakarsa","Jakarta Selatan"],
				["136","Jagakarsa","Jagakarsa","Jakarta Selatan"],
				["137","Ciganjur","Jagakarsa","Jakarta Selatan"],
				["138","Cipedak","Jagakarsa","Jakarta Selatan"],
				["139","Srengseng Sawah","Jagakarsa","Jakarta Selatan"],
				["140","Kuningan Barat","Mampang Prapatan","Jakarta Selatan"],
				["141","Pela Mampang","Mampang Prapatan","Jakarta Selatan"],
				["142","Bangka","Mampang Prapatan","Jakarta Selatan"],
				["143","Kalibata","Pancoran","Jakarta Selatan"],
				["144","Rawajati","Pancoran","Jakarta Selatan"],
				["145","Duren Tiga","Pancoran","Jakarta Selatan"],
				["146","Cikoko","Pancoran","Jakarta Selatan"],
				["147","Pengadegan","Pancoran","Jakarta Selatan"],
				["148","Pancoran","Mampang Prapatan","Jakarta Selatan"],
				["149","Mampang Prapatan","Mampang Prapatan","Jakarta Selatan"],
				["150","Tegal Parang","Mampang Prapatan","Jakarta Selatan"],
				["151","Tebet Barat","Tebet","Jakarta Selatan"],
				["152","Tebet Timur","Tebet","Jakarta Selatan"],
				["153","Kebon Baru","Tebet","Jakarta Selatan"],
				["154","Bukit Duri","Tebet","Jakarta Selatan"],
				["155","Manggarai","Tebet","Jakarta Selatan"],
				["156","Manggarai Selatan","Tebet","Jakarta Selatan"],
				["157","Menteng Dalam","Tebet","Jakarta Selatan"],
				["158","Setiabudi","Setiabudi","Jakarta Selatan"],
				["159","Karet","Setiabudi","Jakarta Selatan"],
				["160","Karet Semanggi","Setiabudi","Jakarta Selatan"],
				["161","Karet Kuningan","Setiabudi","Jakarta Selatan"],
				["162","Kuningan Timur","Setiabudi","Jakarta Selatan"],
				["163","Menteng Atas","Setiabudi","Jakarta Selatan"],
				["164","Pasar Manggis","Setiabudi","Jakarta Selatan"],
				["165","Guntur","Setiabudi","Jakarta Selatan"],
				["166","Pisangan Baru","Matraman","Jakarta Timur"],
				["167","Utan Kayu Selatan","Matraman","Jakarta Timur"],
				["168","Utan Kayu Utara","Matraman","Jakarta Timur"],
				["169","Kayu Manis","Matraman","Jakarta Timur"],
				["170","Pal Meriam","Matraman","Jakarta Timur"],
				["171","Kebon Manggis","Matraman","Jakarta Timur"],
				["172","Kayu Putih","Pulo Gadung","Jakarta Timur"],
				["173","Jati","Pulo Gadung","Jakarta Timur"],
				["174","Rawamangun","Pulo Gadung","Jakarta Timur"],
				["175","Pisangan Timur","Pulo Gadung","Jakarta Timur"],
				["176","Cipinang","Pulo Gadung","Jakarta Timur"],
				["177","Jatinegara Kaum","Pulo Gadung","Jakarta Timur"],
				["178","Pulo Gadung","Pulo Gadung","Jakarta Timur"],
				["179","Bali Mester","Jatinegara","Jakarta Timur"],
				["180","Kampung Melayu","Jatinegara","Jakarta Timur"],
				["181","Bidara Cina","Jatinegara","Jakarta Timur"],
				["182","Cipinang Cempedak","Jatinegara","Jakarta Timur"],
				["183","Rawa Bunga","Jatinegara","Jakarta Timur"],
				["184","Cipinang Besar Selatan","Jatinegara","Jakarta Timur"],
				["185","Cipinang Besar Utara","Jatinegara","Jakarta Timur"],
				["186","Cipinang Muara","Jatinegara","Jakarta Timur"],
				["187","Pondok Bambu","Duren Sawit","Jakarta Timur"],
				["188","Duren Sawit","Duren Sawit","Jakarta Timur"],
				["189","Pondok Kelapa","Duren Sawit","Jakarta Timur"],
				["190","Malaka Jaya","Duren Sawit","Jakarta Timur"],
				["191","Malaka Sari","Duren Sawit","Jakarta Timur"],
				["192","Pondok Kopi","Duren Sawit","Jakarta Timur"],
				["193","Klender","Duren Sawit","Jakarta Timur"],
				["194","Kramat Jati","Kramatjati","Jakarta Timur"],
				["195","Batu Ampar","Kramatjati","Jakarta Timur"],
				["196","Bale Kambang","Kramatjati","Jakarta Timur"],
				["197","Kampung Tengah","Kramatjati","Jakarta Timur"],
				["198","Dukuh","Kramatjati","Jakarta Timur"],
				["199","Pinang Ranti","Makasar","Jakarta Timur"],
				["200","Makasar","Makasar","Jakarta Timur"],
				["201","Halim Perdanakusumah","Makasar","Jakarta Timur"],
				["202","Cipinang Melayu","Makasar","Jakarta Timur"],
				["203","Cawang","Kramatjati","Jakarta Timur"],
				["204","Cililitan","Kramatjati","Jakarta Timur"],
				["205","Kebon Pala","Makasar","Jakarta Timur"],
				["206","Pekayon","Pasar Rebo","Jakarta Timur"],
				["207","Cibubur","Ciracas","Jakarta Timur"],
				["208","Kelapa Dua Wetan","Ciracas","Jakarta Timur"],
				["209","Ciracas","Ciracas","Jakarta Timur"],
				["210","Susukan","Ciracas","Jakarta Timur"],
				["211","Gedong","Pasar Rebo","Jakarta Timur"],
				["212","Cijantung","Pasar Rebo","Jakarta Timur"],
				["213","Baru","Pasar Rebo","Jakarta Timur"],
				["214","Kalisari","Pasar Rebo","Jakarta Timur"],
				["215","Lubang Buaya","Cipayung","Jakarta Timur"],
				["216","Ceger","Cipayung","Jakarta Timur"],
				["217","Rambutan","Ciracas","Jakarta Timur"],
				["218","Cipayung","Cipayung","Jakarta Timur"],
				["219","Munjul","Cipayung","Jakarta Timur"],
				["220","Pondok Rangon","Cipayung","Jakarta Timur"],
				["221","Cilangkap","Cipayung","Jakarta Timur"],
				["222","Setu","Cipayung","Jakarta Timur"],
				["223","Bambu Apus","Cipayung","Jakarta Timur"],
				["224","Cakung Barat","Cakung","Jakarta Timur"],
				["225","Cakung Timur","Cakung","Jakarta Timur"],
				["226","Rawa Terate","Cakung","Jakarta Timur"],
				["227","Jatinegara","Cakung","Jakarta Timur"],
				["228","Penggilingan","Cakung","Jakarta Timur"],
				["229","Pulo Gebang","Cakung","Jakarta Timur"],
				["230","Ujung Menteng","Cakung","Jakarta Timur"],
				["231","Kalibaru","Cilincing","Jakarta Utara"],
				["232","Cilincing","Cilincing","Jakarta Utara"],
				["233","Semper Barat","Cilincing","Jakarta Utara"],
				["234","Semper Timur","Cilincing","Jakarta Utara"],
				["235","Rorotan","Cilincing","Jakarta Utara"],
				["236","Sukapura","Cilincing","Jakarta Utara"],
				["237","Marunda","Cilincing","Jakarta Utara"],
				["238","Koja Utara","Koja","Jakarta Utara"],
				["239","Koja Selatan","Koja","Jakarta Utara"],
				["240","Rawa Badak","Koja","Jakarta Utara"],
				["241","Kelapa Gading Barat","Kelapa Gading","Jakarta Utara"],
				["242","Kelapa Gading Timur","Kelapa Gading","Jakarta Utara"],
				["243","Pegangsaan Dua","Kelapa Gading","Jakarta Utara"],
				["244","Tugu Selatan","Koja","Jakarta Utara"],
				["245","Tugu Utara","Koja","Jakarta Utara"],
				["246","Lagoa","Koja","Jakarta Utara"],
				["247","Tanjung Priok","Tanjung Priok","Jakarta Utara"],
				["248","Kebon Bawang","Tanjung Priok","Jakarta Utara"],
				["249","Sungai Bambu","Tanjung Priok","Jakarta Utara"],
				["250","Papanggo","Tanjung Priok","Jakarta Utara"],
				["251","Warakas","Tanjung Priok","Jakarta Utara"],
				["252","Sunter Agung","Tanjung Priok","Jakarta Utara"],
				["253","Sunter Jaya","Tanjung Priok","Jakarta Utara"],
				["254","Pademangan Timur","Pademangan","Jakarta Utara"],
				["255","Pademangan Barat","Pademangan","Jakarta Utara"],
				["256","Ancol","Pademangan","Jakarta Utara"],
				["257","Penjaringan","Penjaringan","Jakarta Utara"],
				["258","Pejagalan","Penjaringan","Jakarta Utara"],
				["259","Pluit","Penjaringan","Jakarta Utara"],
				["260","Kapuk Muara","Penjaringan","Jakarta Utara"],
				["261","Kamal Muara","Penjaringan","Jakarta Utara"],
				["262","Pulau Untung Jawa","Kepulauan Seribu","Jakarta Utara"],
				["263","Pulau Tidung","Kepulauan Seribu","Jakarta Utara"],
				["264","Pulau Panggang","Kepulauan Seribu","Jakarta Utara"],
				["265","Pulau Kelapa","Kepulauan Seribu","Jakarta Utara"]
				];

				foreach ($lokasi as $key => $value) {
					
					DB::table('provinsi')->updateOrInsert([
						'nama'=>'DKI Jakarta'
					],[
						'nama'=>'DKI Jakarta',
						'id'=>31

					]);

					$provinsi=DB::table('provinsi')->where('nama','DKI Jakarta')->pluck('id')->first();

					DB::table('kota')->updateOrInsert([
						'nama'=>$value[3]
					],[
						'nama'=>$value[3],
						'id_provinsi'=>$provinsi

					]);

					$kota=DB::table('kota')->where('nama',$value[3])->pluck('id')->first();

					DB::table('kecamatan')->updateOrInsert([
						'nama'=>$value[2]
					],[
						'nama'=>$value[2],
						'id_provinsi'=>$provinsi,
						'id_kota'=>$kota


					]);

					$kecamatan=DB::table('kecamatan')->where('nama',$value[2])->pluck('id')->first();


					DB::table('kelurahan')->updateOrInsert([
						'nama'=>$value[1]
					],[
						'nama'=>$value[1],
						'id_provinsi'=>$provinsi,
						'id_kota'=>$kota,
						'id_kecamatan'=>$kecamatan,



					]);


				}



    }

}
