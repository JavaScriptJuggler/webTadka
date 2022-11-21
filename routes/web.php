<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CtaController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HeadingDescriptionController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\seoAndDigitalMarketingController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class, 'index'])->name('landing');
Route::get('/about-us', [FrontendController::class, 'about_us'])->name('about-us');
Route::get('/blogs', [FrontendController::class, 'blogs'])->name('blogs');
Route::get('/blog-details/{blogid}', [FrontendController::class, 'blog_details'])->name('blog-details');
Route::get('service-details', [ServiceController::class, 'index'])->name('service-details');

/* prevent back afetr logout */
Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes(['register' => false]);
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/change-hero-image', [HeroController::class, 'goToHeroPage'])->name('change-hero-image');
    Route::post('/upload-hero-image', [HeroController::class, 'uploadHeroImage'])->name('upload-hero-image');
    Route::get('/hero-content-page', [HeroController::class, 'showHeroContentPage'])->name('hero-content-page');
    Route::post('/save-hero-content', [HeroController::class, 'saveHeroContent'])->name('save-hero-content');
    Route::post('/delete-hero-content', [HeroController::class, 'deleteHeroContent'])->name('delete-hero-content');
    Route::get('/seo-and-digital-marketing', [seoAndDigitalMarketingController::class, 'goToSeoDigitalPage'])->name('seo-and-digital-marketing');
    Route::post('/save-seo-and-services-content', [seoAndDigitalMarketingController::class, 'seoAndServicesContents'])->name('save-seo-and-services-content');
    Route::post('/delete-services', [seoAndDigitalMarketingController::class, 'deleteServices'])->name('delete-services');
    Route::get('/cta', [CtaController::class, 'showCtaPage'])->name('cta');
    Route::post('/save-cta-header-description', [CtaController::class, 'saveCtaHeaderDescription'])->name('save-cta-header-description');
});
