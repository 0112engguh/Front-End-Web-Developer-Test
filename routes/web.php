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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/post/register', 'ApiAuthController@Register')->name("user.register");
Route::post('/post/login', 'ApiAuthController@Login')->name('user.login');

Route::get('/province', 'ManagementController@index')->name('province');
Route::get('/provinsi', 'ProvinceController@index')->name('provinsi');
Route::post('/province-store', 'ProvinceController@store')->name('provinsi-store');
Route::put('/province-update', 'ProvinceController@update')->name('provinsi-update');

Route::get('/user', function(){
    // dd(session('token'));
    $user = Http::withHeaders([
        'Authorization' => "Bearer ".session('token')
    ])->get('http://backend-dev.cakra-tech.co.id/api/user')->json();

    return $user;
})->name('user');

Route::get('/city', function(){
    // dd(session('token'));
    $city = Http::withHeaders([
        'Authorization' => "Bearer ".session('token')
    ])->get('http://backend-dev.cakra-tech.co.id/api/city')->json();

    return $city;
})->name('city');

Route::get('/country', function(){
    // dd(session('token'));
    $country = Http::withHeaders([
        'Authorization' => "Bearer ".session('token')
    ])->get('http://backend-dev.cakra-tech.co.id/api/country')->json();

    return $country;
})->name('country');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
