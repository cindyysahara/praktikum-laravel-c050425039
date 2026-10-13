<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\SapaController;
use App\Http\Controllers\StatistikMahasiswaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HitungTotalSksController;
use App\Http\Controllers\Laporan\RekapController;
use App\Http\Controllers\QueryBuilderDemoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halo', function () {
    return 'Halo, ini adalah route pertama saya!';
});

Route::get('/sapa', function () {
    return view('sapa', [
        'nama' => 'Ahmad Fauzi',
        'kontenHtml' => '<strong>Teks Tebal</strong>',
    ]);
});
Route::get('/sapa-closure', function () {
    $nama = 'Ahmad Fauzi';
    $pesan = "Halo, {$nama}! Ini ditulis langsung di route.";

    return $pesan;
});

Route::get('/uji-xss', function () {
    return view('uji-xss', [
        'teks' => "<script>alert('XSS')</script>"
    ]);
});

Route::resource('mahasiswa', MahasiswaController::class);

Route::resource('matakuliah', MatakuliahController::class);

Route::get('/sapa-controller', [SapaController::class, 'index']);

use App\Http\Controllers\LatihanController;

Route::get('/latihan', [LatihanController::class, 'index']);

Route::get('/mahasiswa-api', [MahasiswaController::class, 'apiIndex']);

Route::get('/cari-mahasiswa', [MahasiswaController::class, 'cariMahasiswa']);

Route::get('/mahasiswa-uji', function () {
    return view('mahasiswa.form-uji');
});

Route::post('/mahasiswa-uji', [MahasiswaController::class, 'store']);
Route::get('/statistik', StatistikMahasiswaController::class);
Route::get('/admin/dashboard', [DashboardController::class, 'index']);
Route::get('/total-sks', HitungTotalSksController::class);
Route::get('/laporan/rekap', [RekapController::class, 'index']);

Route::prefix('demo')->name('demo.')->controller(QueryBuilderDemoController::class)->group(function () {
    Route::get('/mahasiswa', 'index')->name('index');
    Route::get('/filter', 'tampilkanFilter')->name('filter');
    Route::get('/statistik', 'statistikProdi')->name('statistik');
    Route::get('/tugas-filter', 'tugasFilter')->name('tugas-filter');
    Route::get('/create', 'create')->name('create');
    Route::post('/mahasiswa', 'store')->name('store');
    Route::put('/mahasiswa/{nim}', 'update')->name('update');
    Route::delete('/mahasiswa/{nim}', 'destroy')->name('destroy');
});

Route::get('/demo/tugas-filter', [
    QueryBuilderDemoController::class,
    'tugasFilter'
])->name('demo.tugas-filter');