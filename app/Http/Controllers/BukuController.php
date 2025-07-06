<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');
    $sort = $request->input('sort');

    $bukus = Buku::when($search, function ($query, $search) {
            return $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('penulis', 'like', '%' . $search . '%')
                  ->orWhere('tahun_terbit', 'like', '%' . $search . '%');
            });
        })
        ->when(in_array($sort, ['asc', 'desc']), function ($query) use ($sort) {
            return $query->orderBy('judul', $sort);
        }, function ($query) {
            return $query->orderBy('id', 'desc');
        })
        ->paginate(10) // PAGINATION supaya semua data bisa dibuka per halaman
        ->appends($request->query());

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

        return redirect()->route('admin.bukus.index')->with('success', 'Buku berhasil ditambahkan.');
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

    return redirect()->route('admin.bukus.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy($id)
    {
    $buku = Buku::findOrFail($id);
    $buku->delete();

    return redirect()->route('admin.bukus.index')->with('success', 'Buku berhasil dihapus.');
    }
}
