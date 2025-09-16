<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UserController;


Route::group(['middleware' => ['auth'], 'prefix' => 'panel'], function () {
    Route::get('users', \Modules\User\Livewire\Users::class)->name('panel.users');
});
