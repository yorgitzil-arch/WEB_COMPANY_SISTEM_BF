@extends('layouts.base_sistem')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container-fluid p-4">
    <h2 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 1.5rem; color: #2d3748;">Selamat Datang, {{ Auth::user()->email }}</h2>
    <p style="font-size: 1rem; color: #4b5563;">Ini adalah halaman dashboard anggota Anda. Di sini Anda dapat melihat ringkasan aktivitas dan informasi penting terkait akun Anda.</p>
</div>
@endsection