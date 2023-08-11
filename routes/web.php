<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\ForgotPasswordController;

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

Route::get('/', [HomeController::class, 'index']);
// Auth::routes();
Route::group(['middleware' => 'user'], function() {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home.index');
    Route::get('/menu', [HomeController::class, 'menu'])->name('home.menu');
    Route::get('/jenis', [HomeController::class, 'jenis'])->name('home.jenis');
    Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
    Route::get('/status', [HomeController::class, 'status'])->name('home.status');
    Route::get('detail/{id}', [HomeController::class, 'detail']);
    Route::post('/checkout', [HomeController::class, 'store'])->name('a');
    Route::put('/konfirmasiLangganan/{id}', [HomeController::class, 'createLangganan']);
    Route::post('/kirim-masukkan/{id}', [HomeController::class, 'kirimMasukkan']);
    Route::get('/profile', [HomeController::class, 'profile']);
    Route::put('/update-profile/{id}', [HomeController::class, 'updateProfile']);
    Route::post('/check-ongkir', [PengirimanController::class, 'checkOngkir'])->name('check-ongkir');

});

// logout
Route::get('/logout', function () {
    Auth::logout();
    // return redirect('/login');
    return view('auth.login');
});

Route::get('/registerAdmin', function () {
    return view('auth.register-admin');
});



Route::group(['middleware' => 'admin'], function() {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    // Route::get('/dashboardAdmin', [AdminController::class, 'dashboard']);
    Route::get('/allmenu', [AdminController::class, 'allMenu']);
    Route::get('/editMenu/{id}', [AdminController::class, 'editMenu']);
    Route::put('/updateProses/{id}', [AdminController::class, 'editMenuProses']);
    Route::get('/tambahMenu', [AdminController::class, 'tambahMenu']);
    Route::post('/prosesTambah', [AdminController::class, 'prosesTambah']);

    Route::delete('/delete-menu/{id}', [AdminController::class, 'hapusMenu']);
    Route::get('/pesanan-user', [AdminController::class, 'pesananUser']);
    Route::put('/update-pesanan-user/{id}', [AdminController::class, 'updatePesananUser']);
    Route::get('/manage-paket', [AdminController::class, 'ManagePaket']);
    Route::get('/edit-paket/{id}', [AdminController::class, 'editPaket']);
    Route::put('/updatePaketProses/{id}', [AdminController::class, 'updatePaketProses']);
    Route::get('/data-user', [AdminController::class, 'dataUser']);
    Route::get('/feedback-user', [AdminController::class, 'feedbackUser']);
    Route::get('/delete-feedback/{id}', [AdminController::class, 'deleteFeedback']);
    Route::get('/generate-report', [PDFController::class, 'cetak_pdf']);
    Route::delete('/delete-pesanan-user/{id}', [AdminController::class, 'deletePesananUser']);
    Route::get('/get-alamat-pengiriman-byID/{id}', [AdminController::class, 'getAlamatPengirimanById']);

    Route::resource('pengiriman', PengirimanController::class);
    // catatan setiap url crud misalnya , kasi /admin
    // Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});
require __DIR__.'/auth.php';

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
//     ->middleware('guest')
//     ->name('password.email');

// Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])
//     ->middleware('guest')
//     ->name('password.reset');

// Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])
//     ->middleware('guest')
//     ->name('password.update');
// Route::get('/logout', function () {
//     return view('auth.login');
// });
