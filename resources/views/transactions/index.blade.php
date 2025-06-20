@extends('layouts.app')
@section('content')
<div class="container">
    <h1>History Transaksi</h1>
    @if(session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p>{{ session('success')}}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form method="GET" class="mb-3 d-flex align-items-center">
        <input type="text" name="search" class="form-control w-auto" placeholder="Cari Kode Transaksi..." value="{{ request('search') }}">
        <button class="btn btn-secondary ms-2">Cari</button>
    </form>

    <strong>Jumlah Transaksi:</strong> {{ $totalTransactions }}

    <table id="zero_config" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Kode Transaksi</th>
                <th>Total</th>
                <th>Waktu</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
        @foreach($transactions as $trx)
            <tr>
                <td>{{ $trx->kode_transaksi }}</td>
                <td>Rp{{ number_format($trx->total, 0, ',', '.') }}</td>
                <td>{{ $trx->created_at }}</td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailModal{{ $trx->id }}">
                        Lihat Detail
                    </button>
                </td>
            </tr>

            <!-- Modal (letakkan di luar <tr>) -->
            <div class="modal fade" id="detailModal{{ $trx->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $trx->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailModalLabel{{ $trx->id }}">Detail Transaksi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <ul>
                                @foreach($trx->items as $item)
                                    <li>{{ $item->product_name }} x {{ $item->quantity }} (Rp{{ number_format($item->sell_price, 0, ',', '.') }})</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
