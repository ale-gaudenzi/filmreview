<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LangController;

Route::middleware(['lang'])->group(function () {
    
Route::get('/lang/{lang}', [LangController::class, 'changeLanguage'])->name('setLang');

Route::get('/', [FrontController::class, 'getHome'])->name('home');
Route::get('/user/profile', [FrontController::class, 'getProfile'])->name('user.profile');

Route::get('/user/login', [AuthController::class, 'authentication'])->name('user.login');
Route::post('/user/login', [AuthController::class, 'login'])->name('user.login');
Route::get('/user/logout', [AuthController::class, 'logout'])->name('user.logout');
Route::get('/user/register', [AuthController::class, 'registration'])->name('user.register');
Route::post('/user/register', [AuthController::class, 'adduser'])->name('user.register');

Route::resource('movie', MovieController::class);
Route::get('/movie', [MovieController::class, 'getBest']) -> name('best');
Route::get('/movie/new', [MovieController::class, 'newMovieForm']) -> name('newmovie');
Route::get('/movie/search', [MovieController::class, 'searchMovieTable']) -> name('movie.search');

Route::resource('review', ReviewController::class);
Route::get('/review', [ReviewController::class, 'newReviewForm']) -> name('review.new');

Route::get('/review/{id}/list', [ReviewController::class, 'showReviews']) -> name('review.showReviews');

Route::get('/ajaxReview', [ReviewController::class, 'ajaxCheckReview']);

Route::get('/search', [SearchController::class, 'search']) -> name('search');

});