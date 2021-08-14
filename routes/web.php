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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/post/{id}/{name}', function ($id,$name) { //variable in the url gets to the page
//     return "this is id no. ".$id." ".$name ;
// }); 

Route::get('/contact','dummyController@contact_page'); //routing controller

// Route::get('/dummy/{id}','dummyController@dummy');

// Route::get('/database','dummyController@db_connection');

Route::get('/views',function(){
	return view('welcome') ;

});

Route::get('/login','insertController@loginform');
Route::post('/authenticate/user','insertController@login');

Route::get('/permission','insertController@permissionform');
Route::post('/permit/user','insertController@permission');
Route::get('/user_view','insertController@permissioninfo');

Route::get('/signup','insertController@registerform');
Route::post('/create/user','insertController@register');

Route::get('/metrocardsignup','insertController@metrocardregisterform');
Route::post('/create/metrouser','insertController@metrocardregister');

Route::get('/staffsignup','insertController@staffregisterform');
Route::post('/proceed','insertController@staffregister');

Route::get('/driversignup','insertController@driverregisterform');
Route::post('/register/driver','insertController@driverregister');

Route::get('/stationmastersignup','insertController@stationmasterregisterform');
Route::post('/register/stationmaster','insertController@stationmasterregister');

Route::get('/repairworkersignup','insertController@repairworkerregisterform');
Route::post('/register/repairworker','insertController@repairworkerregister');

Route::get('/repair_view','insertController@repair_worker_viewform');
Route::post('/repair_check','insertController@repair_worker_view');

Route::get('/complaint_view','insertController@complaint_viewform');
Route::post('/complaint_check','insertController@complaint_view');

Route::get('/insert/train_component','insertController@train_component_insertform');
Route::post('/create/train_component','insertController@train_component_insert');

Route::get('/views/train_component','ViewController@train_component_view');

