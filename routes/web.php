<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home page
Route::get('/', [PageController::class, 'index'])->name('home');

// News routes
Route::get('/news/{post:slug}', [NewsController::class, 'show'])->name('post.show');
Route::get('/category/{category:slug}', [NewsController::class, 'category'])->name('news.category');
Route::get('/search', [NewsController::class, 'search'])->name('news.search');

// Static pages
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy.policy');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');
// Route::get('/advertise', [PageController::class, 'advertise'])->name('advertise');
// Route::get('/careers', [PageController::class, 'careers'])->name('careers');

// Newsletter Routes
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Categories
    Route::resource('categories', CategoryController::class);
    
    // Posts
    Route::resource('posts', PostController::class);
});

// Auth routes
require __DIR__.'/auth.php';
