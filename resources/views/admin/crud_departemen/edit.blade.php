@extends('layouts.base_sistem')

@section('title', 'Dashboard create')

@section('content')
    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Departemen</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-gray-100 font-sans">
        <div class="container mx-auto p-4 md:p-8 max-w-2xl">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="border-b border-gray-200 p-6 bg-gray-50">
                    <h2 class="text-lg font-bold text-gray-800">Ubah Data Departemen</h2>
                    <p class="text-xs text-gray-500 mt-1">Perbarui informasi departemen pilihan Anda.</p>
                </div>
                <form action="{{ route('crud_departemen.update', $departemen->id_departemen) }}" method="POST"
                    class="p-6 space-y-5">
                    @csrf @method('PUT')
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Departemen</label>
                        <input type="text" name="nama_departemen" value="{{ $departemen->nama_departemen }}" required
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Deskripsi Departemen</label>
                        <textarea name="deskripsi" rows="4" required
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">{{ $departemen->deskripsi }}</textarea>
                    </div>
                    <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                        <a href="{{ route('crud_departemen.index') }}"
                            class="px-4 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100 rounded-lg transition">Batal</a>
                        <button type="submit"
                            class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg shadow-sm transition">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </body>

    </html>

@endsection