@extends('layouts.base_sistem')

@section('title', 'Dashboard create')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Profil Anggota - {{ $anggota->nama }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-900 antialiased">
    <div class="container mx-auto p-4 md:p-8 max-w-5xl">
        
        <div class="bg-gradient-to-r from-emerald-600 to-teal-700 rounded-2xl shadow-md p-6 md:p-8 text-white mb-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h1 class="text-2xl md:text-3xl font-extrabold tracking-tight">{{ $anggota->nama }}</h1>
                    <p class="text-emerald-100 text-sm md:text-base mt-1">📧 {{ $anggota->email }}</p>
                </div>
                <a href="{{ route('crud_anggota.index') }}" class="bg-white/10 hover:bg-white/20 text-white text-xs md:text-sm font-medium px-4 py-2 rounded-xl transition border border-white/20">
                    ← Kembali ke List
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="md:col-span-1 space-y-6">
                <div class="bg-white rounded-2xl p-5 border border-gray-200 shadow-sm">
                    <h3 class="text-sm font-bold text-gray-800 uppercase tracking-wider mb-3 flex items-center gap-2">⚡ Keahlian</h3>
                    <div class="flex flex-wrap gap-1.5">
                        @forelse($keahlian as $k)
                            <span class="bg-emerald-50 text-emerald-700 text-xs font-semibold px-2.5 py-1 rounded-md border border-emerald-100">{{ $k->nama_keahlian }}</span>
                        @empty
                            <p class="text-xs text-gray-400 italic">Belum ada keahlian diinput.</p>
                        @endforelse
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-5 border border-gray-200 shadow-sm">
                    <h3 class="text-sm font-bold text-gray-800 uppercase tracking-wider mb-3">📜 Sertifikat</h3>
                    <ul class="space-y-2.5 text-xs text-gray-600">
                        @forelse($sertifikat as $s)
                            <li class="p-2 bg-gray-50 rounded-lg border border-gray-100 font-medium text-gray-800">{{ $s->nama_penghargaan }}</li>
                        @empty
                            <li class="text-gray-400 italic">Belum ada riwayat sertifikat.</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <div class="md:col-span-2 space-y-6">
                
                <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm">
                    <h3 class="text-sm font-bold text-gray-800 uppercase tracking-wider mb-4 border-b pb-2">💼 Pengalaman Kerja / Organisasi</h3>
                    <div class="space-y-3">
                        @forelse($pengalaman as $p)
                            <div class="p-3 bg-gray-50 rounded-xl border border-gray-100 text-sm font-medium text-gray-800">{{ $p->nama_pengalaman }}</div>
                        @empty
                            <p class="text-xs text-gray-400 italic">Belum mengisi daftar pengalaman.</p>
                        @endforelse
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm">
                    <h3 class="text-sm font-bold text-gray-800 uppercase tracking-wider mb-4 border-b pb-2">🚀 Proyek & Portofolio</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <h4 class="text-xs font-bold text-gray-400 uppercase mb-2">Proyek Pribadi</h4>
                            <ul class="space-y-1.5 text-xs">
                                @forelse($proyek_p as $pp) <li>📁 {{ $pp->nama_proyek }}</li> @empty <li class="text-gray-400 italic">Kosong</li> @endforelse
                            </ul>
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-gray-400 uppercase mb-2">Proyek Lainnya</h4>
                            <ul class="space-y-1.5 text-xs">
                                @forelse($proyek_l as $pl) <li>🔗 {{ $pl->nama_proyek_lain }}</li> @empty <li class="text-gray-400 italic">Kosong</li> @endforelse
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm">
                    <h3 class="text-sm font-bold text-gray-800 uppercase tracking-wider mb-4 border-b pb-2">📂 Aset Digital Produk</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <h4 class="text-xs font-bold text-gray-400 uppercase mb-2">🎬 Video Proyek</h4>
                            <ul class="space-y-1.5 text-xs">
                                @forelse($video as $v) <li class="text-blue-600 underline">▶ {{ $v->judul_video }}</li> @empty <li class="text-gray-400 italic">Tidak ada asset video</li> @endforelse
                            </ul>
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-gray-400 uppercase mb-2">📖 E-Book Anggota</h4>
                            <ul class="space-y-1.5 text-xs">
                                @forelse($ebook as $e) <li>📕 {{ $e->judul_ebook }}</li> @empty <li class="text-gray-400 italic">Tidak ada asset e-book</li> @endforelse
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
    </div>
</body>
</html>
@endsection