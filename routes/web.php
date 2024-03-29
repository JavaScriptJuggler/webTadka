<?php

use App\Http\Controllers\BotmanController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\sitemapController;
use App\Http\Controllers\subscribeController;
use App\Http\Controllers\testController;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;

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

include 'admin.php';

Route::get('/', [FrontendController::class, 'index'])->name('landing');
// Route::get('/about-us', [FrontendController::class, 'about_us'])->name('about-us');
Route::get('/blogs', [FrontendController::class, 'blogs'])->name('blogs');
Route::get('/portfolio-details/{portfolioid}', [FrontendController::class, 'gotoPortfolioDetails'])->name('portfolio-details');
Route::get('/blog-details/{blogname}', [FrontendController::class, 'blog_details'])->name('blog-details');
Route::get('/service-details/{servicename}', [ServiceController::class, 'index'])->name('service-details');
Route::get('/sitemap.xml', [sitemapController::class, 'index'])->name('sitemap.xml');
Route::get('/get-mails', [testController::class, 'index']);
Route::get('/privecy-policy', [FrontendController::class, 'privacyPolicy'])->name('privecy-policy');
Route::get('/terms-and-conditions', [FrontendController::class, 'termsAndConditions'])->name('terms-and-conditions');
Route::get('/disclaimer', [FrontendController::class, 'disclaimer'])->name('disclaimer');
Route::get('/career', [FrontendController::class, 'career'])->name('career');
Route::get('/policies', [FrontendController::class, 'policies'])->name('policies');
Route::get('/refund-policy', [FrontendController::class, 'refundPolicy'])->name('refund-policy');
Route::get('/partner-program', [FrontendController::class, 'partnerProgramm'])->name('partner-program');
Route::post('/send-career-mail', [FrontendController::class, 'CareerMail'])->name('send-career-mail');
Route::match(['get', 'post'], '/botman', [BotmanController::class, 'index'])->name('botman');
Route::post('/save-subscribe',[subscribeController::class, 'saveSubscribe'])->name('save-subscribe');
