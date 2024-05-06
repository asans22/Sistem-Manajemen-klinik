<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return view('Landing');
});
 dokter-page
Route::get('/login', function (){
    return view('Login');
});

Route::get('/register', function (){
    return view('Register');
});

Route::get('/home', function (){
    return view('Home');
});

Route::get('/daftarDokter', function (){
    return view('Dokter');
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

