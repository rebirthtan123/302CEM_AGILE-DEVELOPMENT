<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\KitchenController;
use App\Http\Controllers\ReceiptController;

use Illuminate\Support\Facades\DB;


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

Route::get('staff/mainmenu',[StaffController::class,'mainmenu'])->name('staff.mainmenu');
Route::get('staff/mainmenu',[MenuController::class,'index']);
Route::get("staff/table",[TableController::class,'index']);

Route::get("staff/addOrder/{id}",[OrderController::class,'index'])->name('staff.addOrder');
Route::post("staff/addOrder/store/{id}",[OrderController::class,'store'])->name('staff.addOrder.store');

Route::get("staff/kitchen",[KitchenController::class,'index']);
Route::get("staff/edit/{id}",[KitchenController::class,'showOut']);
Route::post("staff/update/{id}",[KitchenController::class,'update'])->name('staff.update');
Route::post("staff/mainmenu/delete/{id}",[OrderController::class,'delete'])->name('staff.delete');


Route::post("staff/mainmenu/receipt/{id}",[ReceiptController::class,'index'])->name('staff.receipt');

Route::post("staff/receipt/delete/{id}",[ReceiptController::class,'deletereceipt'])->name('staff.deletereceipt');
