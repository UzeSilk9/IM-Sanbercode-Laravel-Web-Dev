@extends('layouts.master')

@section('title')
    Detail Transaksi
@endsection

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Detail Transaksi #{{ $isi->id }}</h3>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th width="200">ID Transaksi</th>
                    <td>{{ $isi->id }}</td>
                </tr>
                <tr>
                    <th>Nama Staff</th>
                    <td>{{ $isi->user->name ?? 'Tidak ada data' }}</td>
                </tr>
                <tr>
                    <th>Nama Produk</th>
                    <td>{{ $isi->product->name ?? 'Tidak ada data' }}</td>
                </tr>
                <tr>
                    <th>Tanggal Dibuat</th>
                    <td>{{ $isi->created_at->format('d M Y H:i') }}</td>
                </tr>
                <tr>
                    <th>Tanggal Diperbarui</th>
                    <td>{{ $isi->updated_at->format('d M Y H:i') }}</td>
                </tr>
                <tr>
                    <th>Jenis Transaksi</th>
                    <td>
                        @if($isi->type == 'in')
                            <span class="badge bg-success">Masuk</span>
                        @elseif($isi->type == 'out')
                            <span class="badge bg-danger">Keluar</span>
                        @else
                            <span class="badge bg-secondary">{{ ucfirst($isi->type) }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <td>{{ $isi->amount }}</td>
                </tr>
            </table>

            <a href="/transactions" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
</div>
@endsection
