<?php

use Modules\Panel\Livewire\Index;
use Illuminate\Support\Facades\Route;
use Modules\Panel\Http\Controllers\PanelController;

Route::group(['middleware' => ['auth']], function () {
    Route::get('panel', [Index::class, 'render'])->name('panel.index');
});
