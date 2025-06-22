<div class="relative inline-block text-left">
    <button wire:click="toggleDropdown" class="bg-gray-800 text-white px-4 py-2 rounded">
        Keranjang
    </button>

    @if($isOpen)
        <div class="absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-lg z-50">
            <div class="p-4 text-sm text-gray-700">
                <p class="font-semibold">Keranjang</p>

                @if(count($cart) > 0)
                    <ul class="mt-2 space-y-2 max-h-48 overflow-y-auto">
                        @foreach($cart as $id => $item)
                            <li wire:key="cart-item-{{ $id }}" class="flex justify-between items-center border-b pb-2">
                                <span>{{ $item['name'] }} (x{{ $item['quantity'] }})</span>
                                <div class="flex items-center gap-1">
                                    <button wire:click="decrement('{{ $id }}')" class="px-2 bg-gray-200 rounded">-</button>
                                    <button wire:click="increment('{{ $id }}')" class="px-2 bg-gray-200 rounded">+</button>
                                    <button wire:click="confirmDelete('{{ $id }}')" class="text-red-600 text-xs">hapus</button>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    {{-- Pilih Metode Pembayaran --}}
                    <div class="mt-4">
                        <label class="block text-sm font-semibold mb-1">Metode Pembayaran</label>
                        <select wire:model="metodePembayaran" class="w-full border-gray-300 rounded p-1">
                            <option value="">-- Pilih --</option>
                            <option value="COD">Cash on Delivery</option>
                            <option value="Transfer Bank">Transfer Bank</option>
                            <option value="E-Wallet">E-Wallet</option>
                        </select>
                        @error('metodePembayaran')
                            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tombol Buka Modal Konfirmasi Checkout --}}
                    <button wire:click="konfirmasiCheckout" class="mt-4 w-full bg-green-600 text-white py-2 rounded">
                        Checkout
                    </button>
                @else
                    <p class="text-sm text-gray-500 mt-3">Keranjang kosong.</p>
                @endif
            </div>
        </div>
    @endif

    {{-- Modal Konfirmasi Hapus --}}
    @if($showConfirmModal)
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-80">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Konfirmasi Hapus</h2>
            <p class="text-sm text-gray-700 mb-6">Apakah kamu yakin ingin menghapus item ini dari keranjang?</p>
            <div class="flex justify-end gap-3">
                <button wire:click="cancelDelete" class="px-4 py-2 text-sm bg-gray-200 rounded hover:bg-gray-300">Batal</button>
                <button wire:click="deleteConfirmed" class="px-4 py-2 text-sm bg-red-600 text-white rounded hover:bg-red-700">Hapus</button>
            </div>
        </div>
    </div>
    @endif

    {{-- Modal Konfirmasi Checkout --}}
    @if($showCheckoutConfirm)
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-80">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Konfirmasi Checkout</h2>
            <p class="text-sm text-gray-700 mb-6">Apakah kamu yakin ingin checkout dengan metode <strong>{{ $metodePembayaran }}</strong>?</p>
            <div class="flex justify-end gap-3">
                <button wire:click="$set('showCheckoutConfirm', false)" class="px-4 py-2 text-sm bg-gray-200 rounded hover:bg-gray-300">Batal</button>
                <button wire:click="checkout" class="px-4 py-2 text-sm bg-green-600 text-white rounded hover:bg-green-700">Checkout</button>
            </div>
        </div>
    </div>
    @endif
</div>
