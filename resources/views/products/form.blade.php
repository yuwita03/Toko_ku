@php
$isEdit = isset($product);
@endphp

<form action="{{ $isEdit ? route('admin.products.update', $product->id) : route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <div class="mb-3">
        <label>Nama Produk</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $isEdit ? $product->name : '') }}" required>
    </div>
    <div class="mb-3">
        <label>Barcode</label>
        <input type="text" name="barcode" class="form-control" value="{{ old('barcode', $isEdit ? $product->barcode : '') }}">
    </div>
    <div class="mb-3">
        <label>Kategori</label>
        <input type="text" name="category" class="form-control" value="{{ old('category', $isEdit ? $product->category : '') }}">
    </div>
    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stock" class="form-control" value="{{ old('stock', $isEdit ? $product->stock : '') }}" required>
    </div>
    <div class="mb-3">
        <label>Harga Jual</label>
        <input type="number" name="sell_price" class="form-control" value="{{ old('sell_price', $isEdit ? $product->sell_price : '') }}" required>
    </div>
    <div class="mb-3">
        <label>Harga Modal</label>
        <input type="number" name="cost_price" class="form-control" value="{{ old('cost_price', $isEdit ? $product->cost_price : '') }}" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi Produk</label>
        <textarea name="description" class="form-control">{{ old('description', $isEdit ? $product->description : '') }}</textarea>
    </div>
<div class="mb-3">
    <label>Gambar Produk (Upload atau Link)</label>

    {{-- Tampilkan gambar saat edit --}}
    @if($isEdit && $product->image)
        <img src="{{ asset($product->image) }}" width="60" class="d-block mb-2">
    @endif

    {{-- Input file --}}
    <input type="file" name="image_file" class="form-control mb-2">

    {{-- Input link URL --}}
    <input type="url" name="image_url" class="form-control" placeholder="Atau masukkan link gambar (opsional)">
</div>
<button
    type="submit"
    class="btn btn-success"
    onclick="this.disabled=true; this.form.submit();"
>
    {{ $isEdit ? 'Update' : 'Tambah' }} Produk
</button>

</form>
<script>
    const form = document.querySelector('form');
    form.addEventListener('submit', function () {
        form.querySelector('button[type="submit"]').disabled = true;
    });
</script>
