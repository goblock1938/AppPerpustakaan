<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    private array $members = [
        [
            'id' => 1,
            'nama' => 'Ahmad Dahlan',
            'nim' => '220101001',
            'email' => 'ahmad@example.com',
            'nomor_telepon' => '081234567890',
            'alamat' => 'Jl. Pemuda No. 10',
            'status' => 'aktif',
        ],
        [
            'id' => 2,
            'nama' => 'Siti Nurhaliza',
            'nim' => '220101002',
            'email' => 'siti@example.com',
            'nomor_telepon' => '082345678901',
            'alamat' => 'Jl. Merdeka No. 45',
            'status' => 'aktif',
        ],
        [
            'id' => 3,
            'nama' => 'Budi Santoso',
            'nim' => '220101003',
            'email' => 'budi@example.com',
            'nomor_telepon' => '083456789012',
            'alamat' => 'Jl. Sudirman No. 88',
            'status' => 'nonaktif',
        ],
    ];

    public function index()
    {
        $members = $this->members;

        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(StoreMemberRequest $request)
    {
        $validated = $request->validated();

        return redirect()
            ->route('members.index')
            ->with('success', "Anggota \"{$validated['nama']}\" berhasil ditambahkan (data dummy, belum tersimpan ke database).");
    }

    public function show(int $id)
    {
        $member = collect($this->members)->firstWhere('id', $id);

        abort_if(!$member, 404);

        return view('members.show', compact('member'));
    }

    public function edit(int $id)
    {
        $member = collect($this->members)->firstWhere('id', $id);

        abort_if(!$member, 404);

        return view('members.edit', compact('member'));
    }

    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'nim' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'nomor_telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        return redirect()
            ->route('members.index')
            ->with('success', "Anggota \"{$validated['nama']}\" berhasil diperbarui (data dummy, belum tersimpan ke database).");
    }

    public function destroy(int $id)
    {
        return redirect()
            ->route('members.index')
            ->with('success', "Anggota dengan id {$id} berhasil dihapus (data dummy, belum tersimpan ke database).");
    }
}
