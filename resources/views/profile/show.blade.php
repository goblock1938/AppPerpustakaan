@extends('layouts.app')

@section('title', 'Profil')

@section('content')
    <h1>Profil Petugas</h1>

    <p><strong>Nama:</strong> {{ auth()->user()->name }}</p>
    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
    <p><strong>Role:</strong> {{ auth()->user()->role }}</p>

    <h2>Ganti Password</h2>
    <form action="{{ route('profile.password.update') }}" method="POST">
        @csrf
        @method('PUT')

        <label for="current_password">Password lama</label>
        <input type="password" name="current_password" id="current_password" required>
        @error('current_password')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="password">Password baru</label>
        <input type="password" name="password" id="password" required>
        @error('password')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="password_confirmation">Konfirmasi password baru</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>

        <button type="submit" class="btn">Simpan Password</button>
    </form>
@endsection
