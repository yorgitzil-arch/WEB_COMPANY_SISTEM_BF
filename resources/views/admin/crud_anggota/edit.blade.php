@extends('layouts.base_sistem')

@section('title', 'Dashboard create')

@section('content')
<div style="background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); max-width: 600px; margin: 0 auto;">
    <h3 style="margin-bottom: 1.5rem; font-weight: 600;">Halaman Edit Anggota</h3>
    @if ($errors->any())
    <div style="background: #fde2e2; color: #991b1b; padding: 1rem; border-radius: 6px; margin-bottom: 1rem;">
        <ul style="list-style: none; margin: 0; padding: 0;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
    <form action="{{ route('crud_anggota.update', $anggota->id_anggota) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem; color: #4b5563;">Nama Anggota</label>
            <input type="text" name="nama" value="{{ $anggota->nama_lengkap }}" required style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 6px;">
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem; color: #4b5563;">Email Anggota</label>
            <input type="email" name="email" value="{{ $anggota->email }}" required style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 6px;">
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; margin-bottom: 0.5rem; color: #4b5563;">Password Baru (Kosongkan jika tidak diganti)</label>
            <input type="password" name="password" style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 6px;" placeholder="Isi hanya jika ingin merubah password">
        </div>

        <button type="submit" style="background: #eab308; color: #fff; padding: 0.5rem 1.5rem; border: none; border-radius: 6px; cursor: pointer; font-weight: 600;">Perbarui Data</button>
        <a href="{{ route('crud_anggota.index') }}" style="margin-left: 1rem; color: #4b5563; text-decoration: none;">Batal</a>
    </form>
</div>
@endsection