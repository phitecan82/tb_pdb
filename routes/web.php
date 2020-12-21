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
    return view('home');
});

use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\PendudukController;

Route::resource('penduduk',PendudukController::class);
Route::resource('keluarga',KartuKeluargaController::class);


Route::post('/keluarga/index',[KartuKeluargaController::class,'createKeluarga'])->name('post.create');    
Route::get('/delete-post/{id}',[KartuKeluargaController::class,'deleteKeluarga']);