<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('frontoffice/home');
});

Route::get('/dash', function () {
    return view('backOffice/dashboard');
});


// Route to display a list of posts
Route::resource('/posts', PostController::class);




Route::resource('services', ServiceController::class);
