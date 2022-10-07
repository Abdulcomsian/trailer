<?php

use Illuminate\Support\Facades\Route;

Auth::routes();


//LOGOUT
Route::get('logout', function () {
    auth()->logout();
    Session()->flush();
    return Redirect::to('/');
})->name('logout');

//Home Routes
Route::get('/', [App\Http\Controllers\frontend\HomeController::class, 'landing_page'])->name('landing_page');
Route::get('/home', [App\Http\Controllers\frontend\HomeController::class, 'landing_page'])->name('home');
Route::post('/custom-login', [App\Http\Controllers\frontend\HomeController::class, 'login'])->name('custom-login');


Route::post('/check_date', [App\Http\Controllers\frontend\OrderTrailerController::class, 'check_date'])->name('check-date');
Route::post('/check_drop_time', [App\Http\Controllers\frontend\OrderTrailerController::class, 'check_drop_time'])->name('check-drop-time');


/*****************ADMIN ROUTES*******************/
Route::prefix('admin')->middleware('can:admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('frontend.setting');
    })->name('dashboard');
    //trailer
    Route::resource('trailers', App\Http\Controllers\admin\TrailerController::class);
});
/*****************END ADMIN ROUTES*******************/


/*****************DASHBOARD ROUTES*******************/
Route::prefix('dashboard')->middleware(['auth', 'dashboard'])->group(function () {

    //brand-profile
    Route::get('/profile', [App\Http\Controllers\frontend\DashboardController::class, 'profile'])->name('dashboard.profile');
    Route::post('/update-profile', [App\Http\Controllers\frontend\DashboardController::class, 'update_profile'])->name('update.profile');
    Route::get('/book_trailer/{order_id}', [App\Http\Controllers\DashboardController::class, 'book_trailer'])->name('book_trailer');
    Route::post('/store-licence', [App\Http\Controllers\frontend\OrderTrailerController::class, 'store_licence'])->name('store-licence');
});


/********************DASHBOARD ROUTES END******************************/

Route::prefix('User')->middleware(['auth'])->group(function () {
    //order trailer
    Route::get('/order-trailer', [App\Http\Controllers\frontend\OrderTrailerController::class, 'order_trailer'])->name('order-trailer');
    Route::post('/order-submit', [App\Http\Controllers\frontend\OrderTrailerController::class, 'orderSubmit'])->name('order.submit');
    Route::get('/order-sucess/{id}', [App\Http\Controllers\frontend\OrderTrailerController::class, 'orderSuccess'])->name('order.success');
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

Route::get('/about_us', function () {
    return view('frontend.about_us');
})->name('about-us');

Route::get('/contact_us', function () {
    return view('frontend.contact_us');
})->name('contact-us');

Route::get('/terms', function () {
    return view('frontend.terms');
});

Route::get('/legal', function () {
    return view('frontend.legal');
});

Route::get('/my_booking', function () {
    return view('frontend.my_booking');
});

Route::get('/user_profile', function () {
    return view('frontend.user_profile');
});

Route::get('/dashboard', function () {
    return view('frontend.dashboard');
});

// about_us.blade



Route::get('auth/google', [App\Http\Controllers\GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [App\Http\Controllers\GoogleController::class, 'handleGoogleCallback']);
Route::get('auth/facebook', [App\Http\Controllers\GoogleController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [App\Http\Controllers\GoogleController::class, 'handleFacebookCallback']);
