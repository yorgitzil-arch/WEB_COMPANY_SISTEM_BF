@extends('layouts.base_sistem')

@section('title', 'Dashboard create')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto p-4 md:p-8 max-w-3xl">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="border-b border-gray-200 p-6 bg-gray-50">
                <h2 class="text-lg font-bold text-gray-800">Ubah Profil Anggota</h2>
                <p class="text-xs text-gray-500 mt-1">Sesuaikan identitas primer dari anggota terpilih.</p>
            </div>
            
            <form action="{{ route('crud_anggota.update', $anggota->id_pengguna) }}" method="POST" class="p-6 space-y-5">
                @csrf 
                @method('PUT')
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Lengkap</label>
                    <input type="text" name="nama" value="{{ $anggota->nama_lengkap }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Alamat Email</label>
                    <input type="email" name="email" value="{{ $anggota->email }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                </div>
                
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                    <a href="{{ route('crud_anggota.index') }}" class="px-4 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100 rounded-lg transition">Batal</a>
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-medium px-5 py-2 rounded-lg text-sm transition duration-200 shadow-sm">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

@endsection