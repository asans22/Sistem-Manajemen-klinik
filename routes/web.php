<?php

use App\Http\Controllers\halamanAdminController;
use App\Http\Controllers\UserSessionControl;
use App\Http\Controllers\DoctorController;
use App\Http\Middleware\isGuest;
use App\Http\Middleware\isLogin;
use App\Http\Middleware\UserAkses;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserSessionControl::class, 'landing'])->middleware(isGuest::class);
Route::get('/login', [UserSessionControl::class, 'index'])->middleware(isGuest::class);
Route::post('/loginUser', [UserSessionControl::class, 'login'])->middleware(isGuest::class);
Route::get('/registrasi', [UserSessionControl::class, 'registrasi'])->middleware(isGuest::class);
Route::post('/registerUser', [UserSessionControl::class, 'create'])->middleware(isGuest::class);
Route::get('/userLogout', [UserSessionControl::class, 'logout']);

Route::get('/home', [UserSessionControl::class, 'home'])->middleware([isLogin::class, UserAkses::class.':user']); // Perbaiki penamaan middleware dan parameter
Route::get('/dokter', [UserSessionControl::class, 'dokter'])->middleware([isLogin::class, UserAkses::class.':user']); // Perbaiki penamaan middleware dan parameter

Route::get('/dokterView', [UserSessionControl::class, 'pasien'])->middleware([isLogin::class, UserAkses::class.':dokter']); // Perbaiki penamaan middleware dan parameter

Route::get('/admin', [UserSessionControl::class, 'admin'])->middleware([isLogin::class,UserAkses::class.':admin']); // Perbaiki penamaan middleware dan parameter
Route::get("/adminDokter",[halamanAdminController::class,'adminDokter'])->middleware([isLogin::class,UserAkses::class.':admin']);
Route::get("/adminPasien",[halamanAdminController::class,'adminPasien'])->middleware([isLogin::class,UserAkses::class.':admin']);
Route::get("/adminObat",[halamanAdminController::class,'adminObat'])->middleware([isLogin::class,UserAkses::class.':admin']);

Route::resource('doctors', DoctorController::class);

Route::get('/reservasi',function() {
    return view('/user/reservasi');
});

Route::get('/obat',function() {
    return view('/user/obat');
});

Route::get('/daftarDokter', function (){
    return view('Dokter');
});

Route::get('/akun', function (){
    return view('Account');
});

