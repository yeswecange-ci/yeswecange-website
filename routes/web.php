<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/realisations', function () {
    return view('realisations');
})->name('realisations');

