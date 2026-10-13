<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliah = Matakuliah::all();

        return view('matakuliah.index', compact('matakuliah'));
    }

    public function create()
    {
        return view('matakuliah.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_mk' => 'required|unique:matakuliahs,kode_mk',
            'nama_mk' => 'required',
            'sks' => 'required|integer',
            'semester' => 'required|integer',
            'dosen_id' => 'nullable|exists:users,id',
        ]);

        Matakuliah::create($validated);

        return redirect()->route('matakuliah.index')
            ->with('pesan', 'Data mata kuliah berhasil ditambahkan.');
    }

    public function show(Matakuliah $matakuliah)
    {
        $matakuliah->load('nilai.mahasiswa');

        return view('matakuliah.show', compact('matakuliah'));
    }

    public function edit(Matakuliah $matakuliah)
    {
        return view('matakuliah.edit', compact('matakuliah'));
    }

    public function update(Request $request, Matakuliah $matakuliah)
    {
        $validated = $request->validate([
            'kode_mk' => [
                'required',
                Rule::unique('matakuliahs', 'kode_mk')->ignore($matakuliah->id),
            ],
            'nama_mk' => 'required',
            'sks' => 'required|integer',
            'semester' => 'required|integer',
            'dosen_id' => 'nullable|exists:users,id',
        ]);

        $matakuliah->update($validated);

        return redirect()->route('matakuliah.index')
            ->with('pesan', 'Data mata kuliah berhasil diperbarui.');
    }

    public function destroy(Matakuliah $matakuliah)
    {
        $matakuliah->delete();

        return redirect()->route('matakuliah.index')
            ->with('pesan', 'Data mata kuliah berhasil dihapus.');
    }
}