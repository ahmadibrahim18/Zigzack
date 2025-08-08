<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');  // or your desired redirect after logout
})->name('logout');


Route::get('/', function () {
    return view('welcome');
});
