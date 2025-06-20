        @livewire('cart-dropdown')
        <div class="relative inline-block text-left">
            @auth
          <button onclick="toggleDropdown()" class="flex items-center space-x-2 bg-gray-100 hover:bg-gray-200 text-gray-800 px-4 py-2 rounded-lg focus:outline-none">
            <i data-feather="shopping-cart" class="w-5 h-5"></i>
            <span>Cart</span>
          </button>

          <div id="dropdownCart" class="hidden absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-lg z-50">
            <div class="p-4 text-sm text-gray-700">
              <p class="font-semibold">Keranjang</p>

              @php $total = 0; @endphp
              @if(session('cart') && count(session('cart')) > 0)
              <ul class="mt-2 space-y-2 max-h-48 overflow-y-auto">
                @foreach(session('cart') as $id => $item)
                  @php
                    $subtotal = $item['sell_price'] * $item['quantity'];
                    $total += $subtotal;
                  @endphp
                  <li class="flex flex-col space-y-1 border-b pb-2">
                    <div class="flex justify-between items-center text-sm">
                      <span class="truncate w-32 font-medium">{{ $item['name'] }}</span>
                      <span class="text-green-600 font-semibold">Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                      <div class="flex items-center gap-1">
                        <form action="{{ route('cart.decrement', $id) }}" method="POST">
                          @csrf
                          <button type="submit" class="bg-gray-300 text-gray-800 w-6 h-6 rounded-full text-xs font-bold leading-none hover:bg-gray-400" {{ $item['quantity'] <= 1 ? 'disabled' : '' }}>-</button>
                        </form>
                        <span class="text-sm font-medium w-6 text-center">{{ $item['quantity'] }}</span>
                        <form action="{{ route('cart.increment', $id) }}" method="POST">
                          @csrf
                          <button type="submit" class="bg-gray-300 text-gray-800 w-6 h-6 rounded-full text-xs font-bold leading-none hover:bg-gray-400">+</button>
                        </form>
                      </div>
                      <form method="POST" action="{{ route('cart.remove', $id) }}">
                        @csrf
                        <button class="text-red-500 text-xs hover:underline">Hapus</button>
                      </form>
                    </div>
                  </li>
                @endforeach
              </ul>
              <hr class="my-3">
              <div class="flex justify-between items-center font-semibold">
                <span>Total</span>
                <span class="text-green-700">Rp{{ number_format($total, 0, ',', '.') }}</span>
              </div>
              <a href="{{ route('cart.index') }}" class="mt-3 block bg-blue-500 hover:bg-blue-600 text-white text-center py-2 rounded-lg text-sm">
                Lihat Keranjang
              </a>
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Checkout</button>
            </form>
              @else
              <p class="text-sm text-gray-500 mt-3">Keranjang kosong.</p>
              @endif
            </div>
          </div>
        </div>
        @endauth
