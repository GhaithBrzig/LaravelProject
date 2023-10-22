<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ChartController;


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

//Route::get('/', function () {
//    return view('frontOffice/home');
//});

//redirection
Route::get('/', function () {
   return redirect('/service');
});
//frontoffice routes
Route::resource('service', ServiceController::class);
Route::resource('reviews', ReviewController::class);
Route::resource('jobs', JobController::class);

//backoffice routes
Route::get('/adminpanel', function () {
    return view('backOffice/dashboard');
});


// Route to display a list of posts
Route::resource('/posts', PostController::class);




Route::resource('services', ServiceController::class);
Route::resource('events', EventController::class);


Route::resource('projects', ProjectController::class);


Route::resource('projects.tasks', TaskController::class);

// backoffice
Route::get('/adminpanel/chart', [ChartController::class, 'index']);
Route::get('/export-pdf', [ChartController::class, 'exportPDF'])->name('export.pdf');











