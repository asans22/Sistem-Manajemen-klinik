<?php

use App\Http\Controllers\halamanAdminController;
use App\Http\Controllers\UserSessionControl;
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

Route::get('/home', [UserSessionControl::class, 'home'])->middleware([isLogin::class, UserAkses::class.':user']);
Route::get('/dokter', [UserSessionControl::class, 'dokter'])->middleware([isLogin::class, UserAkses::class.':dokter']);

Route::get('/admin', [UserSessionControl::class, 'admin'])->middleware([isLogin::class, UserAkses::class.':admin']);
Route::get('/adminDokter', [halamanAdminController::class, 'adminDokter'])->middleware([isLogin::class, UserAkses::class.':admin']);
Route::get('/adminPasien', [halamanAdminController::class, 'adminPasien'])->middleware([isLogin::class, UserAkses::class.':admin']);
Route::get('/adminObat', [halamanAdminController::class, 'showObat'])->name('adminObat')->middleware([isLogin::class, UserAkses::class.':admin']);
Route::post('/obat', [halamanAdminController::class, 'storeObat'])->name('obat.store')->middleware([isLogin::class, UserAkses::class.':admin']);
Route::put('/obat/update', [halamanAdminController::class, 'update'])->name('obat.update')->middleware([isLogin::class, UserAkses::class.':admin']);
Route::get('/obat/{id}', [halamanAdminController::class, 'getObat'])->middleware([isLogin::class, UserAkses::class.':admin']);
Route::delete('/obat/{id}', [halamanAdminController::class, 'destroy'])->name('obat.destroy')->middleware([isLogin::class, UserAkses::class.':admin']);



Route::get('/reservasi', function() {
    return view('user.reservasi');
});
