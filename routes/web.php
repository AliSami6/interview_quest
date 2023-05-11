<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserInfoController;

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

Route::controller(UserInfoController::class)->group(function () {
    Route::get('/', 'UserInfoList')->name('user.info.index');
    Route::get('/create', 'UserInfoCreate')->name('user.info.create');
    Route::post('/create', 'UserInfoStore')->name('user.info.store');
    Route::get('/edit/{user_info}', 'UserInfoEdit')->name('user.info.edit');
    Route::put('/update/{user_info}', 'UserInfoUpdate')->name('user.info.update');
    Route::delete('{user_info_id}/delete', 'UserInfoDelete')->name('user.info.delete');
       
});