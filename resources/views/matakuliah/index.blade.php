
@extends('layouts.app')

@section('judul', 'Daftar Mata Kuliah')

@section('content')
    <h2>Daftar Mata Kuliah</h2>

    @if (session('pesan'))
        <p>{{ session('pesan') }}</p>
    @endif

    <p>
        <a href="{{ route('matakuliah.create') }}">Tambah Mata Kuliah</a>
    </p>

    <table border="1" cellpadding="8" cellspacing="0">
        
        <thead>
            <tr>
                
                <th>Kode</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($matakuliah as $mk)
                <tr>
                    <td>{{ $mk->kode_mk }}</td>
                    <td>{{ $mk->nama_mk }}</td>
                    <td>{{ $mk->sks }}</td>
                    <td>{{ $mk->semester }}</td>
                    <td>
                        <a href="{{ route('matakuliah.show', $mk->id) }}">Detail</a> |
                        <a href="{{ route('matakuliah.edit', $mk->id) }}">Edit</a>

                        <form action="{{ route('matakuliah.destroy', $mk->id) }}"
                              method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="5">Belum ada data mata kuliah.</td>
                </tr>

            @endforelse
            
        </tbody>

    </table>

@endsection
