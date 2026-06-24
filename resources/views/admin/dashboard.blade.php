@extends('layouts.base_sistem')

@section('title', 'Dashboard Admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body text-center py-5">
                <h1 class="display-4">Hallo, {{ Auth::user()->email }}! 👋</h1>
                <p class="lead">Selamat Datang Broo or sis! Semangat mengerjakan Halaman Daashboardnya yaa! kalau sudah selesai silahkan hubungi admin.</p>
                <hr>
                <p class="text-muted">Jangan lupa minum dan makan! ya brooo or sis! kita belum cuan soalnya</p>
            </div>
        </div>
    </div>
</div>
@endsection