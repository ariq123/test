<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\LanguageController; 

// Format Baru: [NamaController::class, 'namaMethod']
Route::get('/', [AuthController::class, 'loginForm']); 
Route::post('/login', [AuthController::class, 'login']); 

Route::group(['middleware' => ['check.login', 'prevent.back', 'setlocale']], function () {
    Route::get('/movies', [MovieController::class, 'index']); 
    Route::get('/movies/{id}', [MovieController::class, 'show']); 
    Route::get('/logout', [AuthController::class, 'logout']); 
    Route::post('/favorites', [FavoriteController::class, 'store']); 
    Route::get('/favorites', [FavoriteController::class, 'index']); 
    Route::delete('/favorites/{id}', [FavoriteController::class, 'destroy']); 
});

Route::get('/change-language/{locale}', function ($locale) {
    if (! in_array($locale, ['en','id'])) {
        abort(400);
    }
    session(['locale' => $locale]);

    return redirect()->back()->with('lang_changed', true);
})->name('change.language');

Route::fallback(function () {
    return redirect('/');
});