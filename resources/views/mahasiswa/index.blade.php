
@extends('layouts.app')

@section('judul', 'Daftar Mahasiswa')

@section('content')

    <h1>Daftar Mahasiswa</h1>

    @if (session('pesan'))
        <p style="color: green;">
            {{ session('pesan') }}
        </p>
    @endif

    <p>
        <a href="{{ route('mahasiswa.create') }}">+ Tambah Mahasiswa</a>
    </p>

    <table border="1" cellpadding="8" cellspacing="0">

        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Prodi</th>
                <th>Semester</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($mahasiswa as $mhs)

                <tr style="background-color: {{ $loop->even ? '#f2f2f2' : '#ffffff' }}">

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $mhs->nim }}</td>

                    <td>{{ $mhs->nama }}</td>
                    <td>{{ $mhs->email }}</td>
                    <td>{{ $mhs->prodi }}</td>
                    <td>{{ $mhs->semester }}</td>
                    <td>

                        @switch(true)

                            @case($mhs->semester <= 2)
                                Mahasiswa Baru
                                @break

                            @case($mhs->semester >= 7)
                                <strong>Tingkat Akhir</strong>
                                @break

                            @default
                                Mahasiswa Aktif

                        @endswitch

                    </td>

                    <td>
                        <a href="{{ route('mahasiswa.show', $mhs->id) }}">Detail</a>
                        |
                        <a href="{{ route('mahasiswa.edit', $mhs->id) }}">Edit</a>
                        |
                        <form action="{{ route('mahasiswa.destroy', $mhs->id) }}"
                              method="POST"
                              style="display: inline;"
                              onsubmit="return confirm('Yakin ingin menghapus data mahasiswa ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="8">Belum ada data mahasiswa.</td>
                </tr>

            @endforelse

        </tbody>

    </table>

@endsection
