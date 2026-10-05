@extends('layouts.app')

@section('judul', 'Daftar Mata Kuliah')

@section('konten')

    <h1>Daftar Mata Kuliah</h1>

    <table border="1" cellpadding="8" cellspacing="0">

        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($matakuliah as $mk)

                <tr style="background-color: {{ $loop->even ? '#f2f2f2' : '#ffffff' }}">

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $mk->kode }}</td>

                    <td>
                        {{ $mk->nama }}

                        @if ($loop->first)
                            <strong>(Data Pertama)</strong>
                        @endif
                    </td>

                    <td>{{ $mk->sks }}</td>

                    <td>
                        @if ($mk->sks > 3)
                            <strong>SKS Besar</strong>
                        @else
                            SKS Normal
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('matakuliah.show', $mk->id) }}">
                            Detail
                        </a>
                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="6">
                        Belum ada data mata kuliah.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

@endsection