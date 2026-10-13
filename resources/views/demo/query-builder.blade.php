
@extends('layouts.app')

@section('judul', 'Data Mahasiswa - Query Builder')

@section('konten')
    <h1>Data Mahasiswa</h1>

    @if (session('pesan'))
        <p>{{ session('pesan') }}</p>
    @endif

    <p>
        <a href="{{ route('demo.create') }}">Tambah Mahasiswa</a> |
        <a href="{{ route('demo.statistik') }}">Statistik Prodi</a> |
        <a href="{{ route('demo.filter') }}">Filter Semester 3 ke Atas</a> |
        <a href="{{ route('demo.tugas-filter') }}">Tugas Filter TI</a>
    </p>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Prodi</th>
                <th>Semester</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $mhs)
                <tr>
                    <td>{{ $mhs->nim }}</td>
                    <td>{{ $mhs->nama }}</td>
                    <td>{{ $mhs->email ?? '-' }}</td>
                    <td>{{ $mhs->prodi }}</td>
                    <td>{{ $mhs->semester }}</td>
                    <td>
                        <form action="{{ route('demo.update', $mhs->nim) }}"
                              method="POST">
                            @csrf
                            @method('PUT')

                            <input type="number" name="semester"
                                   min="1" value="{{ $mhs->semester }}" required>

                            <button type="submit">Ubah Semester</button>
                        </form>

                        <form action="{{ route('demo.destroy', $mhs->nim) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada data mahasiswa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    ```blade
@if ($data instanceof \Illuminate\Pagination\AbstractPaginator)
    <div>
        {{ $data->links() }}
    </div>
@endif
```
@endsection
