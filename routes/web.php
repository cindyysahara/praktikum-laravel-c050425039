<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;

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

Route::get('/uji-xss', function () {
    return view('uji-xss', [
        'teks' => "<script>alert('XSS')</script>"
    ]);
});

Route::resource('mahasiswa', MahasiswaController::class);

Route::resource('matakuliah', MatakuliahController::class)
    ->only(['index', 'show', 'create', 'store']);