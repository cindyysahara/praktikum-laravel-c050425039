
@extends('layouts.app')

@section('judul', 'Edit Mahasiswa')

@section('konten')

    <h1>Edit Mahasiswa</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label>NIM</label><br>
            <input type="text" name="nim"
                   value="{{ old('nim', $mahasiswa->nim) }}" required>
        </p>

        <p>
            <label>Nama</label><br>
            <input type="text" name="nama"
                   value="{{ old('nama', $mahasiswa->nama) }}" required>
        </p>

        <p>
            <label>Email</label><br>
            <input type="email" name="email"
                   value="{{ old('email', $mahasiswa->email) }}" required>
        </p>

        <p>
            <label>Program Studi</label><br>
            <input type="text" name="prodi"
                   value="{{ old('prodi', $mahasiswa->prodi) }}" required>
        </p>

        <p>
            <label>Semester</label><br>
            <input type="number" name="semester" min="1" max="14"
                   value="{{ old('semester', $mahasiswa->semester) }}" required>
        </p>

        <button type="submit">Simpan Perubahan</button>
        <a href="{{ route('mahasiswa.index') }}">Batal</a>
    </form>

@endsection
