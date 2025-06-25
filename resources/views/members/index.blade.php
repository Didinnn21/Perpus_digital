@extends('layouts.main')



@section('main-banner')
<div class="container">
    <div class="row">
        <div class="col-lg-6 align-self-center">
            <div class="caption header-text">
                <h6>Welcome In</h6>
                <h2>LIBRARY!</h2>
                <p>Daftar Member</p>

                {{-- Search Form --}}
                <div class="search-input">
                    <form id="search" action="{{ route('admin.members.index') }}" method="GET">
                        <input type="text" placeholder="Cari nama atau email" id="searchText" name="search" value="{{ request('search') }}" />
                        <button type="submit">Search Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('features')
{{-- Tombol Tambah Member --}}


{{-- Daftar Member --}}
<div class="container bg-white p-4 rounded shadow-sm">
    <h3 class="mb-3 text-dark">Daftar Member</h3>

    @if(request('search'))
        <p class="text-muted">Hasil pencarian untuk: <strong>{{ request('search') }}</strong></p>
    @endif

    @if($members->count())
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($members as $index => $member)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $member->id }}</td>
                            <td>{{ $member->nama }}</td>
                            <td>{{ $member->alamat }}</td>
                            <td>{{ $member->nomer_telepon }}</td>
                            <td>{{ $member->email }}</td>
                            <td>
                                <a href="{{ route('admin.members.edit', $member->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.members.destroy', $member->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus member ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">
            @if(request('search'))
                Tidak ada hasil yang ditemukan untuk pencarian "<strong>{{ request('search') }}</strong>".
            @else
                Tidak ada member yang tersedia.
            @endif
        </div>
    @endif
</div>
<div class="container mt-4 mb-2">
    <a href="{{ route('admin.members.create') }}"
       class="btn"
       style="background-color: blue; color: white; border: 2px solid green;">
        + Tambah Member
    </a>
</div>
@endsection
