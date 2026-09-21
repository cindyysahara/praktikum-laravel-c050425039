<?php

use App\Models\Mahasiswa;
use App\Http\Controllers\MatakuliahController;

Route::get('/mahasiswa', function () {
    $data = Mahasiswa::all();

    return view('mahasiswa.index', compact('data'));
});
Route::get('/matakuliah/create', [MatakuliahController::class, 'create']);
Route::post('/matakuliah', [MatakuliahController::class, 'store']);