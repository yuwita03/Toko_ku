@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Keranjang Belanja</h1>
    @if(session('cart') && count(session('cart')) > 0)
        <table class="table">
            <tr>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
            @php $total = 0; @endphp
            @foreach(session('cart') as $id => $item)
<tr>
    <td>{{ $item['name'] }}</td>
    <td>
        <div class="input-group" style="width:120px;">
            <form action="{{ route('cart.decrement', $id) }}" method="POST" style="display:inline;">
                @csrf
                <button class="btn btn-sm btn-secondary" {{ $item['quantity'] <= 1 ? 'disabled' : '' }}>-</button>
            </form>
            <input type="text" value="{{ $item['quantity'] }}" readonly class="form-control form-control-sm text-center" style="width:40px;">
            <form action="{{ route('cart.increment', $id) }}" method="POST" style="display:inline;">
                @csrf
                <button class="btn btn-sm btn-secondary">+</button>
            </form>
        </div>
    </td>
    <td>Rp{{ number_format($item['sell_price'] * $item['quantity'],0,',','.') }}</td>
    <td>
        <form method="POST" action="{{ route('cart.remove', $id) }}">
            @csrf
            <button class="btn btn-sm btn-danger">Hapus</button>
        </form>
    </td>
    @php $total += $item['sell_price'] * $item['quantity']; @endphp
</tr>
            @endforeach
            <tr>
                <td colspan="2"><b>Total</b></td>
                <td colspan="2"><b>Rp{{ number_format($total,0,',','.') }}</b></td>
            </tr>
        </table>
        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Checkout</button>
        </form>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Lanjut Belanja</a>
    </div>
    @else
        <p>Keranjang kosong.</p>
    @endif
</div>
@endsection
