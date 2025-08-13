<?php

use Illuminate\Support\Facades\Route;
use Modules\Panel\Http\Controllers\Index;


Route::group(['middleware'=>['auth', 'verified']], function(){
    Route::get('panel', Index::class)->name('panel');
});
