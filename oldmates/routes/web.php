<?php

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
    return view('frontend.index');
});

Route::get('/book_trailer', function () {
    return view('frontend.book_trailer');
});

Route::get('/congrats', function () {
    return view('frontend.congrats');
});

Route::get('/done', function () {
    return view('frontend.done');
});

Route::get('/payment_method', function () {
    return view('frontend.payment_method');
});

Route::get('/photo_uploaded', function () {
    return view('frontend.photo_uploaded');
});

Route::get('/upload_photo', function () {
    return view('frontend.upload_photo');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
