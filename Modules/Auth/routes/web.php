<?php

use Modules\Auth\Livewire\ForgotPassword;
use Modules\Auth\Livewire\Register;
use Modules\Auth\Livewire\ResetPassword;
use Modules\Auth\Livewire\Login;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'],function(){

    //login route
    Route::get('login',Login::class)->name('login');
    //register user route
    Route::get('register',Register::class)->name('register');
    //forgot password route
    Route::get('forgot-password',ForgotPassword::class)->name('forgot-password');
    //reset password route
    Route::get('reset-password',ResetPassword::class)->name('reset-password');
});
