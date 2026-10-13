
@extends('layouts.app')

@section('judul', 'Tambah Mahasiswa')

@section('konten')
    <h1>Tambah Mahasiswa</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('demo.store') }}" method="POST">
        @csrf

        <p>
            <label>NIM</label><br>
            <input type="text" name="nim" value="{{ old('nim') }}" required>
        </p>

        <p>
            <label>Nama</label><br>
            <input type="text" name="nama" value="{{ old('nama') }}" required>
        </p>

        <p>
            <label>Email</label><br>
            <input type="email" name="email" value="{{ old('email') }}">
        </p>

        <p>
            <label>Program Studi</label><br>
            <input type="text" name="prodi" value="{{ old('prodi') }}" required>
        </p>

        <p>
            <label>Semester</label><br>
            <input type="number" name="semester"
                   min="1" value="{{ old('semester', 1) }}" required>
        </p>

        <button type="submit">Simpan</button>
        <a href="{{ route('demo.index') }}">Batal</a>
    </form>
@endsection

@extends('layouts.app')

@section('content')
    <h2>Tambah Mata Kuliah</h2>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('matakuliah.store') }}" method="POST">
        @csrf

        <div>
            <label>Kode Mata Kuliah</label>
            <input type="text" name="kode_mk" value="{{ old('kode_mk') }}" required>
        </div>

        <div>
            <label>Nama Mata Kuliah</label>
            <input type="text" name="nama_mk" value="{{ old('nama_mk') }}" required>
        </div>

        <div>
            <label>SKS</label>
            <input type="number" name="sks" value="{{ old('sks') }}" required>
        </div>

        <div>
            <label>Semester</label>
            <input type="number" name="semester" value="{{ old('semester') }}" required>
        </div>

        <div>
            <label>ID Dosen (opsional)</label>
            <input type="number" name="dosen_id" value="{{ old('dosen_id') }}">
        </div>

        <button type="submit">Simpan</button>
        <a href="{{ route('matakuliah.index') }}">Kembali</a>
    </form>
@endsection