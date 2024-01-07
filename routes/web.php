<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Twitter_clone\User\UserController;
use App\Http\Controllers\Twitter_clone\User\FollowerController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/user/home', [UserController::class, 'index'])->name('users.index');
    Route::post('logout', [UserController::class, 'destroy'])->name('user.logout');

    Route::post('/follow/{user_id}/user', [FollowerController::class, 'follow'])->name('follow');
    Route::post('/nofollow/{user_id}/user', [FollowerController::class, 'nofollow'])->name('nofollow');
});
