@extends('layouts.app')

@section('judul', 'Detail Mata Kuliah - ' . $matakuliah->nama)

@section('konten')

    <h1>Detail Mata Kuliah</h1>

    <p>
        <strong>Kode:</strong>
        {{ $matakuliah->kode }}
    </p>

    <p>
        <strong>Nama Mata Kuliah:</strong>
        {{ $matakuliah->nama }}
    </p>

    <p>
        <strong>SKS:</strong>
        {{ $matakuliah->sks }}
    </p>

    <a href="{{ route('matakuliah.index') }}">
        &laquo; Kembali
    </a>

@endsection