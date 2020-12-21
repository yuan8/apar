<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:api')->group( function () {
  	Route::post('unit/upload-media','ImageProccess@store')->name('api.upload.media');
  	Route::post('unit/store','UnitCtrl@store')->name('api.unit.store');
  	Route::get('apartemen/data','LocationCtrl@apartemen')->name('api.apartemen.data');
  	Route::get('location/province','LocationCtrl@provice')->name('api.loc.province');
  	Route::get('location/city','LocationCtrl@city')->name('api.loc.city');
  	Route::get('location/district','LocationCtrl@district')->name('api.loc.district');
  	Route::get('location/sub_district','LocationCtrl@sub_district')->name('api.loc.sub_district');

});


  	Route::post('unit/list','UnitCtrl@api_index')->name('api.unit.list');

  	Route::get('search/list','UnitCtrl@api_list_search')->name('api.search.list');

