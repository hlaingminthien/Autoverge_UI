<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
Auth::routes();
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
        return view('users.login');
    });
    Route::get('login', function () {
        return view('users.login');
    });
    
    //login
    Route::get('/login', function () {
        return view('users.login');
    });
    Route::post("postlogin", "LoginController@login");
    
    //call center login
    Route::post("postcallcenter_login", "LoginController@login");
    
    //logout
    Route::get('logout', "LoginController@logout");
        
    // Users
    Route::get("users", "UserController@index");
    Route::post("users/create", "UserController@store");
    Route::post('users/update','UserController@update');
    Route::post('users/deactive','UserController@destroy');
    Route::post('users/active','UserController@active');

    // Customer
    Route::get("customer", "CustomerController@index");
    Route::post("customer/create", "CustomerController@store");
    Route::post('customer/update','CustomerController@update');
    Route::post('customer/deactive','CustomerController@destroy');

    // Service
    Route::get("service", "ServiceController@index");
    Route::post("service/create", "ServiceController@store");
    Route::post('service/update','ServiceController@update');
    Route::post('service/deactive','ServiceController@destroy');

    // Booking
    Route::get("booking", "BookingController@index");
    Route::post("booking/create", "BookingController@store");
    Route::post('booking/update','BookingController@update');
    Route::post('booking/deactive','BookingController@destroy');
    
    Route::get('home', "LoginController@home");