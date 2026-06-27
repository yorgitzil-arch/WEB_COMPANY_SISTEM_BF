@extends('layouts.base_sistem')

@section('title', 'Dashboard create')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Departemen - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto p-4 md:p-8 max-w-7xl">
        <div class="bg-white rounded-xl shadow-sm p-4 md:p-6 mb-6 flex flex-col sm:flex-row justify-between items-center gap-4 border border-gray-200">
            <div>
                <h1 class="text-xl md:text-2xl font-bold text-gray-800">Manajemen Departemen</h1>
                <p class="text-xs md:text-sm text-gray-500 mt-1">Kelola data divisi dan departemen perusahaan.</p>
            </div>
            <a href="{{ route('crud_departemen.create') }}" class="w-full sm:w-auto bg-indigo-600 hover:bg-indigo-700 text-white text-center font-medium px-5 py-2.5 rounded-lg text-sm transition duration-200 shadow-sm">
                + Tambah Departemen
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-6 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200 text-gray-600 text-xs uppercase font-semibold">
                            <th class="py-4 px-6">Nama Departemen</th>
                            <th class="py-4 px-6 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm divide-y divide-gray-100">
                        @forelse($departemens as $d)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-4 px-6 font-medium text-gray-900">{{ $d->nama_departemen }}</td>
                            <td class="py-4 px-6">
                                <div class="flex gap-2 justify-end items-center">
                                    <a href="{{ route('crud_departemen.show', $d->id_departemen) }}" class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 hover:bg-indigo-100 px-3 py-1.5 rounded-md font-medium text-xs transition">Detail</a>
                                    <a href="{{ route('crud_departemen.edit', $d->id_departemen) }}" class="text-yellow-600 hover:text-yellow-900 bg-yellow-50 hover:bg-yellow-100 px-3 py-1.5 rounded-md font-medium text-xs transition">Edit</a>
                                    <form action="{{ route('crud_departemen.destroy', $d->id_departemen) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus departemen ini?')" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-md font-medium text-xs transition">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="py-8 text-center text-gray-400 text-sm">Belum ada data departemen.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($departemens->hasPages())
                <div class="p-4 border-t border-gray-200 bg-gray-50">
                    {{ $departemens->links() }}
                </div>
            @endif
        </div>
    </div>
</body>
</html>

@endsection