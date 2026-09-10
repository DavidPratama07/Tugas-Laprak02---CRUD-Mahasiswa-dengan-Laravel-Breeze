<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Menampilkan seluruh data mahasiswa.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::latest('id')->paginate(10);
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Menampilkan form tambah data.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Menyimpan data baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim'             => 'required|unique:mahasiswas,nim|max:20',
            'nama_mahasiswa'  => 'required|max:100',
            'tempat_lahir'    => 'required|max:50',
            'tanggal_lahir'   => 'required|date',
            'jenis_kelamin'   => 'required|in:Laki-laki,Perempuan',
            'alamat'          => 'required',
            'program_studi'   => 'required|max:100',
            'nomor_hp'        => 'required|max:15',
            'email'           => 'required|email|unique:mahasiswas,email',
        ]);

        Mahasiswa::create($validated);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail mahasiswa (opsional).
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Menampilkan form edit data.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Menyimpan perubahan data ke database.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validated = $request->validate([
            'nim'             => 'required|max:20|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama_mahasiswa'  => 'required|max:100',
            'tempat_lahir'    => 'required|max:50',
            'tanggal_lahir'   => 'required|date',
            'jenis_kelamin'   => 'required|in:Laki-laki,Perempuan',
            'alamat'          => 'required',
            'program_studi'   => 'required|max:100',
            'nomor_hp'        => 'required|max:15',
            'email'           => 'required|email|unique:mahasiswas,email,' . $mahasiswa->id,
        ]);

        $mahasiswa->update($validated);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Menghapus data mahasiswa.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}