<?php

use App\Http\Controllers\aboutUsController;
use App\Http\Controllers\blogController;
use App\Http\Controllers\BotmanController;
use App\Http\Controllers\brandController;
use App\Http\Controllers\callConnectController;
use App\Http\Controllers\CtaController;
use App\Http\Controllers\faqController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LetsTalkController;
use App\Http\Controllers\portfolioController;
use App\Http\Controllers\seoAndDigitalMarketingController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\settingsController;
use App\Http\Controllers\subscribeController;
use App\Http\Controllers\testController;
use App\Http\Controllers\testimonialsController;
use App\Http\Controllers\toolsTechnologiesController;
use App\Http\Controllers\viewMailcontroller;
use App\Http\Controllers\whyChooseUsController;
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

/* prevent back afetr logout */

Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes(['register' => false]);

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/cms', function () {
        view()->share([
            'pageTitle' => 'Content Management System',
        ]);
        return view('admin_dashboard.cms');
    })->name('cms')->middleware(['auth']);
    Route::get('/change-hero-image', [HeroController::class, 'goToHeroPage'])->name('change-hero-image');
    Route::get('/quotes', [LetsTalkController::class, 'quotes'])->name('quotes');
    Route::post('/delete-quotes', [LetsTalkController::class, 'deleteQuotes'])->name('delete-quotes');
    Route::post('/upload-hero-image', [HeroController::class, 'uploadHeroImage'])->name('upload-hero-image');
    Route::get('/hero-content-page', [HeroController::class, 'showHeroContentPage'])->name('hero-content-page');
    Route::post('/save-hero-content', [HeroController::class, 'saveHeroContent'])->name('save-hero-content');
    Route::post('/delete-hero-content', [HeroController::class, 'deleteHeroContent'])->name('delete-hero-content');
    Route::get('/seo-and-digital-marketing', [seoAndDigitalMarketingController::class, 'goToSeoDigitalPage'])->name('seo-and-digital-marketing');
    Route::post('/save-seo-and-services-content', [seoAndDigitalMarketingController::class, 'seoAndServicesContents'])->name('save-seo-and-services-content');
    Route::post('/delete-services', [seoAndDigitalMarketingController::class, 'deleteServices'])->name('delete-services');
    Route::post('/delete-reasons', [whyChooseUsController::class, 'deleteReasons'])->name('delete-reasons');
    Route::get('/cta', [CtaController::class, 'showCtaPage'])->name('cta');
    Route::post('/save-cta-header-description', [CtaController::class, 'saveCtaHeaderDescription'])->name('save-cta-header-description');
    Route::get('/why-choose-us', [whyChooseUsController::class, 'showWhyChooseUsPage'])->name('why-choose-us');
    Route::post('/save-why-choose-us', [whyChooseUsController::class, 'saveWhyChooseUs'])->name('save-why-choose-us');
    Route::get('/testimonials', [testimonialsController::class, 'showTestimonialsPage'])->name('testimonials');
    Route::post('/save-testimonials', [testimonialsController::class, 'saveTestimonials'])->name('save-testimonials');
    Route::post('/delete-testimonials', [testimonialsController::class, 'deleteTestimonials'])->name('delete-testimonials');
    Route::get('/brand-that-trust', [brandController::class, 'showBrandPage'])->name('brand-that-trust');
    Route::post('/save-brand', [brandController::class, 'saveBrand'])->name('save-brand');
    Route::post('/delete-brand', [brandController::class, 'deleteBrand'])->name('delete-brand');
    Route::get('/tools-technologies', [toolsTechnologiesController::class, 'showToolPage'])->name('tools-technologies');
    Route::post('/save-tools-technologies', [toolsTechnologiesController::class, 'saveTools'])->name('save-tools-technologies');
    Route::post('/delete-tools-technologies', [toolsTechnologiesController::class, 'deleteTools'])->name('delete-tools-technologies');
    Route::get('/about-us', [aboutUsController::class, 'showAboutUsPAge'])->name('about-us');
    Route::post('/about-us-save', [aboutUsController::class, 'saveAboutUsPAge'])->name('about-us-save');
    Route::get('/faq', [faqController::class, 'showfaq'])->name('faq');
    Route::post('/faq-save', [faqController::class, 'saveFaq'])->name('faq-save');
    Route::post('/faq-delete', [faqController::class, 'deleteFaq'])->name('faq-delete');
    Route::get('/view-mails', [viewMailcontroller::class, 'index'])->name('view-mails');
    Route::post('/send-mails', [viewMailcontroller::class, 'sendMail'])->name('send-mails');
    Route::get('/view-mail-details/{inboxid}', [viewMailcontroller::class, 'mailData'])->name('view-mail-details');
    Route::post('/change-mail-stat', [viewMailcontroller::class, 'chnageMailStat'])->name('change-mail-stat');
    Route::post('/save-lets-talk-and-client-support', [LetsTalkController::class, 'index'])->name('save-lets-talk-and-client-support');
    Route::get('/show-portfolio-page', [portfolioController::class, 'index'])->name('show-portfolio-page');
    Route::post('/save-portfolio', [portfolioController::class, 'savePortfolio'])->name('save-portfolio');
    Route::post('/save-portfolio-category', [portfolioController::class, 'savePortfolioCategory'])->name('save-portfolio-category');
    Route::post('/delete-portfolio-category', [portfolioController::class, 'deletePortfolioCategory'])->name('delete-portfolio-category');
    Route::post('/delete-portfolio', [portfolioController::class, 'deletePortfolio'])->name('delete-portfolio');
    Route::get('/sub-services/{servicedetails}', [seoAndDigitalMarketingController::class, 'subServices'])->name('sub-services');
    Route::post('/add-edit-subservices', [seoAndDigitalMarketingController::class, 'addEditSubServices'])->name('add-edit-subservices');
    Route::post('/delete-subservices', [seoAndDigitalMarketingController::class, 'deleteSubServices'])->name('delete-subservices');
    Route::get('/settings', [settingsController::class, 'userSettings'])->name('settings');
    Route::post('/save-settings', [settingsController::class, 'saveSettings'])->name('save-settings');
    Route::post('/delete-subscribers', [subscribeController::class, 'deleteSubscribers'])->name('delete-subscribers');
    Route::get('/get-subscribers', [subscribeController::class, 'getSubscribers'])->name('get-subscribers');
    Route::get('/get-callconnect', [callConnectController::class, 'getCallConnect'])->name('get-callconnect');
    Route::post('/delete-callconnect', [callConnectController::class, 'deleteCallConnect'])->name('delete-callconnect');

    /* blog route */
    Route::get('/blog-list', [blogController::class, 'blogList'])->name('blog-list');
    Route::get('/create-blog', [blogController::class, 'createBlog'])->name('create-blog');
    Route::post('/upload-blog-image', [blogController::class, 'uploadBlogImage'])->name('upload-blog-image');
    Route::post('/add-blog-category', [blogController::class, 'addBlogCategory'])->name('add-blog-category');
    Route::post('/save-blog', [blogController::class, 'saveBlog'])->name('save-blog');
    Route::post('/delete-blog', [blogController::class, 'deleteBlog'])->name('delete-blog');

    /* bot route */
    Route::get('/botdata-list', [BotmanController::class, 'showbotmandata'])->name('botdata-list');
    Route::post('/save-task', [BotmanController::class, 'savetaskData'])->name('save-task');
    Route::post('/delete-task', [BotmanController::class, 'deleteTaskData'])->name('delete-task');

    /* service master */
    Route::get('service-master', [ServicesController::class, 'index'])->name('service-master');
    Route::post('get-sub-services', [ServicesController::class, 'getSubServices'])->name('get-sub-services');
    Route::post('get-data', [ServicesController::class, 'getData'])->name('get-data');
    Route::post('delete-data', [ServicesController::class, 'deleteData'])->name('delete-data');
});

Route::get('/get-mails', [testController::class, 'index']);
