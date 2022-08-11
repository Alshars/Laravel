<?php

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

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('home');




Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
    Route::get('/create', [\App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
    Route::put('store', [\App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
    Route::get('/quests', [\App\Http\Controllers\QuestController::class, 'index'])->name('quests.index');
    Route::get('/quests/{id}', [\App\Http\Controllers\QuestController::class, 'show'])->name('quests.show');
    Route::get('/created', [\App\Http\Controllers\QuestController::class, 'create'])->name('quests.create');
    Route::put('stored', [\App\Http\Controllers\QuestController::class, 'store'])->name('quests.store');
    Route::get('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
Route::get('/contacts', [\App\Http\Controllers\IndexController::class, 'showContactForm'])->name('contacts');
Route::post('/contact_form_process', [\App\Http\Controllers\IndexController::class, 'contactForm'])->name('contact_form_process');

require __DIR__.'/auth.php';
