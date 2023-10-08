<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\TagController;
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


