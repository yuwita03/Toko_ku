@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Daftar Produk</h1>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5>{{ $product->name }}</h5>
                    <p class="mb-1">{{ $product->category }}</p>
                    <p class="mb-1">{{ $product->description }}</p>
                    <p class="mb-1">Stok: {{ $product->stock }}</p>
                    <p class="mb-1 text-success"><strong>Rp{{ number_format($product->sell_price,0,',','.') }}</strong></p>
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        <button type="submit" class="btn btn-success">Tambah ke Keranjang</button>
                    </form>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
