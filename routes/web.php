<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CalonSiswaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PembayaranSppController;
use App\Http\Controllers\SiswaController;
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

Route::get('/pembayaranspp', [PembayaranSppController::class, 'index'])->middleware('checkRole:siswa,admin,sadmin');
Route::get('/spplunas', [PembayaranSppController::class, 'sppLunas'])->middleware('checkRole:siswa,admin,sadmin');
Route::post('/uploadbuktipembayaranspp', [PembayaranSppController::class, 'uploadBuktiPembayaranSpp'])->name('uploadBuktiPembayaranSpp')->middleware('checkRole:siswa');


Route::get('/calonSiswa/{calonSiswa}/detail', [HomeController::class, 'detail'])->name('detail')->middleware('checkRole:admin,sadmin');
Route::get('/calonSiswa/{path}/showkk', [HomeController::class, 'showKk'])->name('showKk')->middleware('checkRole:admin,sadmin');
Route::get('/calonSiswa/{path}/showijasah', [HomeController::class, 'showIjasah'])->name('showIjasah')->middleware('checkRole:admin,sadmin');
Route::get('/calonSiswa/{path}/showbuktipembayaran', [HomeController::class, 'showBuktiPembayaran'])->name('showBuktiPembayaran')->middleware('checkRole:admin,sadmin');
Route::get('/buktipembayaran/{path}/showbuktipembayaran', [PembayaranSppController::class, 'showBuktiPembayaran'])->name('showBuktiPembayaranSpp')->middleware('checkRole:admin,sadmin');
Route::post('/updateStatus', [HomeController::class, 'updateStatus'])->name('updateStatus')->middleware('checkRole:admin,sadmin');
Route::get('/allcalonsiswa', [HomeController::class, 'index'])->name('allCalonSiswa')->middleware('checkRole:admin,sadmin');
Route::get('/allsiswa', [SiswaController::class, 'index'])->name('index')->middleware('checkRole:admin,sadmin');
Route::get('/tambahsiswa', function () {
    return view('admin.tambahSiswa');
})->middleware('checkRole:admin,sadmin');
Route::post('/tambahSiswa', [SiswaController::class, 'tambahSiswa'])->name('tambahSiswa')->middleware('checkRole:admin,sadmin');
Route::post('/tambahemailsiswa', [SiswaController::class, 'tambahEmailSiswa'])->name('tambahEmailSiswa')->middleware('checkRole:admin,sadmin');
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('checkRole:admin,sadmin');
Route::get('/konfirmasipembayaran', [PembayaranSppController::class, 'konfirmasiPembayaran'])->name('konfirmasiPembayaranSpp')->middleware('checkRole:admin,sadmin');
Route::get('/pembayaran/{calonSiswa}/konfirmasi', [PembayaranSppController::class, 'konfirmasi'])->name('konfirmasiGet')->middleware('checkRole:admin,sadmin');
Route::post('/konfirmasi', [PembayaranSppController::class, 'konfirmasiPost'])->name('konfirmasi')->middleware('checkRole:admin,sadmin');
Route::post('/ubahstatus', [PembayaranSppController::class, 'ubahStatus'])->name('ubasStatusPembayaranSpp')->middleware('checkRole:admin,sadmin');
Route::post('/hapusbuktipembayaran', [PembayaranSppController::class, 'hapus'])->name('hapusBuktiPembayaran')->middleware('checkRole:admin,sadmin');


Route::get('/alluser', [UserController::class, 'index'])->name('allUser')->middleware('checkRole:sadmin,admin');
Route::post('/updaterole', [UserController::class, 'updateRole'])->name('updateRole')->middleware('checkRole:sadmin');
Route::get('/registeruser', function () {
    return view('admin.register');
})->middleware('checkRole:sadmin,admin');
Route::post('/registeruser', [UserController::class, 'registerUser'])->name('registerUser')->middleware('checkRole:sadmin,admin');
