<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::patch('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'update']);
Route::delete('/p/deleteProfileImg', [App\Http\Controllers\ProfileController::class, 'destroy']);
Route::delete('p/deletePost', [App\Http\Controllers\PostsController::class, 'destroy']);

Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit']);

Route::post('/p/updateProfileImg', [App\Http\Controllers\ProfileController::class, 'store']);

Route::get('/p/create', [App\Http\Controllers\PostsController::class, 'create']);

Route::get('/p/{post}', [App\Http\Controllers\PostsController::class, 'show']);

Route::post('/p', [App\Http\Controllers\PostsController::class, 'store']);

Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.show');
