<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\PendudukController;
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



Route::resource('keluarga',KartuKeluargaController::class);
Route::post('/keluarga/index',[KartuKeluargaController::class,'createKeluarga'])->name('post.create');
Route::get('/keluarga/edit/{id}',[KartuKeluargaController::class,'editKeluarga'])->name('keluarga.edit');
Route::post('/keluarga/edit',[KartuKeluargaController::class,'update'])->name('post.update'); 
Route::get('/delete-post/{id}',[KartuKeluargaController::class,'deleteKeluarga']);


Route::get('/penduduk', [PendudukController::class,'index'])->name('penduduk');
Route::post('/kelolaPenduduk',[PendudukController::class,'createPenduduk'])->name('');
Route::get('/edit/{id}',[PendudukController::class,'edit']);
Route::get('/detailPenduduk/{id}', [PendudukController::class,'detail']);
Route::get('laporan/laporan/{id}',[PendudukController::class,'laporan']);
Route::get('/penduduk/delete/{id}', [PendudukController::class,'delete']);
Route::get('laporan/laporan',[PendudukController::class,'laporan']);


