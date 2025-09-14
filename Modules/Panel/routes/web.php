<?php

use Modules\Panel\Livewire\Index;
use Illuminate\Support\Facades\Route;
use Modules\Panel\Http\Controllers\PanelController;

Route::group(['middleware' => ['auth'],'prefix'=> 'panel'],  function () {
    Route::get('/', [Index::class, 'render'])->name('panel.index');
});
