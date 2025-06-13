<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $bukus = Buku::query()
            ->when($search, function ($query, $search) {
                $query->where('judul', 'like', '%' . $search . '%')
                      ->orWhere('penulis', 'like', '%' . $search . '%');
            })
            ->get();

        return view('bukus.index', compact('bukus'));
    }

    public function create()
    {
        return view('bukus.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'kategori' => 'required|string|max:255',
        ]);

        Buku::create($validatedData);

        return redirect()->route('bukus.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit(Buku $buku)
    {
    return view('bukus.edit', compact('buku'));
    }

    public function update(Request $request, Buku $buku)
{
    $validatedData = $request->validate([
        'judul' => 'required|string|max:255',
        'penulis' => 'required|string|max:255',
        'penerbit' => 'required|string|max:255',
        'tahun_terbit' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
        'kategori' => 'required|string|max:255',
    ]);

    $buku->update($validatedData);

    return redirect()->route('bukus.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy($id)
    {
    $buku = Buku::findOrFail($id);
    $buku->delete();

    return redirect()->route('bukus.index')->with('success', 'Buku berhasil dihapus.');
    }
}
