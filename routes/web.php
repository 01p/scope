<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\XMLreader;
use App\Http\Controllers\test;
/*

    


|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|['name' => 'James']
*/

Route::get('/', function () {
    return view('welcome');

 
});

//Route::get('/xml', 'XMLController@index');

// Route::get('/path', 'Controler File');



Route::get('xml', [XMLreader::class,'index']);

Route::get('t', [test::class,'index']);