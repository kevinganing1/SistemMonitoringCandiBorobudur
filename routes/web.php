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

Route::get('/', "PagesController@index");

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');
Route::get('/register', 'PagesController@register');
Route::post('store', 'AuthController@create');

Route::get('/forgotPassword', 'AuthController@forgot');
Route::post('/forgotPassword', 'AuthController@password');

Route::get('/kuliner', 'KulinerController@index');
Route::get('/kuliner/{kuliner}', 'KulinerController@show');

Route::get('/wisata', 'WisataController@index');
Route::get('/wisata/{wisata}', 'WisataController@show');

Route::get('/event', 'EventController@index');
Route::get('/event/{event}', 'EventController@show');


Route::group(['middleware' => ['auth', 'checkRole:admin']],function(){
	Route::get('/admin', 'PagesController@adminHome')->name('admin');
	
	Route::get('/kulinerAdmin', 'KulinerController@kulinerAdmin');
	Route::get('/pageAdmink/{kuliner}', 'KulinerController@showAdmin');
	Route::post('/kuliner/create', 'KulinerController@create');
	Route::get('/kuliner/edit/{id}', 'KulinerController@edit');
	Route::post('/kuliner/{id}/update', 'KulinerController@update');
	Route::get('/kuliner/{id}/delete', 'KulinerController@delete');

	Route::get('/wisataAdmin', 'WisataController@wisataAdmin');
	Route::get('/pageAdminw/{wisata}', 'WisataController@showAdmin');
	Route::post('/wisata/create', 'WisataController@create');
	Route::get('/wisata/edit/{id}', 'WisataController@edit');
	Route::post('/wisata/{id}/update', 'WisataController@update');
	Route::get('/wisata/{id}/delete', 'WisataController@delete');

	Route::get('/eventAdmin', 'EventController@eventAdmin');
	Route::get('/pageAdmine/{event}', 'EventController@showAdmin');
	Route::post('/event/create', 'EventController@create');
	Route::get('/event/edit/{id}', 'EventController@edit');
	Route::post('/event/{id}/update', 'EventController@update');
	Route::get('/event/{id}/delete', 'EventController@delete');

	// SISTEM DASHBOARD
	Route::get('/dashboard', 'AdminController@dashboard');

	Route::get('/dashboard/pengunjung', 'AdminController@pengunjung');

	Route::get('/dashboard/penjualan', 'AdminController@penjualan');
	
	Route::get('/dashboard/review', 'AdminController@review');
	


});

Route::group(['middleware' => ['auth', 'checkRole:user']],function(){
	Route::get('/home', 'PagesController@home');
});


 