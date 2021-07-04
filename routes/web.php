<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\KitchenController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\AdminController;


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

//staff section
Route::get('staff/mainmenu',[StaffController::class,'mainmenu'])->name('staff.mainmenu');
Route::get('staff/mainmenu',[MenuController::class,'index']);
Route::get("staff/table",[TableController::class,'index']);

Route::get("staff/addOrder/{id}",[OrderController::class,'index'])->name('staff.addOrder');
Route::post("staff/addOrder/store/{id}",[OrderController::class,'store'])->name('staff.addOrder.store');

Route::get("staff/kitchen",[KitchenController::class,'index']);
Route::get("staff/edit/{id}",[KitchenController::class,'showOut']);
Route::post("staff/update/{id}",[KitchenController::class,'update'])->name('staff.update');
Route::post("staff/mainmenu/delete/{id}/{table_id}",[OrderController::class,'delete'])->name('staff.delete');

Route::post("staff/order/{id}",[OrderController::class,'update'])->name('order.update');
Route::post("staff/payment/{id}/{table_id}",[ReceiptController::class,'makePayment'])->name('order.makePayment');

Route::post("staff/mainmenu/receipt/{id}/{table_id}",[ReceiptController::class,'index'])->name('staff.receipt');

Route::post("staff/receipt/delete/{id}",[ReceiptController::class,'deletereceipt'])->name('staff.deletereceipt');

//admin section
Route::get("admin/index",[AdminController::class,'index'])->name('admin.index');

//admin Menu section
Route::get("admin/menu",[AdminController::class,'menu'])->name('admin.menu');
Route::get("admin/menu/create",[AdminController::class,'createMenu'])->name('admin.createMenu');
Route::post("admin/menu/store",[AdminController::class,'storeMenu'])->name('admin.storeMenu');
Route::get("admin/menu/edit/{id}",[AdminController::class,'editMenu'])->name('admin.editMenu');
Route::post("admin/menu/update/{id}",[AdminController::class,'updateMenu'])->name('admin.updateMenu');
Route::post("admin/menu/delete/{id}",[AdminController::class,'deleteMenu'])->name('admin.deleteMenu');

//admin User section
Route::get("admin/user",[AdminController::class,'user'])->name('admin.user');
Route::get("admin/user/create",[AdminController::class,'createUser'])->name('admin.createUser');
Route::post("admin/user/store",[AdminController::class,'storeUser'])->name('admin.storeUser');
Route::get("admin/user/edit/{id}",[AdminController::class,'editUser'])->name('admin.editUser');
Route::post("admin/user/update/{id}",[AdminController::class,'updateUser'])->name('admin.updateUser');
Route::post("admin/user/delete/{id}",[AdminController::class,'deleteUser'])->name('admin.deleteUser');


Route::get("admin/viewOrder",[OrderController::class,'viewOrder'])->name('admin.viewOrder');