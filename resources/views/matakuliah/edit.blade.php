@extends('layouts.app')

@section('content')
    <h2>Edit Mata Kuliah</h2>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('matakuliah.update', $matakuliah->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Kode Mata Kuliah</label>
            <input type="text" name="kode_mk" value="{{ old('kode_mk', $matakuliah->kode_mk) }}" required>
        </div>

        <div>
            <label>Nama Mata Kuliah</label>
            <input type="text" name="nama_mk" value="{{ old('nama_mk', $matakuliah->nama_mk) }}" required>
        </div>

        <div>
            <label>SKS</label>
            <input type="number" name="sks" value="{{ old('sks', $matakuliah->sks) }}" required>
        </div>

        <div>
            <label>Semester</label>
            <input type="number" name="semester" value="{{ old('semester', $matakuliah->semester) }}" required>
        </div>

        <div>
            <label>ID Dosen (opsional)</label>
            <input type="number" name="dosen_id" value="{{ old('dosen_id', $matakuliah->dosen_id) }}">
        </div>

        <button type="submit">Perbarui</button>
        <a href="{{ route('matakuliah.index') }}">Kembali</a>
    </form>
@endsection