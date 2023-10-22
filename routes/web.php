<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\serviceBackoffice;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProjectController;

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
    return redirect()->route('jobs.index');
});

Route::middleware('auth')->group(function () {
    //frontoffice routes
    Route::resource('service', ServiceController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('jobs', JobController::class);
    Route::resource('posts', PostController::class);
    Route::resource('events', EventController::class);
    Route::resource('projects', ProjectController::class);

    Route::post('/attachUserToEvent', [EventController::class, 'attachUserToEvent'])->name('events.attachUserToEvent');

    //backoffice routes
    Route::get('/adminpanel', function () {
        return view('backOffice/shared/dashboard');
    });

    Route::resource('services', serviceBackoffice::class);
    Route::resource('tags', TagController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
