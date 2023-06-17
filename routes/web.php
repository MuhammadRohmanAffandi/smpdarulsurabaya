<?php

use App\Http\Controllers\CalonSiswaController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('index');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::resource('calonSiswa', CalonSiswaController::class);
Route::get('/calonSiswa/{calonSiswa}/detail', [HomeController::class, 'detail'])->name('detail');
Route::get('/calonSiswa/{path}/showkk', [HomeController::class, 'showKk'])->name('showKk');
Route::get('/calonSiswa/{path}/showijasah', [HomeController::class, 'showIjasah'])->name('showIjasah');
Route::get('/calonSiswa/{path}/showbuktipembayaran', [HomeController::class, 'showBuktiPembayaran'])->name('showBuktiPembayaran');
Route::get('/calonsiswa/{path}/buktipendaftaran', [CalonSiswaController::class, 'buktiPendaftaran'])->name('buktiPendaftaran');
Route::post('/updateStatus', [HomeController::class, 'updateStatus'])->name('updateStatus');
Route::post('/uploadbuktipembayaran', [CalonSiswaController::class, 'uploadBuktiPembayaran'])->name('uploadBuktiPembayaran');
Route::get('/cekstatuspendaftaran', function () {
    return view('cekStatusPendaftaran');
});
Route::post('/cekstatuspendaftaran', [CalonSiswaController::class, 'searchPendaftaran'])->name('searchPendaftaran');
Route::get('/sukses', function () {
    return view('sukses');
});
Route::get('/statuspendaftaran', function () {
    return view('statusPendaftaran');
});
Route::get('/formpendaftaran', [CalonSiswaController::class, 'create']);
Route::post('/formpendaftaran', [CalonSiswaController::class, 'store'])->name('store');


Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
