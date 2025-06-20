   <!-- Product Grid Section -->
    <div class="max-w-2xl mx-auto px-4 py-4">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($products as $product)
        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
          <img src="{{ $product->image ?? 'https://via.placeholder.com/400x300' }}" alt="{{ $product->name }}" class="w-full h-20 object-cover">
          <div class="px-4 py-2">
            <h3 class="text-xl font-semibold text-gray-800 mb-1">{{ $product->name }}</h3>
            <p class="text-sm text-gray-500 mb-2">{{ $product->category }}</p>
            <p class="text-sm text-gray-700 mb-3">{{ $product->description }}</p>
            <p class="text-sm text-gray-700 mb-3">Stok: {{ $product->stock }}</p>
            <p class="text-lg font-bold text-green-600 mb-4">Rp{{ number_format($product->sell_price, 0, ',', '.') }}</p>
            <div class="flex gap-2">
              <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-xl text-sm">
                  Tambah
                </button>
              </form>
              <a href="{{ route('products.show', $product->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl text-sm">
                Detail
              </a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
