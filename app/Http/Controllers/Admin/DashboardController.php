<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Pelanggan;
use App\Models\Anggota;
use App\Models\Departemen;
use App\Models\KomentarPengunjung;
use App\Models\Testimoni;
use App\Models\EbookAnggota; 
use App\Models\Konsultasi;
use App\Models\ProgressProyek; 
use App\Models\LogAktivitas; 

class DashboardController extends Controller
{
    public function index()
    {
        $totalPelanggan     = Pelanggan::count();
        $totalAnggota       = Anggota::count();
        $totalDepartemen    = Departemen::count();
        $totalKomentar      = KomentarPengunjung::count();
        $totalTestimoni     = Testimoni::count();    
        $totalKontenAnggota = EbookAnggota::count(); 
        $totalKonsultasi    = Konsultasi::count();
        $totalProyekAktif   = ProgressProyek::count();
        $grafikAktivitas = LogAktivitas::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->take(7)
            ->get();

        // Kirim semua variabel ke view dashboard
        return view('admin.dashboard', compact(
            'totalPelanggan', 'totalAnggota', 'totalDepartemen', 'totalKomentar',
            'totalTestimoni', 'totalKontenAnggota', 'totalKonsultasi', 'totalProyekAktif',
            'grafikAktivitas'
        ));
    }
}