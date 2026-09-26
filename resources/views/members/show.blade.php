@extends('layouts.app')

@section('title', 'Detail Anggota')

@section('content')
    <h1>Detail Anggota</h1>

    <table>
        <tr>
            <th>ID</th>
            <td>{{ $member['id'] }}</td>
        </tr>
        <tr>
            <th>NIM</th>
            <td>{{ $member['nim'] }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $member['nama'] }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $member['email'] }}</td>
        </tr>
        <tr>
            <th>Nomor Telepon</th>
            <td>{{ $member['nomor_telepon'] }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $member['alamat'] }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ ucfirst($member['status']) }}</td>
        </tr>
        <tr>
            <th>Dibuat Pada</th>
            <td>{{ $member['created_at'] }}</td>
        </tr>
        <tr>
            <th>Diperbarui Pada</th>
            <td>{{ $member['updated_at'] }}</td>
        </tr>
    </table>

    <a href="{{ route('members.index') }}" class="btn">&larr; Kembali ke daftar anggota</a>
@endsection
