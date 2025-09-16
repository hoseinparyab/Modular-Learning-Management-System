<?php

use Illuminate\Support\Facades\Route;
use Modules\RolePermissions\Http\Controllers\RolePermissionsController;

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

Route::group(['middleware' => ['auth'], 'prefix' => 'panel'], function () {
    Route::get('roles', \Modules\RolePermissions\Livewire\Roles::class)->name('panel.roles');
    Route::get('permissions', \Modules\RolePermissions\Livewire\Permissions::class)->name('panel.permissions');
});
