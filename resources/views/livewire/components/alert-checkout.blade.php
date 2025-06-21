<!-- Tombol Checkout -->
<button onclick="document.getElementById('checkoutModal').classList.remove('hidden')"
        class="mt-4 w-full bg-green-600 text-white py-2 rounded">
    Checkout
</button>

<!-- Modal Konfirmasi Checkout -->
<div id="checkoutModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-80">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Konfirmasi Checkout</h2>
        <p class="text-sm text-gray-700 mb-6">Apakah kamu yakin ingin melanjutkan proses checkout?</p>
        <div class="flex justify-end gap-3">
            <button onclick="document.getElementById('checkoutModal').classList.add('hidden')"
                    class="px-4 py-2 text-sm bg-gray-200 rounded hover:bg-gray-300">
                Batal
            </button>
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-2 text-sm bg-green-600 text-white rounded hover:bg-green-700">
                    Ya, Checkout
                </button>
            </form>
        </div>
    </div>
</div>

