<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UnitMediaModel;
use App\ProvinceModel;
use App\CityModel;
use App\DistrictModel;
use App\SubDistrictModel;
use App\User;


class UnitModel extends Model
{
    //

    protected $table='unit';
    protected $fillable=['*'];
    public function _media_images(){
    	return $this->hasMany(UnitMediaModel::class,'id_unit')->where('type',1);
    }
     public function _media_360(){
        return $this->hasMany(UnitMediaModel::class,'id_unit')->where('type',2);
    }

    public function _province(){
    	return $this->belongsTo(ProvinceModel::class,'id_provinsi');
    }

    public function _city(){
    	return $this->belongsTo(CityModel::class,'id_kota');
    }

    public function _district(){
    	return $this->belongsTo(DistrictModel::class,'id_kecamatan');
    }

    public function _sub_district(){
    	return $this->belongsTo(SubDistrictModel::class,'id_kelurahan');
    }

     public function _user(){
    	return $this->belongsTo(User::class,'id_user');
    }
}
