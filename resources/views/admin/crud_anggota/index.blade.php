@extends('layouts.base_sistem')

@section('title', 'Dashboard create')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Anggota - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto p-4 md:p-8 max-w-7xl">
        <div class="bg-white rounded-xl shadow-sm p-4 md:p-6 mb-6 flex flex-col sm:flex-row justify-between items-center gap-4 border border-gray-200">
            <div>
                <h1 class="text-xl md:text-2xl font-bold text-gray-800">Manajemen Anggota</h1>
                <p class="text-xs md:text-sm text-gray-500 mt-1">Kelola data profil utama seluruh entitas anggota.</p>
            </div>
            <a href="{{ route('crud_anggota.create') }}" class="w-full sm:w-auto bg-emerald-600 hover:bg-emerald-700 text-white text-center font-medium px-5 py-2.5 rounded-lg text-sm transition duration-200 shadow-sm">
                + Tambah Anggota
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-6 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Lengkap</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($anggota as $items)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $items->nama_lengkap }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $items->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap flex gap-2">
                                    <a href="{{ route('crud_anggota.show', $items->id_anggota) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg text-sm">Detail</a>
                                    <a href="{{ route('crud_anggota.edit', $items->id_anggota) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-lg text-sm">Edit</a>

                                    <form id="delete-form-{{ $items->id_anggota }}" action="{{ route('crud_anggota.destroy', $items->id_anggota) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDelete({{ $items->id_anggota }})" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm transition duration-200">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">Tidak ada data anggota.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if(method_exists($anggota, 'links'))
                <div class="p-4 border-t border-gray-200 bg-gray-50">
                    {{ $anggota->links() }}
                </div>
            @endif
        </div>
    </div>

    <script>
        function confirmDelete(anggotaId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data anggota akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + anggotaId).submit();
                }
            });
        }
    </script>
</body>
</html>
@endsection