@extends('layouts.base_sistem')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container-fluid p-4">
    <h1 class="mb-4" style="font-size: 1.5rem; font-weight: 600; color: #2d3748;">Dashboard Admin</h1>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 1.25rem; margin-bottom: 2rem;">
        
        <div style="background: #fff; padding: 1.25rem; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
            <div style="color: #718096; font-size: 0.875rem; font-weight: 500;">Total Pelanggan</div>
            <div style="font-size: 1.75rem; font-weight: 700; margin-top: 0.5rem; color: #1a202c;">{{ $totalPelanggan }}</div>
        </div>

        <div style="background: #fff; padding: 1.25rem; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
            <div style="color: #718096; font-size: 0.875rem; font-weight: 500;">Total Anggota</div>
            <div style="font-size: 1.75rem; font-weight: 700; margin-top: 0.5rem; color: #1a202c;">{{ $totalAnggota }}</div>
        </div>

        <div style="background: #fff; padding: 1.25rem; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
            <div style="color: #718096; font-size: 0.875rem; font-weight: 500;">Total Departemen</div>
            <div style="font-size: 1.75rem; font-weight: 700; margin-top: 0.5rem; color: #1a202c;">{{ $totalDepartemen }}</div>
        </div>

        <div style="background: #fff; padding: 1.25rem; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
            <div style="color: #718096; font-size: 0.875rem; font-weight: 500;">Komentar Masuk</div>
            <div style="font-size: 1.75rem; font-weight: 700; margin-top: 0.5rem; color: #1a202c;">{{ $totalKomentar }}</div>
        </div>

        <div style="background: #fff; padding: 1.25rem; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
            <div style="color: #718096; font-size: 0.875rem; font-weight: 500;">Testimoni Masuk</div>
            <div style="font-size: 1.75rem; font-weight: 700; margin-top: 0.5rem; color: #1a202c;">{{ $totalTestimoni }}</div>
        </div>

        <div style="background: #fff; padding: 1.25rem; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
            <div style="color: #718096; font-size: 0.875rem; font-weight: 500;">Konten Anggota</div>
            <div style="font-size: 1.75rem; font-weight: 700; margin-top: 0.5rem; color: #1a202c;">{{ $totalKontenAnggota }}</div>
        </div>

        <div style="background: #fff; padding: 1.25rem; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
            <div style="color: #718096; font-size: 0.875rem; font-weight: 500;">Total Konsultasi</div>
            <div style="font-size: 1.75rem; font-weight: 700; margin-top: 0.5rem; color: #1a202c;">{{ $totalKonsultasi }}</div>
        </div>

        <div style="background: #fff; padding: 1.25rem; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
            <div style="color: #718096; font-size: 0.875rem; font-weight: 500;">Proyek Aktif</div>
            <div style="font-size: 1.75rem; font-weight: 700; margin-top: 0.5rem; color: #1a202c;">{{ $totalProyekAktif }}</div>
        </div>

    </div>

    <div style="background: #fff; padding: 1.5rem; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
        <h3 style="font-size: 1.125rem; font-weight: 600; margin-bottom: 1rem; color: #2d3748;">Grafik Aktivitas</h3>
        <div style="position: relative; height: 320px; width: 100%;">
            <canvas id="activityChart"></canvas>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('activityChart').getContext('2d');
        const dataGrafik = @json($grafikAktivitas);

        new Chart(ctx, {
            type: 'line', 
            data: {
                labels: dataGrafik.map(item => item.date || 'Hari ini'), 
                datasets: [{
                    label: 'Jumlah Aktivitas',
                    data: dataGrafik.map(item => item.count || 0), 
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection