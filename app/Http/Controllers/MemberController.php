<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{

    public function dashboard()
    {
    return view('members.dashboard');
    }
    // Menampilkan daftar semua member
    public function index(Request $request)
    {
        $search = $request->input('search');

    $members = Member::when($search, function ($query, $search) {
        return $query->where('nama', 'like', "%{$search}%")
                     ->orWhere('email', 'like', "%{$search}%");
    })->get();

    return view('members.index', compact('members'));
    }

    // Menampilkan form untuk menambah member baru
    public function create()
    {
        return view('members.create');
    }

    // Menyimpan data member baru ke database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nomer_telepon' => 'required|string|max:20',
            'email' => 'required|email|unique:members,email',
            'password' => 'required|string|min:6',
        ]);

        Member::create([
            'nama' => $validatedData['nama'],
            'alamat' => $validatedData['alamat'],
            'nomer_telepon' => $validatedData['nomer_telepon'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect()->route('admin.members.index')->with('success', 'Member berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('members.edit', compact('member'));
    }

    // Menyimpan perubahan data member
    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nomer_telepon' => 'required|string|max:20',
            'email' => 'required|email|unique:members,email,' . $member->id,
            'password' => 'nullable|string|min:6',
        ]);

        $member->nama = $validatedData['nama'];
        $member->alamat = $validatedData['alamat'];
        $member->nomer_telepon = $validatedData['nomer_telepon'];
        $member->email = $validatedData['email'];

        // Jika password tidak kosong, update password
        if (!empty($validatedData['password'])) {
            $member->password = Hash::make($validatedData['password']);
        }

        $member->save();

        return redirect()->route('admin.members.index')->with('success', 'Member berhasil diperbarui.');
    }

    // Menghapus data member
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('admin.members.index')->with('success', 'Member berhasil dihapus.');
    }
}
