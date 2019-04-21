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
Route::auth();
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home.home');
});

Route::get('/examination', 'DoctorController@index');
Route::get('/clinic/home',['as' => 'clinic.home', 'uses' =>'ClinicController@home']);
Route::get('/doctor/home', 'DoctorController@home');
Route::get('/clinic/staff/create'  , ['as' => 'clinic.addstaff', 'uses' => 'StaffController@create']);
Route::post('/clinic/staff'  , ['as' => 'clinic.staff', 'uses' => 'StaffController@store']);

