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
Route::get('/province-update/{id}', 'ProvinceController@update')->name('provinsi-update');
Route::post('/province-edit/{id}', 'ProvinceController@edit')->name('provinsi-edit');
Route::delete('/province-delete/{id}', 'ProvinceController@delete')->name('province-delete');

Route::get('/country', 'CountryController@index')->name('country');
Route::post('/country-store', 'CountryController@store')->name('country-store');
Route::get('/country-update/{id}', 'CountryController@update')->name('country-update');
Route::post('/country-edit/{id}', 'CountryController@edit')->name('country-edit');
Route::delete('/country-delete/{id}', 'CountryController@delete')->name('country-delete');

Route::get('/city', 'CityController@index')->name('city');
Route::post('/city-store', 'CityController@store')->name('city-store');
Route::get('/city-update/{id}', 'CityController@update')->name('city-update');
Route::post('/city-edit/{id}', 'CityController@edit')->name('city-edit');
Route::delete('/city-delete/{id}', 'CityController@delete')->name('city-delete');



Route::get('/user', function(){
    // dd(session('token'));
    $user = Http::withHeaders([
        'Authorization' => "Bearer ".session('token')
    ])->get('http://backend-dev.cakra-tech.co.id/api/user')->json();

    return $user;
})->name('user');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
