<?php

use App\Http\Controllers\halamanAdminController;
use App\Http\Controllers\UserSessionControl;
use App\Http\Middleware\isGuest;
use App\Http\Middleware\isLogin;
use App\Http\Middleware\UserAkses;
use Illuminate\Support\Facades\Route;

//auth
Route::get('/', [UserSessionControl::class, 'landing'])->middleware(isGuest::class);
Route::get('/login', [UserSessionControl::class, 'index'])->middleware(isGuest::class);
Route::post('/loginUser', [UserSessionControl::class, 'login'])->middleware(isGuest::class);
Route::get('/registrasi', [UserSessionControl::class, 'registrasi'])->middleware(isGuest::class);
Route::post('/registerUser', [UserSessionControl::class, 'create'])->middleware(isGuest::class);
Route::get('/userLogout', [UserSessionControl::class, 'logout']);


//user
Route::get('/home', [UserSessionControl::class, 'home'])->middleware([isLogin::class, UserAkses::class.':user']);
Route::get('/dokterUser', [UserSessionControl::class, 'dokterUser'])->middleware([isLogin::class, UserAkses::class.':user']);
Route::get('/reservasiDokter/{id?}', [UserSessionControl::class, 'reservasiDokter'])->middleware([isLogin::class, UserAkses::class.':user'])->name('reservasiDokter');
Route::get('/get-doctors/{spesialis}', [UserSessionControl::class, 'getDoctorsBySpesialis'])->middleware([isLogin::class, UserAkses::class.':user']);
Route::get('/get-schedules/{dokter}', [UserSessionControl::class, 'getSchedulesByDoctor'])->middleware([isLogin::class, UserAkses::class.':user']);
Route::post('/createReservasi', [UserSessionControl::class, 'storeReservasi'])->name('reservasi.store')->middleware([isLogin::class, UserAkses::class.':user']);
Route::get('/myAccount', [UserSessionControl::class, 'myAccount'])->name('myAccount')->middleware([isLogin::class, UserAkses::class.':user']);
Route::post('/editAccount', [UserSessionControl::class, 'updateAccount'])->name('account.update')->middleware([isLogin::class, UserAkses::class.':user']);
Route::get('/detilMedis', [UserSessionControl::class, 'getDetilMedis'])->middleware([isLogin::class, UserAkses::class.':user']);
Route::get('/detilReservasiMedis', [UserSessionControl::class, 'getDetilReservasiMedis'])->middleware([isLogin::class, UserAkses::class.':user']);
Route::get('/reservasi', [UserSessionControl::class, 'reservasi'])->middleware([isLogin::class, UserAkses::class.':user']);
Route::get('/obatUser', [UserSessionControl::class, 'obatUser'])->middleware([isLogin::class, UserAkses::class.':user']);

//dokter
Route::get('/dokter', [UserSessionControl::class, 'dokter'])->middleware([isLogin::class, UserAkses::class.':dokter']);
Route::put('/dokterPasien/update', [UserSessionControl::class, 'updatePasien'])->name('dokterPasien.update')->middleware([isLogin::class, UserAkses::class.':dokter']);
Route::get('/dokterPasien/{id}', [UserSessionControl::class, 'getPasien'])->middleware([isLogin::class, UserAkses::class.':dokter']);



//admin
Route::get('/admin', [UserSessionControl::class, 'admin'])->middleware([isLogin::class, UserAkses::class.':admin']);
Route::get('/adminDokter', [halamanAdminController::class, 'adminDokter'])->name('adminDokter')->middleware([isLogin::class, UserAkses::class.':admin']);
Route::get('/adminPasien', [halamanAdminController::class, 'adminPasien'])->middleware([isLogin::class, UserAkses::class.':admin']);
Route::get('/adminObat', [halamanAdminController::class, 'showObat'])->name('adminObat')->middleware([isLogin::class, UserAkses::class.':admin']);
Route::post('/obat', [halamanAdminController::class, 'storeObat'])->name('obat.store')->middleware([isLogin::class, UserAkses::class.':admin']);
Route::post('/createDokter', [halamanAdminController::class, 'storeDokter'])->name('dokter.store')->middleware([isLogin::class, UserAkses::class.':admin']);
Route::get('/adminDokter/{id}', [halamanAdminController::class, 'getDokter'])->middleware([isLogin::class, UserAkses::class.':admin']);
Route::put('/adminDokter/update', [halamanAdminController::class, 'updateDokter'])->name('dokter.update')->middleware([isLogin::class, UserAkses::class.':admin']);
Route::delete('/adminDokter/{id}', [halamanAdminController::class, 'dokterDestroy'])->name('dokter.destroy')->middleware([isLogin::class, UserAkses::class.':admin']);
Route::put('/obat/update', [halamanAdminController::class, 'update'])->name('obat.update')->middleware([isLogin::class, UserAkses::class.':admin']);
Route::get('/obat/{id}', [halamanAdminController::class, 'getObat'])->middleware([isLogin::class, UserAkses::class.':admin']);
Route::delete('/obat/{id}', [halamanAdminController::class, 'obatDestroy'])->name('obat.destroy')->middleware([isLogin::class, UserAkses::class.':admin']);
