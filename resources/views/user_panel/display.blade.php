<!-- Product Grid Section -->
<div class="max-w-7xl mx-auto px-4 py-8" id="menu">
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($products as $product)
    <div class="bg-black rounded-2xl shadow-lg overflow-hidden border border-gray-700">
      <img src="{{ $product->image ?? 'https://via.placeholder.com/400x300' }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">

      <div class="px-4 py-3">
        <h3 class="text-xl font-bold text-yellow-400 mb-1">{{ $product->name }}</h3>
        <p class="text-sm text-red-500 mb-1">{{ $product->category }}</p>
        <p class="text-sm text-gray-300 mb-2">{{ $product->description }}</p>
        <p class="text-sm text-gray-400 mb-2">Stok: {{ $product->stock }}</p>
        <p class="text-lg font-bold text-yellow-300 mb-4">Rp{{ number_format($product->sell_price, 0, ',', '.') }}</p>

        <div class="flex gap-2">
          <form action="{{ route('cart.add', $product->id) }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-xl text-sm">
              Tambah
            </button>
          </form>

          <!-- Button to trigger modal -->
          <button type="button" class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded-xl text-sm font-semibold"
                  data-bs-toggle="modal" data-bs-target="#productDetailModal{{ $product->id }}">
            Detail
          </button>
        </div>
      </div>
    </div>

    <!-- Product Detail Modal -->
    <div class="modal fade" id="productDetailModal{{ $product->id }}" tabindex="-1" aria-labelledby="productDetailModalLabel{{ $product->id }}" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="productDetailModalLabel{{ $product->id }}">Detail Produk</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
          </div>
          <div class="modal-body">
            <img src="{{ $product->image ?? 'https://via.placeholder.com/400x300' }}" class="img-fluid rounded mb-3" alt="{{ $product->name }}">
            <h5>{{ $product->name }}</h5>
            <p><strong>Kategori:</strong> {{ $product->category }}</p>
            <p><strong>Deskripsi:</strong> {{ $product->description }}</p>
            <p><strong>Stok:</strong> {{ $product->stock }}</p>
            <p><strong>Harga:</strong> Rp{{ number_format($product->sell_price, 0, ',', '.') }}</p>
            <p><strong>Harga Modal:</strong> Rp{{ number_format($product->cost_price, 0, ',', '.') }}</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-xl text-smbtn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>


<!-- Tambahkan sebelum </body> -->
