<?php

use App\Http\Controllers\Kendali;
use App\Http\Controllers\AturBarang;
use App\Http\Controllers\TransaksiJual;
use Illuminate\Support\Facades\Route;

//persiapan
Route::get('/',[Kendali::class,'index']);
Route::get('/login',[Kendali::class,'login']);
Route::post('/prosesLogin',[Kendali::class,'prosesLogin']);
Route::get('/logout',[Kendali::class,'logout']);

//transaksi
Route::get('/jual',[Kendali::class,'jual']);
Route::get('/keranjang', [Kendali::class,'keranjang']);
Route::post('/isiKeranjang',[TransaksiJual::class,'isiKeranjang']);
Route::get('/hapusKeranjang/{kdBarang}',[TransaksiJual::class,'hapusKeranjang']);
Route::post('/bayar',[TransaksiJual::class,'bayar']);

//data barang
Route::get('/tambahBarang',[AturBarang::class,'tambahBarang']);
Route::post('/simpanBarang',[AturBarang::class,'simpanBarang']);
Route::get('/barang',[AturBarang::class,'dataBarang']);
Route::get('/hapusBarang/{kode}',[AturBarang::class,'hapusBarang']);
Route::get('/editBarang/{kode}',[AturBarang::class,'editBarang']);
