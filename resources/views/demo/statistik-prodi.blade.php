
@extends('layouts.app')

@section('judul', 'Statistik Mahasiswa')

@section('konten')
    <h1>Rekap Mahasiswa per Program Studi</h1>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Program Studi</th>
                <th>Jumlah Mahasiswa</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rekap as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->prodi }}</td>
                    <td>{{ $item->jumlah }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Belum ada data mahasiswa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <p><a href="{{ route('demo.index') }}">Kembali ke daftar mahasiswa</a></p>
@endsection
