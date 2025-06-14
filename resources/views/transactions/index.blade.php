
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
    <div>
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
                <td>Rp{{ number_format($trx->total,0,',','.') }}</td>
                <td>{{ $trx->created_at }}</td>
                <td>
                    <ul>
                        @foreach($trx->items as $item)
                            <li>{{ $item->product_name }} x {{ $item->quantity }} (Rp{{ number_format($item->sell_price,0,',','.') }})</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>

</div>
@endsection

