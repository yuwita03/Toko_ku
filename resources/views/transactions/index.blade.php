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

    <table class="table table-striped table-bordered mt-3">
        <thead>
            <tr>
                <th>Nama User</th>
                <th>Kode Transaksi</th>
                <th>Total</th>
                <th>Waktu</th>
                <th>Pembayaran</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
        @foreach($transactions as $trx)
            <tr>
                <td>{{ $trx->user->nama ?? '-' }}</td>
                <td>{{ $trx->kode_transaksi }}</td>
                <td>Rp{{ number_format($trx->total, 0, ',', '.') }}</td>
                <td>{{ $trx->created_at->format('d M Y, H:i') }}</td>
                <td>{{ ucfirst($trx->metode_pembayaran ?? '-') }}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailModal{{ $trx->id }}">
                        Lihat Detail
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{-- Semua modal dan area cetak --}}
    @foreach($transactions as $trx)
    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal{{ $trx->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $trx->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <strong>Nama:</strong> {{ $trx->user->nama ?? '-' }}<br>
                    <strong>Email:</strong> {{ $trx->user->email ?? '-' }}<br>
                    <strong>Alamat:</strong> {{ $trx->user->alamat ?? '-' }}<br>
                    <strong>Kode Transaksi:</strong> {{ $trx->kode_transaksi }}<br>
                    <strong>Tanggal:</strong> {{ $trx->created_at->format('d M Y, H:i') }}<br>
                    <strong>Pembayaran :</strong>{{ ucfirst($trx->metode_pembayaran ?? '-') }}


                    <hr>
                    <h5>Detail Produk</h5>
                    <ul class="list-group">
                        @foreach($trx->items as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $item->product_name }} x {{ $item->quantity }}
                                <span>Rp{{ number_format($item->sell_price, 0, ',', '.') }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button onclick="printTransaction('{{ $trx->id }}')" class="btn btn-primary">Print PDF</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Area Cetak -->
    <div id="print-area-{{ $trx->id }}" class="d-none p-4">
        <div class="text-center mb-4">
            <h4 class="fw-bold">Struk Transaksi</h4>
            <p class="text-muted mb-0">Toko Laravel</p>
            <hr>
        </div>

        <table class="table table-borderless mb-3">
            <tr>
                <th style="width: 150px;">Nama</th>
                <td>: {{ $trx->user->nama ?? '-' }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>: {{ $trx->user->email ?? '-' }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>: {{ $trx->user->alamat ?? '-' }}</td>
            </tr>
            <tr>
                <th>Kode Transaksi</th>
                <td>: {{ $trx->kode_transaksi }}</td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td>: {{ $trx->created_at->format('d M Y, H:i') }}</td>
            </tr>
            <tr>
                <th>Pembayaran</th>
                <td>: {{ ucfirst($trx->metode_pembayaran ?? '-') }}</td>
            </tr>
        </table>

        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Produk</th>
                    <th class="text-center">Jumlah</th>
                    <th class="text-end">Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trx->items as $item)
                    <tr>
                        <td>{{ $item->product_name }}</td>
                        <td class="text-center">{{ $item->quantity }}</td>
                        <td class="text-end">Rp{{ number_format($item->sell_price, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2" class="text-end">Total</th>
                    <th class="text-end">Rp{{ number_format($trx->total, 0, ',', '.') }}</th>
                </tr>
            </tfoot>
        </table>

        <div class="text-center mt-4">
            <p class="fst-italic text-muted">Terima kasih telah berbelanja 🙌</p>
        </div>
    </div>
    @endforeach
</div>

{{-- Script print --}}
<script>
function printTransaction(id) {
    const printContents = document.getElementById('print-area-' + id).innerHTML;
    const originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    location.reload();
}
</script>
@endsection
