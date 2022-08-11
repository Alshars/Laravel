<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'admin'], function () {
    Route::get('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
    Route::post('/posts/comment/{id}', [\App\Http\Controllers\PostController::class, 'comments'])->name('comments');


    Route::get('login', [\App\Http\Controllers\Admin\AuthController::class, 'index'])->name('login');
    Route::post('login_process', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login_process');

    Route::resource("posts", \App\Http\Controllers\Admin\PostController::class);
    Route::get('/posts/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
    Route::resource("quests", \App\Http\Controllers\Admin\QuestController::class);
    Route::get('/quests/{id}', [\App\Http\Controllers\QuestController::class, 'show'])->name('quests.show');

    Route::resource("users", \App\Http\Controllers\Admin\UserController::class);

});

