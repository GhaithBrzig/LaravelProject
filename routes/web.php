<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\serviceBackoffice;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PostBackoffice;
use App\Models\Review;

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

    //backoffice routes
    Route::get('/adminpanel', function () {
        return view('backOffice/shared/dashboard');
    });

    Route::resource('services', serviceBackoffice::class);
    Route::resource('postsBack', PostBackoffice::class);
    Route::resource('tags', TagController::class);
    Route::resource('users', UserController::class);
    Route::resource('review', ReviewController::class);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route to display a list of posts
    Route::resource('/posts', PostController::class);
    Route::post('/posts/comments/{post}', [PostController::class, 'store_comment'])->name('posts.store_comment');
    Route::delete('/posts/comments/{comment}', [PostController::class, 'delete_comment'])->name('posts.delete_comment'); // Update the route URL
    Route::post('/like/{post}', [PostController::class, 'like'])->name('posts.like');
    Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');
});

require __DIR__ . '/auth.php';
