<?php

use App\Http\Controllers\ProfilingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('user')->controller(ProfilingController::class)->group(function(){
        Route::post('{user?}', 'createUserProfile')->name('add.user');
        Route::get('', 'fetchUsers')->name('fetch.users');
        Route::get('fetch-user/{user}', 'fetchUser')->name('fetch.user');
}); //

