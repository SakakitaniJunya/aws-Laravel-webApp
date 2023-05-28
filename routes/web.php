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

Route::post('/bazzreach/search', 'App\Http\Controllers\BazzReachController@search')->name('bazzreach.search');
Route::post('/bazzreach/bazzsearch', 'App\Http\Controllers\BazzReachController@bazzsearch')->name('bazzreach.bazzsearch');
Route::post('/bazzreach/{bazzreach}/analysis', 'App\Http\Controllers\BazzReachController@analysis')->name('bazzreach.analysis');
Route::get('/bazzreach/{bazzreach}/result', 'App\Http\Controllers\BazzReachController@result')->name('bazzreach.result');

Route::resource('/bazzreach', App\Http\Controllers\BazzReachController::class);

URL::forceScheme('https');
    