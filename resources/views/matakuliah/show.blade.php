@extends('layouts.app')

@section('content')
    <h2>Detail Mata Kuliah</h2>

    <p>Kode: {{ $matakuliah->kode_mk }}</p>
    <p>Nama: {{ $matakuliah->nama_mk }}</p>
    <p>SKS: {{ $matakuliah->sks }}</p>
    <p>Semester: {{ $matakuliah->semester }}</p>

    <h3>Daftar Mahasiswa yang Mengambil Mata Kuliah Ini</h3>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($matakuliah->nilai as $item)
                <tr>
                    <td>{{ $item->mahasiswa->nim ?? '-' }}</td>
                    <td>{{ $item->mahasiswa->nama ?? '-' }}</td>
                    <td>{{ $item->nilai ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Belum ada mahasiswa yang mengambil mata kuliah ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('matakuliah.index') }}">Kembali ke daftar</a>
@endsection