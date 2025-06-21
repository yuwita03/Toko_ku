<!-- Product Grid Section -->
<div class="max-w-7xl mx-auto px-4 py-8">
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

          <a href="{{ route('products.show', $product->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded-xl text-sm font-semibold">
            Detail
          </a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
