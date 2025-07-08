<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Pastikan path ini benar

class BukuController extends Controller
{
    /**
     * Menampilkan daftar semua buku.
     */
    public function index(Request $request)
    {
        $query = Buku::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('judul', 'like', "%{$search}%")
                ->orWhere('penulis', 'like', "%{$search}%");
        }

        $bukus = $query->orderBy('id', 'desc')->paginate(10)->withQueryString();

        return view('bukus.index', compact('bukus'));
    }

    /**
     * Menampilkan form untuk membuat buku baru.
     */
    public function create()
    {
        return view('bukus.create');
    }

    /**
     * Menyimpan buku baru ke database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4|integer',
            'kategori' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('images', 'public');
        }

        Buku::create($validatedData);

        return redirect()->route('admin.bukus.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit buku.
     */
    public function edit(Buku $buku)
    {
        return view('bukus.edit', compact('buku'));
    }

    /**
     * Memperbarui data buku di database.
     */
    public function update(Request $request, Buku $buku)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4|integer',
            'kategori' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Cek jika ada file gambar baru yang diunggah
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari storage jika ada
            if ($buku->gambar) {
                Storage::disk('public')->delete($buku->gambar);
            }
            // Simpan gambar baru dan masukkan path-nya ke data yang akan di-update
            $validatedData['gambar'] = $request->file('gambar')->store('images', 'public');
        }

        // Update data buku di database
        $buku->update($validatedData);

        return redirect()->route('admin.bukus.index')->with('success', 'Buku berhasil diperbarui.');
    }

    /**
     * Menghapus buku dari database.
     */
    public function destroy(Buku $buku)
    {
        // Hapus gambar dari storage jika ada
        if ($buku->gambar) {
            Storage::disk('public')->delete($buku->gambar);
        }

        $buku->delete();

        return redirect()->route('admin.bukus.index')->with('success', 'Buku berhasil dihapus.');
    }
}
