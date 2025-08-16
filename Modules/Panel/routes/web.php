<?php

use Illuminate\Support\Facades\Route;
use Modules\Panel\Livewire\Index;


Route::group(['middleware'=>['auth', 'verified']], function(){
    Route::get('panel', Index::class)->name('panel');
});
