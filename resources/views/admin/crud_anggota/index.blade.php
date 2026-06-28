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
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200 text-gray-600 text-xs uppercase font-semibold">
                            <th class="py-4 px-6">Nama Lengkap</th>
                            <th class="py-4 px-6">Email</th>
                            <th class="py-4 px-6 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm divide-y divide-gray-100">
                        @forelse($anggotas as $a)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-4 px-6 font-medium text-gray-900">{{ $a->nama_lengkap }}</td>
                            <td class="py-4 px-6 text-gray-500">{{ $a->email }}</td>
                            <td class="py-4 px-6">
                                <div class="flex gap-2 justify-end items-center">
                                    <a href="{{ route('crud_anggota.show', $a->id_pengguna) }}" class="text-emerald-600 hover:text-emerald-900 bg-emerald-50 hover:bg-emerald-100 px-3 py-1.5 rounded-md font-medium text-xs transition">Detail & Portfolio</a>
                                    
                                    <a href="{{ route('crud_anggota.edit', $a->id_pengguna) }}" class="text-yellow-600 hover:text-yellow-900 bg-yellow-50 hover:bg-yellow-100 px-3 py-1.5 rounded-md font-medium text-xs transition">Edit</a>
                                    
                                    <form action="{{ route('crud_anggota.destroy', $a->id_pengguna) }}" method="POST" id="delete-form-{{ $a->id_pengguna }}" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="button" onclick="confirmDelete('{{ $a->id_pengguna }}')" class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-md font-medium text-xs transition">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="py-8 text-center text-gray-400 text-sm">Belum ada data anggota terdaftar.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($anggotas->hasPages())
                <div class="p-4 border-t border-gray-200 bg-gray-50">
                    {{ $anggotas->links() }}
                </div>
            @endif
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                // Menggunakan class Tailwind agar serasi dengan desain Anda
                confirmButton: "bg-emerald-600 hover:bg-emerald-700 text-white font-medium px-4 py-2 rounded-lg mx-2",
                cancelButton: "bg-red-600 hover:bg-red-700 text-white font-medium px-4 py-2 rounded-lg mx-2"
              },
              buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
              title: "Apakah kamu yakin?",
              text: "Menghapus anggota juga akan memutus data portfolionya. Lanjutkan?",
              icon: "warning",
              showCancelButton: true,
              confirmButtonText: "Ya, Hapus!",
              cancelButtonText: "Batalkan!",
              reverseButtons: true
            }).then((result) => {
              if (result.isConfirmed) {
                // Jika user klik Yes, maka submit form yang memiliki ID sesuai dengan ID anggota
                document.getElementById('delete-form-' + id).submit();
              } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                  title: "Cancelled",
                  text: "Data anggota aman :)",
                  icon: "error"
                });
              }
            });
        }
    </script>
</body>
</html>
@endsection