
@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{ $product->name }}</h1>
    <img src="{{ $product->image }}" alt="{{ $product->name }}" style="width: 5px; height:auto;" class="mb-3">
    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Barcode:</strong> {{ $product->barcode }}</li>
        <li class="list-group-item"><strong>Kategori:</strong> {{ $product->category }}</li>
        <li class="list-group-item"><strong>Stok:</strong> {{ $product->stock }}</li>
        <li class="list-group-item"><strong>Harga Jual:</strong> Rp{{ number_format($product->sell_price,0,',','.') }}</li>
        <li class="list-group-item"><strong>Harga Modal:</strong> Rp{{ number_format($product->cost_price,0,',','.') }}</li>
        <li class="list-group-item"><strong>Profit:</strong> Rp{{ number_format($product->profit,0,',','.') }}</li>
        <li class="list-group-item"><strong>Deskripsi:</strong> {{ $product->description }}</li>
    </ul>
    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-inline-block">
        @csrf
        <button type="submit" class="btn btn-success">Tambah ke Keranjang</button>
    </form>
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
