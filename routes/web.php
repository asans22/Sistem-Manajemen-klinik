<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return view('Landing');
});

Route::get('/login', function (){
    return view('Login');
});

Route::get('/register', function (){
    return view('Register');
});

Route::get('/home', function (){
    return view('Home');
});