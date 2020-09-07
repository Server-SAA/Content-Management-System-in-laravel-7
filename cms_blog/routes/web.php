<?php

use Illuminate\Support\Facades\Route;

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

#   Get Method
Route::get("/", "CMSController@index");
Route::get("/about", "CMSController@about");
Route::get("/services", "CMSController@services");

//  Authentication
Auth::routes();


#   Post Method
Route::post("/searching", "CMSController@searching");
require "blog/web.php";
require "admin/web.php";

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
