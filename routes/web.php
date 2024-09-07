<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::post('/login/post/',[Controller::class, 'api']);

Route::get('/login-test', function (){
    return Inertia::render('login');
});




Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/post',[PostController::class, 'index'])->name('posts');
    Route::get('/post/create',[PostController::class, 'create']);
    Route::post('/post/store',[PostController::class, 'store']);
    Route::put('/post/update/{post}',[PostController::class, 'update']);
    Route::get('/post/edit/{post}',[PostController::class, 'edit']);
    Route::get('/post/{post}',[PostController::class, 'show']);
    Route::delete('/delete/{post}',[PostController::class, 'destroy'])->name('post.delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
