<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\SeoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Pages publiques
|--------------------------------------------------------------------------
*/
Route::view('/', 'welcome')->name('home');
Route::view('/services', 'services')->name('services');
Route::view('/realisations', 'realisations')->name('realisations');

/*
|--------------------------------------------------------------------------
| Contact & devis
|--------------------------------------------------------------------------
*/
Route::get('/contact', [ContactController::class, 'showContact'])->name('contact');
Route::get('/devis', [ContactController::class, 'showQuote'])->name('quote');
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:6,1')
    ->name('contact.store');

/*
|--------------------------------------------------------------------------
| Pages légales
|--------------------------------------------------------------------------
*/
Route::view('/mentions-legales', 'pages.legal.mentions')->name('legal.mentions');
Route::view('/politique-de-confidentialite', 'pages.legal.privacy')->name('legal.privacy');
Route::view('/conditions-generales', 'pages.legal.terms')->name('legal.terms');
Route::view('/politique-de-cookies', 'pages.legal.cookies')->name('legal.cookies');

/*
|--------------------------------------------------------------------------
| Bascule de langue
|--------------------------------------------------------------------------
*/
Route::get('/locale/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');

/*
|--------------------------------------------------------------------------
| SEO
|--------------------------------------------------------------------------
*/
Route::get('/sitemap.xml', [SeoController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [SeoController::class, 'robots'])->name('robots');
