<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ServiceController;
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
Route::get('/blog-details/{blogid}', [FrontendController::class, 'blog_details'])->name('blog-details');
Route::get('/service-details/{servicename}', [ServiceController::class, 'index'])->name('service-details');
Route::get('/generate-sitemap', function () {
    SitemapGenerator::create('https://www.webtadka.com')->writeToFile(public_path('sitemap.xml'));
});
Route::get('/get-mails', [testController::class, 'index']);
