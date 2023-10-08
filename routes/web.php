<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
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

//redirection
Route::get('/', function () {
    return redirect('/service');
});

//frontoffice routes
Route::resource('service', ServiceController::class);
Route::resource('reviews', ReviewController::class);

//backoffice routes
Route::get('/adminpanel', function () {
    return view('backOffice/dashboard');
});

