@extends('layouts.app')
@section('content')
<div class="container">
    <h4>Edit Produk</h4>
    @include('products.form', ['product' => $product])
</div>
@endsection
