<?php

use Illuminate\Support\Facades\Route;

// ROOT tetap ke login (untuk first time user)
Route::get('/', function () {
    return view('welcome');
});

// Tapi buat akses cepat ke dashboard (buat development)
Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});