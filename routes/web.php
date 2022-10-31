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
Route::post('/check_date1', [App\Http\Controllers\frontend\OrderTrailerController::class, 'check_date1'])->name('check-date1');
Route::post('/check_drop_time', [App\Http\Controllers\frontend\OrderTrailerController::class, 'check_drop_time'])->name('check-drop-time');
Route::post('/check_drop_time1', [App\Http\Controllers\frontend\OrderTrailerController::class, 'check_drop_time1'])->name('check-drop-time1');
Route::post('/check-end-date', [App\Http\Controllers\frontend\OrderTrailerController::class, 'check_end_date'])->name('check-end-date');




/*****************ADMIN ROUTES*******************/
Route::prefix('admin')->middleware('can:admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('frontend.setting');
    })->name('dashboard');
    //trailer
    Route::resource('trailers', App\Http\Controllers\admin\TrailerController::class);
    //Coupon
    Route::resource('coupons', App\Http\Controllers\admin\CouponController::class);
    //Refund work
    Route::get('/orders', [App\Http\Controllers\admin\OrderController::class, 'index'])->name('admin.orders');
    Route::post('/order-completed', [App\Http\Controllers\admin\OrderController::class, 'OrderCompleted']);
});
/*****************END ADMIN ROUTES*******************/


/********************DASHBOARD ROUTES END******************************/

Route::prefix('User')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('frontend.userDashboard.dashboard');
    });
    //order trailer
    Route::get('/order-trailer', [App\Http\Controllers\frontend\OrderTrailerController::class, 'order_trailer'])->name('order-trailer');
    Route::post('/upload-licence', [App\Http\Controllers\frontend\OrderTrailerController::class, 'store_licence'])->name('store-licence');
    Route::get('order-checkout', [App\Http\Controllers\frontend\OrderTrailerController::class, 'order_checkout'])->name('order-checkout');
    Route::post('/order-submit', [App\Http\Controllers\frontend\OrderTrailerController::class, 'orderSubmit'])->name('order.submit');
    Route::get('/order-sucess/{id}', [App\Http\Controllers\frontend\OrderTrailerController::class, 'orderSuccess'])->name('order.success');

    Route::get('/check-coupon', [App\Http\Controllers\frontend\OrderTrailerController::class, 'checkcoupon'])->name('checkcoupon');

    //USER ORDERS
    Route::get('/my_booking', [App\Http\Controllers\frontend\OrderTrailerController::class, 'UserBooking'])->name('user.bookings');
    Route::delete('/delete-booking/{id}', [App\Http\Controllers\frontend\OrderTrailerController::class, 'destroy'])->name('user.bookings');
    //brand-profile
    Route::get('/profile', [App\Http\Controllers\frontend\DashboardController::class, 'profile'])->name('dashboard.profile');
    Route::post('/update-profile', [App\Http\Controllers\frontend\DashboardController::class, 'update_profile'])->name('update.profile');
    Route::get('/book_trailer/{order_id}', [App\Http\Controllers\DashboardController::class, 'book_trailer'])->name('book_trailer');

    Route::post('/paypal-transaction-complete', [App\Http\Controllers\frontend\OrderTrailerController::class, 'paypal_transaction']);



    //return trailer
    Route::get('/photo-upload', [App\Http\Controllers\frontend\OrderTrailerController::class, 'refund_trailer']);
    Route::get('/Order/return-trailer/{id}', [App\Http\Controllers\frontend\OrderTrailerController::class, 'OrderReturnTrailer']);
    Route::post('/Order/trailer-upload-photo', [App\Http\Controllers\frontend\OrderTrailerController::class, 'Order_Trailer_Upload_Photo']);
});






Route::get('/congrats', function () {
    return view('frontend.congrats');
});

// Route::get('/done', function () {
//     return view('frontend.done');
// });

Route::get('/payment_method', function () {
    return view('frontend.payment_method');
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





Route::get('auth/google', [App\Http\Controllers\GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [App\Http\Controllers\GoogleController::class, 'handleGoogleCallback']);
Route::get('auth/facebook', [App\Http\Controllers\GoogleController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [App\Http\Controllers\GoogleController::class, 'handleFacebookCallback']);
