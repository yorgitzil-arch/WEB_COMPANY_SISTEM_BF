@extends('layouts.base_sistem')

@section('title', 'Detail Departemen')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Departemen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-4 md:p-8 max-w-2xl">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="border-b border-gray-200 p-6 bg-gray-50 flex justify-between items-center">
                <div>
                    <h2 class="text-lg font-bold text-gray-800">Informasi Departemen</h2>
                    <p class="text-xs text-gray-500 mt-1">Data rinci mengenai unit departemen.</p>
                </div>
                <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-indigo-100 text-indigo-800">Aktif</span>
            </div>
            
            <div class="p-6 space-y-6">
                <div>
                    <h3 class="text-xs uppercase tracking-wider text-gray-400 font-semibold mb-1">Nama Departemen</h3>
                    <p class="text-base font-semibold text-gray-900">{{ $departemen->nama_departemen }}</p>
                </div>
                
                <div>
                    <h3 class="text-xs uppercase tracking-wider text-gray-400 font-semibold mb-1">Deskripsi & Peran</h3>
                    <p class="text-sm text-gray-600 bg-gray-50 p-4 rounded-xl border border-gray-100 whitespace-pre-line leading-relaxed">{{ $departemen->deskripsi }}</p>
                </div>
                
                <div class="pt-4 border-t border-gray-100 flex justify-between items-center">
                    <a href="{{ route('crud_departemen.index') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900 transition">← Kembali</a>
                    
                    <a href="{{ route('crud_departemen.edit', $departemen->id_departemen) }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium rounded-lg shadow-sm transition">
                        Edit Konten
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection