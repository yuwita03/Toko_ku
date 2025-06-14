@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Daftar Produk</h4>
        <a href="{{ route('products.create') }}" class="btn btn-primary">+ Tambah Produk</a>
    </div>
<div>

    <form method="GET" class="mb-3 d-flex align-items-center">
        <input type="text" name="search" class="form-control w-auto" placeholder="Search..." value="{{ request('search') }}">
        <button class="btn btn-secondary ms-2">Cari</button>

    </form>
    <table id="zero_config" class="table table-striped table-bordered">
        <strong>Jumlah Produk:</strong> {{ $totalProducts }}
        <thead>
            <tr>
                <th>PRODUK</th>
                <th>BARCODE</th>
                <th>KATEGORI</th>
                <th>STOK</th>
                <th>HARGA JUAL</th>
                <th>HARGA MODAL</th>
                <th>PROFIT</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>
                    @if($product->image)
                        <img src="{{ asset($product->image) }}" width="30" class="me-2">
                    @else
                        <span class="me-2">[img]</span>
                    @endif
                    {{ $product->name }}
                </td>
                <td>{{ $product->barcode }}</td>
                <td>
                    @if($product->category)
                        <span class="badge bg-light text-dark">{{ $product->category }}</span>
                    @endif
                </td>
                <td>
                    @if($product->stock > 6)
                        <span class="text-success">&#9679;</span>
                    @elseif($product->stock > 2)
                        <span class="text-warning">&#9679;</span>
                    @else
                        <span class="text-danger">&#9679;</span>
                    @endif
                    {{ $product->stock }}
                </td>
                <td>{{ number_format($product->sell_price, 0, ',', '.') }}</td>
                <td>{{ number_format($product->cost_price, 0, ',', '.') }}</td>
                <td>{{ number_format($product->profit, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin hapus produk?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

    {{ $products->links() }}
</div>
@endsection


