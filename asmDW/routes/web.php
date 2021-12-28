<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NguoidungController;
use App\Http\Controllers\Admincontroller;

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
//frontend
Route::get('/nguoidung', [NguoidungController::class, 'index'])->name('nguoidung');



//backend


//ADMIN
Route::get('/admin', [Admincontroller::class, 'index'])->name('admin');
Route::get('/dashboard', [Admincontroller::class, 'dashboard'])->name('dashboard');
Route::get('/logout', [Admincontroller::class, 'adm_logout'])->name('admin.logout');
Route::post('/admin-dashboard', [Admincontroller::class, 'adm_dashboard'])->name('admin.dashboard');

//nguoidung
Route::get('/DSnguoidung', [NguoidungController::class, 'index'])->name('DSnguoidung');
Route::get('/THEMnguoidung', [NguoidungController::class, 'create'])->name('THEMnguoidung');
Route::get('/SUAnguoidung/{idd}', [NguoidungController::class, 'edit'])->name('SUAnguoidung');
Route::get('/XOAnguoidung/{idd}', [NguoidungController::class, 'destroy'])->name('XOAnguoidung');
Route::get('/mokhoa/{idd}', [NguoidungController::class, 'active'])->name('mokhoa');
Route::get('/khoa/{idd}', [NguoidungController::class, 'close'])->name('khoa');
Route::post('/THEMMOInguoidung', [NguoidungController::class, 'store'])->name('THEMMOInguoidung');
Route::put('/UPDATEnguoidung', [NguoidungController::class, 'update'])->name('UPDATEnguoidung');