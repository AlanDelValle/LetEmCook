<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\SearchController;
use App\Models\Cook;

//home
Route::get('/', [ContentController::class, 'index'])->name('content.index');
Route::get('/content/{content}', [ContentController::class, 'show'])->name('content.show');

// Categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

// Cooks
Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
Route::get('/tags/{id}', [TagController::class, 'show'])->name('tags.show');

// Cooks
Route::get('/cooks', [CookController::class, 'index'])->name('cooks.index');
Route::get('/cooks/{id}', [CookController::class, 'show'])->name('cooks.show');
// Novas rotas para seguir e deixar de seguir
Route::post('/cooks/{id}/follow', [CookController::class, 'follow'])->name('cooks.follow')->middleware('auth');
Route::post('/cooks/{id}/unfollow', [CookController::class, 'unfollow'])->name('cooks.unfollow')->middleware('auth');

// Search
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Related Content
Route::post('/content/{content}/increment-views', [ContentController::class, 'incrementViews'])->name('content.incrementViews');


/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
