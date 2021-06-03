<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\MenuController;


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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/auth/login',[StaffController::class,'login'])->name('auth.login');
Route::post('auth/check', [StaffController::class,'check'])->name('auth.check');

Route::get('/staff/mainmenu',[StaffController::class,'mainmenu']);
Route::get("/staff/table",[TableController::class,'index']);
Route::get("/staff/{table_id}/addOrder",[MenuController::class,'index'])->name('staff.addOrder');
