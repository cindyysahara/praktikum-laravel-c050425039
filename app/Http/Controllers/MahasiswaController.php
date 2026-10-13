<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();

        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:mahasiswas,email',
            'prodi' => 'required|string',
            'semester' => 'required|integer|min:1|max:14',
        ]);

        Mahasiswa::create($validated);

        return redirect()->route('mahasiswa.index')
            ->with('pesan', 'Data mahasiswa berhasil ditambahkan.');
    }

    public function show(Mahasiswa $mahasiswa)
    {
        $mahasiswa->load('nilai.matakuliah');

        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validated = $request->validate([
            'nim' => [
                'required',
                Rule::unique('mahasiswas', 'nim')->ignore($mahasiswa->id),
            ],
            'nama' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('mahasiswas', 'email')->ignore($mahasiswa->id),
            ],
            'prodi' => 'required|string',
            'semester' => 'required|integer|min:1|max:14',
        ]);

        $mahasiswa->update($validated);

        return redirect()->route('mahasiswa.index')
            ->with('pesan', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('pesan', 'Data mahasiswa berhasil dihapus.');
    }

    public function apiIndex()
    {
        return response()->json([
            'status' => 'sukses',
            'pesan' => 'Ini contoh response JSON dari Controller',
        ]);
    }

    public function cariMahasiswa(Request $request)
    {
        $nama = $request->input('nama');

        return "Kata kunci yang dicari: {$nama}";
    }
}