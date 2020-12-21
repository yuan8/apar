<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\UnitModel;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function media_render_images($id,Request $request){
        $date=Carbon::now();
       $data=UnitModel::with(['_media_images'])->where([
            ['id','=',$id],
            ['end_date','>=',$date]
             ])->first();
        if($data){
            return view('partials.view_media_image')->with(['data_item'=>$data,'image'=>$request->image]);
        }else{
            return abort(404);
        }
    }
    public function media_render_360(Request $request){
        if($request->image360){
            return view('partials.panolens')->with('source',$request->image360);

        }else{
            return view('partials.panolens')->with('source',null);
        }
    }
    public function index(Request $request)
    {
        $lokasi=DB::table('kota')->selectRaw(
            "id,(select nama from provinsi where provinsi.id=kota.id_provinsi) as nama_provinsi,nama as text"
        )->get();
    //     $data=UnitModel::whereRaw('id=1')->first()->toArray();
    //     $dom='';
    // foreach ($data as $key => $value) {
    //     $dom.='"'.$key.'"=>$'.'request->'.$key.'??false,<br>';
    // }

    // return $dom;
        return view('home')->with([
            'request'=>$request,
            'lokasi_search'=>$lokasi
        ]);
    }


    public function detail($id,$slug=null){
        $date=Carbon::now();
        $data=UnitModel::with(['_media_images','_media_360','_user','_province','_city','_district','_sub_district'])->where([
            ['id','=',$id],
            ['end_date','>=',$date]
        ])->first();

        if($data){
            return view('detail')->with(['data_item'=>$data]);
        }else{
            return abort('404');
        }

    }
}
