<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CalonSiswaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/cekstatuspendaftaran', function () {
    return view('cekStatusPendaftaran');
});
Route::get('/sukses', function () {
    return view('sukses');
});
Route::get('/statuspendaftaran', function () {
    return view('statusPendaftaran');
});


Route::resource('calonSiswa', CalonSiswaController::class);
Route::post('/cekstatuspendaftaran', [CalonSiswaController::class, 'searchPendaftaran'])->name('searchPendaftaran');
Route::get('/calonsiswa/{path}/buktipendaftaran', [CalonSiswaController::class, 'buktiPendaftaran'])->name('buktiPendaftaran');
Route::post('/uploadbuktipembayaran', [CalonSiswaController::class, 'uploadBuktiPembayaran'])->name('uploadBuktiPembayaran');
Route::get('/formpendaftaran', [CalonSiswaController::class, 'create']);
Route::post('/formpendaftaran', [CalonSiswaController::class, 'store'])->name('store');
Auth::routes(['register' => false]);


Route::get('/pembayaranspp', function () {
    return view('pembayaranSpp');
})->middleware('checkRole:siswa,admin,sadmin');


Route::get('/calonSiswa/{calonSiswa}/detail', [HomeController::class, 'detail'])->name('detail')->middleware('checkRole:admin,sadmin');
Route::get('/calonSiswa/{path}/showkk', [HomeController::class, 'showKk'])->name('showKk')->middleware('checkRole:admin,sadmin');
Route::get('/calonSiswa/{path}/showijasah', [HomeController::class, 'showIjasah'])->name('showIjasah')->middleware('checkRole:admin,sadmin');
Route::get('/calonSiswa/{path}/showbuktipembayaran', [HomeController::class, 'showBuktiPembayaran'])->name('showBuktiPembayaran')->middleware('checkRole:admin,sadmin');
Route::post('/updateStatus', [HomeController::class, 'updateStatus'])->name('updateStatus')->middleware('checkRole:admin,sadmin');
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware('checkRole:admin,sadmin');


Route::get('/alluser', [UserController::class, 'index'])->name('allUser')->middleware('checkRole:sadmin');
Route::post('/updaterole', [UserController::class, 'updateRole'])->name('updateRole')->middleware('checkRole:sadmin');
Route::get('/registeruser', function () {
    return view('regis');
})->middleware('checkRole:sadmin');
Route::post('/registeruser', [UserController::class, 'registerUser'])->name('registerUser')->middleware('checkRole:sadmin');
