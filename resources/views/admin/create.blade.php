@extends('layouts.base_sistem')

@section('title', 'Dashboard create')

@section('content')
<div style="background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); max-width: 600px; margin: 0 auto;">
    <h3 style="margin-bottom: 1.5rem; font-weight: 600;">Form Tambah Admin</h3>
    
    <form action="{{ route('manage-admin.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem; color: #4b5563;">Nama Admin</label>
            <input type="text" name="nama" required style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 6px;">
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem; color: #4b5563;">Email Admin</label>
            <input type="email" name="email" required style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 6px;">
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; margin-bottom: 0.5rem; color: #4b5563;">Password</label>
            <input type="password" name="password" required style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 6px;">
        </div>

        <button type="submit" style="background: #3b82f6; color: #fff; padding: 0.5rem 1.5rem; border: none; border-radius: 6px; cursor: pointer; font-weight: 600;">Simpan Admin</button>
        <a href="{{ route('manage-admin.index') }}" style="margin-left: 1rem; color: #4b5563; text-decoration: none;">Batal</a>
    </form>
</div>
@endsection