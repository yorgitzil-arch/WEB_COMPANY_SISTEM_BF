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
                <form action="{{ route('crud_departemen.update', $departemen->id_departemen) }}" method="POST" class="p-6 space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Departemen <span class="text-red-500">*</span></label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama', $departemen->nama_departemen) }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Login <span class="text-red-500">*</span></label>
                        <input type="email" name="email" id="email" value="{{ old('email', $departemen->pengguna->email ?? '') }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                        <small class="text-gray-400 text-xs">Email ini digunakan untuk login ke sistem</small>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                        <input type="password" name="password" id="password" placeholder="Isi hanya jika ingin merubah password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                        <small class="text-gray-400 text-xs">Kosongkan jika tidak ingin mengganti password</small>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Isi hanya jika ingin merubah password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">Perbarui Data</button>
                        <a href="{{ route('crud_departemen.index') }}" class="text-gray-500 hover:text-gray-700 text-sm">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </body>

    </html>

@endsection