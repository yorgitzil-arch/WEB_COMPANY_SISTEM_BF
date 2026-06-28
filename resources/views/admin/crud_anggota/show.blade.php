@extends('layouts.base_sistem')

@section('title', 'Detail Profil Anggota - ' . $anggota->nama_lengkap)

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Profil Anggota - {{ $anggota->nama_lengkap }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-900 antialiased">
    <div class="container mx-auto p-4 md:p-8 max-w-5xl">
        
        <!-- HEADER -->
        <div class="bg-gradient-to-r from-emerald-600 to-teal-700 rounded-2xl shadow-md p-6 md:p-8 text-white mb-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h1 class="text-2xl md:text-3xl font-extrabold tracking-tight">{{ $anggota->nama_lengkap }}</h1>
                    <p class="text-emerald-100 text-sm md:text-base mt-1">📧 {{ $anggota->email }}</p>
                    <p class="text-emerald-200 text-xs mt-1">📱 {{ $anggota->nomor_wa ?? '-' }}</p>
                </div>
                <a href="{{ route('crud_anggota.index') }}" class="bg-white/10 hover:bg-white/20 text-white text-xs md:text-sm font-medium px-4 py-2 rounded-xl transition border border-white/20">
                    ← Kembali ke List
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- SIDEBAR KIRI -->
            <div class="md:col-span-1 space-y-6">
                
                <!-- Keahlian -->
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

                <!-- Sertifikat -->
                <div class="bg-white rounded-2xl p-5 border border-gray-200 shadow-sm">
                    <h3 class="text-sm font-bold text-gray-800 uppercase tracking-wider mb-3">📜 Sertifikat</h3>
                    <ul class="space-y-2.5 text-xs text-gray-600">
                        @forelse($sertifikat as $s)
                            <li class="p-2 bg-gray-50 rounded-lg border border-gray-100 font-medium text-gray-800">
                                {{ $s->judul ?? $s->nama_sertifikat ?? '-' }}
                                <span class="text-gray-400 text-xs">({{ $s->penerbit ?? '-' }})</span>
                            </li>
                        @empty
                            <li class="text-gray-400 italic">Belum ada riwayat sertifikat.</li>
                        @endforelse
                    </ul>
                </div>

                <!-- Informasi Pribadi -->
                <div class="bg-white rounded-2xl p-5 border border-gray-200 shadow-sm">
                    <h3 class="text-sm font-bold text-gray-800 uppercase tracking-wider mb-3">👤 Informasi Pribadi</h3>
                    <ul class="space-y-2 text-xs text-gray-600">
                        <li><strong>Tempat Lahir:</strong> {{ $anggota->tempat_lahir ?? '-' }}</li>
                        <li><strong>Tanggal Lahir:</strong> {{ $anggota->tanggal_lahir ?? '-' }}</li>
                        <li><strong>Bidang Keahlian:</strong> {{ $anggota->bidang_keahlian_utama ?? '-' }}</li>
                        <li><strong>Status:</strong> 
                            <span class="px-2 py-0.5 rounded-full text-xs font-medium 
                                {{ $anggota->status_keaktifan == 'aktif' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                {{ $anggota->status_keaktifan }}
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- KONTEN UTAMA -->
            <div class="md:col-span-2 space-y-6">
                
                <!-- Deskripsi Diri -->
                <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm">
                    <h3 class="text-sm font-bold text-gray-800 uppercase tracking-wider mb-4 border-b pb-2">📝 Deskripsi Diri</h3>
                    <p class="text-sm text-gray-600">{{ $anggota->deskripsi_diri ?? 'Belum mengisi deskripsi diri.' }}</p>
                </div>

                <!-- Pengalaman -->
                <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm">
                    <h3 class="text-sm font-bold text-gray-800 uppercase tracking-wider mb-4 border-b pb-2">💼 Pengalaman Kerja / Organisasi</h3>
                    <div class="space-y-3">
                        @forelse($pengalaman as $p)
                            <div class="p-3 bg-gray-50 rounded-xl border border-gray-100">
                                <p class="text-sm font-medium text-gray-800">{{ $p->posisi_jabatan }}</p>
                                <p class="text-xs text-gray-500">{{ $p->nama_organisasi }}</p>
                                <p class="text-xs text-gray-400">{{ $p->tahun_mulai }} - {{ $p->tahun_selesai ?? 'Sekarang' }}</p>
                            </div>
                        @empty
                            <p class="text-xs text-gray-400 italic">Belum mengisi daftar pengalaman.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Proyek -->
                <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm">
                    <h3 class="text-sm font-bold text-gray-800 uppercase tracking-wider mb-4 border-b pb-2">🚀 Proyek & Portofolio</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <h4 class="text-xs font-bold text-gray-400 uppercase mb-2">Proyek Pribadi</h4>
                            <ul class="space-y-1.5 text-xs">
                                @forelse($proyek_p as $pp)
                                    <li>📁 {{ $pp->judul_proyek }}</li>
                                @empty
                                    <li class="text-gray-400 italic">Kosong</li>
                                @endforelse
                            </ul>
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-gray-400 uppercase mb-2">Proyek Lainnya</h4>
                            <ul class="space-y-1.5 text-xs">
                                @forelse($proyek_l as $pl)
                                    <li>🔗 {{ $pl->judul_proyek }}</li>
                                @empty
                                    <li class="text-gray-400 italic">Kosong</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Aset Digital -->
                <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm">
                    <h3 class="text-sm font-bold text-gray-800 uppercase tracking-wider mb-4 border-b pb-2">📂 Aset Digital Produk</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <h4 class="text-xs font-bold text-gray-400 uppercase mb-2">🎬 Video Proyek</h4>
                            <ul class="space-y-1.5 text-xs">
                                @forelse($video as $v)
                                    <li><a href="{{ $v->url_video }}" target="_blank" class="text-blue-600 underline">▶ {{ $v->judul_video }}</a></li>
                                @empty
                                    <li class="text-gray-400 italic">Tidak ada asset video</li>
                                @endforelse
                            </ul>
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-gray-400 uppercase mb-2">📖 E-Book Anggota</h4>
                            <ul class="space-y-1.5 text-xs">
                                @forelse($ebook as $e)
                                    <li>📕 {{ $e->judul_ebook }}</li>
                                @empty
                                    <li class="text-gray-400 italic">Tidak ada asset e-book</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Media Sosial -->
                <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm">
                    <h3 class="text-sm font-bold text-gray-800 uppercase tracking-wider mb-4 border-b pb-2">🌐 Media Sosial</h3>
                    <div class="flex flex-wrap gap-3 text-xs">
                        @if($anggota->url_youtube) <a href="{{ $anggota->url_youtube }}" target="_blank" class="text-red-600">▶ YouTube</a> @endif
                        @if($anggota->url_instagram) <a href="{{ $anggota->url_instagram }}" target="_blank" class="text-pink-600">📸 Instagram</a> @endif
                        @if($anggota->url_facebook) <a href="{{ $anggota->url_facebook }}" target="_blank" class="text-blue-600">👍 Facebook</a> @endif
                        @if($anggota->url_tiktok) <a href="{{ $anggota->url_tiktok }}" target="_blank" class="text-black">🎵 TikTok</a> @endif
                        @if($anggota->url_linktree) <a href="{{ $anggota->url_linktree }}" target="_blank" class="text-green-600">🔗 Linktree</a> @endif
                        @if(!$anggota->url_youtube && !$anggota->url_instagram && !$anggota->url_facebook && !$anggota->url_tiktok && !$anggota->url_linktree)
                            <p class="text-gray-400 italic">Belum ada media sosial.</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
        
    </div>
</body>
</html>
@endsection