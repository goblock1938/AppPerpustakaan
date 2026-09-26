@extends('layouts.app')

@section('title', 'Daftar Anggota')

@section('content')
    <h1>Daftar Anggota</h1>

    @if (session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <p><a href="{{ route('members.create') }}" class="btn">+ Tambah Anggota</a></p>

    <!-- Form Search Nama Anggota -->
    <form action="{{ route('members.index') }}" method="GET" class="search-form">
        <input type="text" name="search" class="search-input" placeholder="Cari berdasarkan nama..."
            value="{{ request('search') }}">
        <button type="submit" class="btn">Cari</button>
        @if (request('search'))
            <a href="{{ route('members.index') }}" class="btn btn-secondary">Reset</a>
        @endif
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($members as $member)
                <tr>
                    <td>{{ $member['id'] }}</td>
                    <td>{{ $member['nim'] }}</td>
                    <td>{{ $member['nama'] }}</td>
                    <td>{{ $member['email'] }}</td>
                    <td>{{ $member['nomor_telepon'] }}</td>
                    <td>{{ ucfirst($member['status']) }}</td>
                    <td class="actions">
                        <a href="{{ route('members.show', $member['id']) }}" class="btn btn-secondary">Detail</a>
                        <a href="{{ route('members.edit', $member['id']) }}" class="btn">Edit</a>
                        <form action="{{ route('members.destroy', $member['id']) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">Data anggota tidak ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 16px;">
        {{ $members->appends(request()->query())->links() }}
    </div>
@endsection
