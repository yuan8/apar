<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/unit/{id}', 'HomeController@detail')->name('unit.detail');
Route::get('/media-render-360', 'HomeController@media_render_360')->name('view.media.360');
Route::get('/media-render-media-images/{id}', 'HomeController@media_render_images')->name('view.media.images');




Route::prefix('/admin')->middleware(['auth:web'])->group(function(){
	Route::get('/', 'UnitCtrl@index')->name('d.index');
	Route::get('/test', 'ImageProccess@index')->name('d.test');
	Route::post('/test', 'ImageProccess@store')->name('d.test.post');



	Route::get('/unit', 'UnitCtrl@index')->name('d.post');

	Route::get('/init', 'UnitCtrl@init')->name('d.init');

	Route::get('/unit/create', 'UnitCtrl@create')->name('d.create');

});
