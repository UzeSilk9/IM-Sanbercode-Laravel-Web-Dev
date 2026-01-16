@extends('layouts.master')

@section('title')
    Dashboard Inventory App
@endsection

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 fw-bold text-primary">Selamat Datang di Inventory App</h2>
    <p class="text-muted">Pantau stok barang, transaksi masuk dan keluar, serta performa sistem inventory Anda dengan mudah.</p>

    {{-- Kartu Statistik Utama --}}
    <div class="row mt-4">
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm border-0 bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Produk</h5>
                    <h2>{{ $totalProducts ?? '0' }}</h2>
                    <small>Jumlah seluruh produk di sistem</small>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card shadow-sm border-0 bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Transaksi Masuk</h5>
                    <h2>{{ $totalIn ?? '0' }}</h2>
                    <small>Barang masuk ke gudang</small>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card shadow-sm border-0 bg-danger text-white">
                <div class="card-body">
                    <h5 class="card-title">Transaksi Keluar</h5>
                    <h2>{{ $totalOut ?? '0' }}</h2>
                    <small>Barang keluar dari gudang</small>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card shadow-sm border-0 bg-warning text-dark">
                <div class="card-body">
                    <h5 class="card-title">Total Staff</h5>
                    <h2>{{ $totalStaff ?? '0' }}</h2>
                    <small>Jumlah pengguna aktif sistem</small>
                </div>
            </div>
        </div>
    </div>
    @if (Auth::check() &&  Auth::user()->role === 'admin')
    {{-- Bagian Aktivitas Terbaru --}}
    <div class="card mt-4 shadow-sm">
        <div class="card-header bg-white fw-bold">Transaksi Terbaru</div>
        <div class="card-body">
            @if(isset($latestTransactions) && $latestTransactions->count() > 0)
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Produk</th>
                        <th>Staff</th>
                        <th>Jenis</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($latestTransactions as $t)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $t->product->name ?? 'Tidak ada data' }}</td>
                        <td>{{ $t->user->name ?? 'Tidak ada data' }}</td>
                        <td>
                            @if($t->type == 'in')
                                <span class="badge bg-success">Masuk</span>
                            @else
                                <span class="badge bg-danger">Keluar</span>
                            @endif
                        </td>
                        <td>{{ $t->amount }}</td>
                        <td>{{ $t->created_at ? $t->created_at->format('d M Y H:i') : '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <p class="text-muted">Belum ada transaksi terbaru.</p>
            @endif
        </div>
    </div>
    @endif

    {{-- Bagian Informasi Sistem --}}
    <div class="alert alert-info mt-4 shadow-sm">
        <strong>Tips:</strong> Pastikan Anda selalu memantau stok secara berkala agar tidak terjadi kekurangan atau kelebihan barang di gudang.
    </div>
</div>
@endsection
