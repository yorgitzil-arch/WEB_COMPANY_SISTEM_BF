@extends('layouts.base_sistem')

@section('title', 'Dashboard create')

@section('content')
<div style="margin-bottom: 1.5rem; display: flex; justify-content: space-between; align-items: center;">
    <h2>Daftar Admin</h2>
    <a href="{{ route('manage-admin.create') }}" style="background: #3b82f6; color: #fff; padding: 0.5rem 1rem; border-radius: 6px; text-decoration: none; font-weight: 600;">+ Tambah Admin</a>
</div>

@if(session('success'))
    <div style="background: #def7ec; color: #03543f; padding: 1rem; border-radius: 6px; margin-bottom: 1rem;">
        {{ session('success') }}
    </div>
@endif

<table style="width: 100%; border-collapse: collapse; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
    <thead>
        <tr style="background: #f3f4f6; text-align: left;">
            <th style="padding: 1rem;">Nama Admin</th>
            <th style="padding: 1rem;">Email</th>
            <th style="padding: 1rem;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($admins as $admin)
        <tr style="border-bottom: 1px solid #e5e7eb;">
            <td style="padding: 1rem;">{{ $admin->nama_lengkap }}</td>
            <td style="padding: 1rem;">{{ $admin->email }}</td>
            <td style="padding: 1rem; display: flex; gap: 0.5rem;">
                <a href="{{ route('manage-admin.edit', $admin->id_admin) }}" style="background: #eab308; color: #fff; padding: 0.25rem 0.75rem; border-radius: 4px; text-decoration: none; font-size: 0.875rem;">Edit</a>
                
                <form action="{{ route('manage-admin.destroy', $admin->id_admin) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun admin ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background: #ef4444; color: #fff; padding: 0.25rem 0.75rem; border-radius: 4px; border: none; cursor: pointer; font-size: 0.875rem;">Hapus Akun</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3" style="padding: 2rem; text-align: center; color: #9ca3af;">Tidak ada data admin lain.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div style="margin-top: 1rem;">
    {{ $admins->links() }}
</div>

@endsection