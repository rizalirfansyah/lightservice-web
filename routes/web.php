<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\WhatsappController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DetailServisController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

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
    return view('landing.check-status');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware('is_admin');
    // Route::get('/pendapatan/{date?}', [TransaksiController::class, 'pendapatan'])->name('home.report')->middleware('is_admin');
    Route::get('/pembayaran', [TransaksiController::class, 'index_pembayaran'])->name('home.pembayaran')->middleware('is_admin');
    Route::get('/komentar', [RepairController::class, 'showComment'])->name('home.komentar')->middleware('is_admin');

    Route::resource('pelanggan', PelangganController::class);
    Route::get('/redirect-whatsapp/{phoneNumber}', [PelangganController::class, 'redirectToWhatsapp'])->name('redirect.whatsapp');
    Route::resource('repairs', RepairController::class);
    Route::resource('users', UserController::class)->middleware('is_admin');
    Route::resource('transaksi', TransaksiController::class);
    Route::resource('detail-servis', DetailServisController::class);
    Route::delete('/detail-servis/{id}', [DetailServisController::class, 'destroy'])->name('detail-servis.destroy');
    Route::get('/cetak-nota/{transaksi}', [TransaksiController::class, 'cetaktagihan'])->name('cetaknota.pdf');
    Route::get('/cetak-bukti/{repair}', [RepairController::class, 'cetakbukti'])->name('cetakbukti');
    Route::get('/cetak-pendapatan', [TransaksiController::class, 'cetakpendapatan'])->name('cetakpendapatan');
    Route::get('/cetak-pembayaran', [TransaksiController::class, 'pdfpembayaran'])->name('pdfpembayaran');
    // Route::get('/cetak-pdf/{id}', [TransaksiController::class, 'cetaktagihan'])->name('cetak.pdf');

    // membatasi register jetstream agar
    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->middleware(['is_admin'])
        ->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->middleware(['is_admin']);
});

// Route::get('send/email', function(){
  
// 	$send_mail = 'mhdbahagya@gmail.com';
  
//     dispatch(new App\Jobs\SendEmailQueueJob($send_mail));
  
//     dd('send mail successfully !!');
// });

Route::post('/status', [RepairController::class, 'addComment'])->name('comment-status');
Route::get('/contact.us', [HomeController::class, 'view_contactus'])->name('contact.us');
Route::get('/check-status', [RepairController::class, 'getStatus'])->name('check.status');