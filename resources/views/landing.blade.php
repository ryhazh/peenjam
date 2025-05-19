@extends('layouts.admin')
@section('content')
    {{-- Hero Section --}}
    <div class="row text-center" style="margin-top: 10rem">
        <div>
            <h1><span class="badge bg-purple-lt">idk put sum text here</span></h1>
            <h1 class="display-4 fw-bold">Kelola Peminjaman Barang dengan Peenjam</h1>
            <h1 class="fw-normal mt-2 text-grey">Catat, pinjam, dan pantau aset tanpa ribet — semua dalam satu aplikasi yang mudah digunakan.</h1>
        </div>
        <div class="d-flex gap-3 justify-content-center mt-5">
            <a href="{{ route('register') }}" class="btn btn-pill btn-lg btn-primary">Get Started</a>
            <a href="https://github.com/your-repo" class="btn btn-ghost-light btn-lg" target="_blank">Source Code</a>
        </div>
    </div>

    {{-- Dashboard Preview --}}
    <div class="text-center" style="margin-top: 5rem">
        <img src="{{ asset('dashboard.png') }}" class="rounded-3 shadow" style="max-width: 1000px; width: 90%;" alt="Dashboard Preview">
        <p class="text-muted mt-3">Tampilan dashboard modern dan mudah dipahami.</p>
    </div>

    {{-- Features Section --}}
    <div class="row text-center"  style="margin-top: 10rem">
        <div class="col-md-4">
            <h2>3 Role, 1 Sistem</h2>
            <p>Admin mengatur sistem, staff mengelola barang, user tinggal pinjam.</p>
        </div>
        <div class="col-md-4">
            <h2>Notifikasi Pintar</h2>
            <p>Dapatkan notifikasi otomatis saat barang jatuh tempo atau stok hampir habis.</p>
        </div>
        <div class="col-md-4">
            <h2>Laporan Real-Time</h2>
            <p>Pantau data peminjaman dengan grafik dan laporan instan kapan saja.</p>
        </div>
    </div>

    {{-- Testimonials --}}
    <div class="text-center" style="margin-top: 10rem">
        <h2 class="fw-bold">Apa Kata Pengguna</h2>
        <div class="row justify-content-center mt-4">
            <div class="col-md-3">
                <div class="card shadow-sm p-3">
                    <p>"Aplikasinya simpel banget, cocok buat sekolah dan kantor!"</p>
                    <strong>- Rizky, Staff IT</strong>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm p-3">
                    <p>"Gak nyangka bisa semudah ini ngatur peminjaman alat lab."</p>
                    <strong>- Lestari, Guru Kimia</strong>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm p-3">
                    <p>"Suka banget sama tampilannya. Clean dan profesional."</p>
                    <strong>- Deni, Admin Perpustakaan</strong>
                </div>
            </div>
        </div>
    </div>

    {{-- Final CTA --}}
    <div class="text-center mt-5 py-5 rounded-3">
        <h2 class="fw-bold">Siap Mengelola Barang dengan Lebih Mudah?</h2>
        <p class="mb-4">Mulai sekarang dan nikmati kemudahan manajemen aset bersama Peenjam.</p>
        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Daftar Sekarang</a>
    </div>

    {{-- Footer --}}
    <footer class="text-center mt-5 mb-3 text-muted">
        <p>© {{ now()->year }} Peenjam. Made with ❤️ by Kelompok 6.</p>
    </footer>
@endsection
