<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilderDemoController extends Controller
{
    // Menampilkan seluruh data mahasiswa dengan pagination
    public function index()
    {
        $data = DB::table('mahasiswas')
            ->orderBy('nama', 'asc')
            ->paginate(10);

        return view('demo.query-builder', compact('data'));
    }

    // Menampilkan mahasiswa semester 3 ke atas
    public function tampilkanFilter()
    {
        $data = DB::table('mahasiswas')
            ->where('semester', '>=', 3)
            ->orderBy('nama', 'asc')
            ->get();

        return view('demo.query-builder', compact('data'));
    }

    // Menampilkan rekap jumlah mahasiswa per prodi
    public function statistikProdi()
    {
        $rekap = DB::table('mahasiswas')
            ->select('prodi', DB::raw('count(*) as jumlah'))
            ->groupBy('prodi')
            ->get();

        return view('demo.statistik-prodi', compact('rekap'));
    }

    // Menampilkan form tambah mahasiswa
    public function create()
    {
        return view('demo.create');
    }

    // Menyimpan mahasiswa baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama' => 'required',
            'email' => 'nullable|email',
            'prodi' => 'required',
            'semester' => 'required|integer|min:1',
        ]);

        DB::table('mahasiswas')->insert([
            'nim' => $validated['nim'],
            'nama' => $validated['nama'],
            'email' => $validated['email'] ?? null,
            'prodi' => $validated['prodi'],
            'semester' => $validated['semester'],
        ]);

        return redirect()
            ->route('demo.index')
            ->with('pesan', 'Data mahasiswa berhasil ditambahkan.');
    }

    // Mengubah semester mahasiswa berdasarkan NIM
    public function update(Request $request, string $nim)
    {
        $validated = $request->validate([
            'semester' => 'required|integer|min:1',
        ]);

        DB::table('mahasiswas')
            ->where('nim', $nim)
            ->update(['semester' => $validated['semester']]);

        return redirect()
            ->route('demo.index')
            ->with('pesan', 'Data mahasiswa berhasil diperbarui.');
    }

    // Menghapus mahasiswa berdasarkan NIM
    public function destroy(string $nim)
    {
        DB::table('mahasiswas')
            ->where('nim', $nim)
            ->delete();

        return redirect()
            ->route('demo.index')
            ->with('pesan', 'Data mahasiswa berhasil dihapus.');
    }

    // Menampilkan mahasiswa TI semester 3 sampai 6
    public function tugasFilter()
    {
        $data = DB::table('mahasiswas')
            ->where('prodi', 'Teknik Informatika')
            ->whereBetween('semester', [3, 6])
            ->orderBy('nama', 'asc')
            ->get();

        return view('demo.query-builder', compact('data'));
    }
}
