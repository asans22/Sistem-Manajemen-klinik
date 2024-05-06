<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin',function() {
    return view('/admin/akun');
});

Route::get('/adminDokter',function() {
    return view('/admin/dokter');
});
Route::get('/pasien',function() {
    return view('/admin/pasien');
});
Route::get('/obat',function() {
    return view('/admin/obat');
});
Route::get('/dokter',function() {
    return view('/dokter/pasien');
});
