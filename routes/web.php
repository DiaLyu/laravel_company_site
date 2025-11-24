<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\HomeController;

Route::get('/', function () {
    return view('home.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
Route::post('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login'); 

Route::get('/verify', [AdminController::class, 'ShowVerification'])->name('custom.verification.form'); 
Route::post('/verify', [AdminController::class, 'VerificationVerify'])->name('custom.verification.verify'); 

Route::middleware('auth')->group(function() {
    Route::get('/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/profile/store', [AdminController::class, 'ProfileStore'])->name('profile.store');
    Route::post('/admin/password/update', [AdminController::class, 'PasswordUpdate'])->name('admin.password.update');
}); 

Route::middleware('auth')->group(function(){

    Route::controller(ReviewController::class)->group(function(){
        Route::get('/all/review', 'AllReview')->name('all.review');
        Route::get('/add/review', 'AddReview')->name('add.review');
        Route::post('/store/review', 'StoreReview')->name('store.review');
        Route::get('/edit/review/{id}', 'EditReview')->name('edit.review');
        Route::post('/update/review', 'UpdateReview')->name('update.review');
        Route::get('/delete/review/{id}', 'DeleteReview')->name('delete.review');
    });
    
    Route::controller(SliderController::class)->group(function(){
        Route::get('/get/slider', 'GetSlider')->name('get.slider');
        Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
        Route::post('/edit-slider/{id}', 'EditSlider');
        Route::post('/edit-features/{id}', 'EditFeatures');
        Route::post('/edit-reviews/{id}', 'EditReviews');
        Route::post('/edit-answers/{id}', 'EditAnswers');
    });

    Route::controller(HomeController::class)->group(function(){
        Route::get('/all/features', 'AllFeatures')->name('all.features');
        Route::get('/add/features', 'AddFeatures')->name('add.features');
        Route::post('/store/features', 'StoreFeatures')->name('store.features');
        Route::get('/edit/features/{id}', 'EditFeatures')->name('edit.features');
        Route::post('/update/features', 'UpdateFeatures')->name('update.features');
        Route::get('/delete/features/{id}', 'DeleteFeatures')->name('delete.features');
    });

    Route::controller(HomeController::class)->group(function(){
        Route::get('/get/clarifies', 'GetClarifies')->name('get.clarifies');
        Route::post('/update/clarifies', 'UpdateClarifies')->name('update.clarifies');
        Route::post('/edit-clarify/{id}', 'EditClarify');
    });

    Route::controller(HomeController::class)->group(function(){
        Route::get('/get/usability', 'GetUsability')->name('get.usability');
        Route::post('/update/usability', 'UpdateUsabilty')->name('update.usability');
    });

     Route::controller(HomeController::class)->group(function(){
        Route::get('/all/connect', 'AllConnect')->name('all.connect');
        Route::get('/add/connect', 'AddConnect')->name('add.connect');
        Route::post('/store/connect', 'StoreConnect')->name('store.connect');
        Route::get('/edit/connect/{id}', 'EditConnect')->name('edit.connect');
        Route::post('/update/connect', 'UpdateConnect')->name('update.connect');
        Route::get('/delete/connect/{id}', 'DeleteConnect')->name('delete.connect');
        Route::post('/edit-connect/{id}', 'EditConnectLayout');
    });

    Route::controller(HomeController::class)->group(function(){
        Route::get('/all/connect', 'AllConnect')->name('all.connect');
        Route::get('/add/connect', 'AddConnect')->name('add.connect');
        Route::post('/store/connect', 'StoreConnect')->name('store.connect');
        Route::get('/edit/connect/{id}', 'EditConnect')->name('edit.connect');
        Route::post('/update/connect', 'UpdateConnect')->name('update.connect');
        Route::get('/delete/connect/{id}', 'DeleteConnect')->name('delete.connect');
        Route::post('/edit-connect/{id}', 'EditConnectLayout');
    });

    Route::controller(HomeController::class)->group(function(){
        Route::get('/all/connect', 'AllConnect')->name('all.connect');
        Route::get('/add/connect', 'AddConnect')->name('add.connect');
        Route::post('/store/connect', 'StoreConnect')->name('store.connect');
        Route::get('/edit/connect/{id}', 'EditConnect')->name('edit.connect');
        Route::post('/update/connect', 'UpdateConnect')->name('update.connect');
        Route::get('/delete/connect/{id}', 'DeleteConnect')->name('delete.connect');
        Route::post('/edit-connect/{id}', 'EditConnectLayout');
    });

    Route::controller(HomeController::class)->group(function(){
        Route::get('/all/faq', 'AllFAQ')->name('all.faq');
        Route::get('/add/faq', 'AddFAQ')->name('add.faq');
        Route::post('/store/faq', 'StoreFAQ')->name('store.faq');
        Route::get('/edit/faq/{id}', 'EditFAQ')->name('edit.faq');
        Route::post('/update/faq', 'UpdateFAQ')->name('update.faq');
        Route::get('/delete/faq/{id}', 'DeleteFAQ')->name('delete.faq');
        Route::post('/edit-faq/{id}', 'EditFAQLayout');
    });

    Route::controller(HomeController::class)->group(function(){
        Route::post('/edit-app/{id}', 'EditApp');
        Route::post('/update-app-image/{id}', 'UpdateAppsImage');
    });
});