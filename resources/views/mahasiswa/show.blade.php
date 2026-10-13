
@extends('layouts.app')

@section('judul', 'Detail Mahasiswa - ' . $mahasiswa->nama)

@section('content')

    <h1>Detail Mahasiswa</h1>

    <p><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
    <p><strong>Nama:</strong> {{ $mahasiswa->nama }}</p>
    <p><strong>Email:</strong> {{ $mahasiswa->email }}</p>
    <p><strong>Program Studi:</strong> {{ $mahasiswa->prodi }}</p>
    <p><strong>Semester:</strong> {{ $mahasiswa->semester }}</p>

    <hr>

    <h2>Daftar Nilai Mata Kuliah</h2>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
                <th>Nilai</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($mahasiswa->nilai as $n)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $n->matakuliah->kode_mk ?? '-' }}</td>
                    <td>{{ $n->matakuliah->nama_mk ?? '-' }}</td>
                    <td>{{ $n->nilai ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada data nilai mahasiswa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <p>
        <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}">Edit Mahasiswa</a>
        |
        <a href="{{ route('mahasiswa.index') }}">Kembali ke Daftar</a>
    </p>

@endsection
