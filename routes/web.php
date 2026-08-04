<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SeoController;
use App\Models\LegalPage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Pages publiques
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/realisations', [PageController::class, 'realisations'])->name('realisations');
Route::get('/certifications', [PageController::class, 'certifications'])->name('certifications');
Route::get('/a-propos', [PageController::class, 'about'])->name('about');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');

/*
|--------------------------------------------------------------------------
| Contact & devis
|--------------------------------------------------------------------------
*/
Route::get('/contact', [ContactController::class, 'showContact'])->name('contact');
Route::get('/devis', [ContactController::class, 'showQuote'])->name('quote');
Route::get('/devis/creneaux', [ContactController::class, 'slots'])->name('quote.slots');
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:6,1')
    ->name('contact.store');

/*
|--------------------------------------------------------------------------
| Pages légales
|--------------------------------------------------------------------------
*/
Route::get('/mentions-legales', fn () => view('pages.legal.mentions', [
    'page' => LegalPage::where('slug', LegalPage::MENTIONS)->firstOrFail(),
]))->name('legal.mentions');
Route::view('/politique-de-confidentialite', 'pages.legal.privacy')->name('legal.privacy');
Route::get('/conditions-generales', fn () => view('pages.legal.terms', [
    'page' => LegalPage::where('slug', LegalPage::TERMS)->firstOrFail(),
]))->name('legal.terms');
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

/*
|--------------------------------------------------------------------------
| Back-office (admin)
|--------------------------------------------------------------------------
| Authentification fournie par Laravel Breeze (routes/auth.php : login,
| mot de passe oublié, changement de mot de passe). Pas d'auto-inscription :
| le compte admin est créé par un seeder. L'accès à /admin est en plus
| protégé par le middleware "admin" (flag is_admin sur le user connecté).
*/
Route::redirect('/dashboard', '/admin')->middleware('auth')->name('dashboard');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::get('leads', [Admin\LeadController::class, 'index'])->name('leads.index');
    Route::get('leads/{lead}', [Admin\LeadController::class, 'show'])->name('leads.show');
    Route::patch('leads/{lead}', [Admin\LeadController::class, 'update'])->name('leads.update');

    Route::resource('services', Admin\ServiceController::class)->except('show');
    Route::resource('certifications', Admin\CertificationController::class)->except('show');
    Route::resource('values', Admin\ValueController::class)->except('show');

    Route::resource('trust-chips', Admin\TrustChipController::class)->except('show');
    Route::resource('stats', Admin\StatController::class)->except('show');
    Route::resource('chatbot-channels', Admin\ChatbotChannelController::class)->except('show');
    Route::resource('testimonials', Admin\TestimonialController::class)->except('show');
    Route::resource('office-locations', Admin\OfficeLocationController::class)->except('show');
    Route::resource('faq-items', Admin\FaqItemController::class)->except('show');
    Route::resource('portfolio-items', Admin\PortfolioItemController::class)->except('show');

    Route::get('site-texts/{group}', [Admin\SiteTextController::class, 'edit'])->name('site-texts.edit');
    Route::put('site-texts/{group}', [Admin\SiteTextController::class, 'update'])->name('site-texts.update');

    Route::get('legal', [Admin\LegalPageController::class, 'index'])->name('legal.index');
    Route::get('legal/{legalPage:slug}/edit', [Admin\LegalPageController::class, 'edit'])->name('legal.edit');
    Route::put('legal/{legalPage:slug}', [Admin\LegalPageController::class, 'update'])->name('legal.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
