<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- ✅ Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-gray-50 to-gray-100 text-gray-800">

  <div class="max-w-6xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Riwayat Transaksi</h1>

    @if(session('success'))
      <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded relative mb-4 shadow">
        {{ session('success') }}
        <button onclick="this.parentElement.remove()" class="absolute top-1 right-3 text-lg">&times;</button>
      </div>
    @endif

    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
      <form method="GET" class="flex w-full sm:w-auto gap-2">
        <input type="text" name="search" placeholder="Cari Kode Transaksi..." value="{{ request('search') }}"
               class="w-full sm:w-64 px-4 py-2 border border-gray-300 rounded focus:ring focus:ring-blue-200 focus:outline-none">
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Cari</button>
      </form>
      <p class="text-gray-600"><strong>Total Transaksi:</strong> {{ $totalTransactions }}</p>
    </div>

    <div class="overflow-x-auto rounded-lg shadow border border-gray-200 bg-white">
      <table class="min-w-full text-sm text-left">
        <thead class="bg-blue-50 border-b text-blue-700">
          <tr>
            <th class="px-4 py-3">Kode Transaksi</th>
            <th class="px-4 py-3">Total</th>
            <th class="px-4 py-3">Waktu</th>
            <th class="px-4 py-3 text-center">Detail</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @foreach($transactions as $trx)
            <tr class="hover:bg-gray-50">
              <td class="px-4 py-3 font-medium text-gray-700">{{ $trx->kode_transaksi }}</td>
              <td class="px-4 py-3 text-green-600">Rp{{ number_format($trx->total, 0, ',', '.') }}</td>
              <td class="px-4 py-3">{{ $trx->created_at->format('d M Y, H:i') }}</td>
              <td class="px-4 py-3 text-center">
                <button onclick="toggleModal('modal-{{ $trx->id }}')" class="bg-blue-100 text-blue-600 px-3 py-1 rounded hover:bg-blue-200">
                  Lihat
                </button>
              </td>
            </tr>

            <!-- Modal Detail -->
            <div id="modal-{{ $trx->id }}" class="fixed inset-0 hidden bg-black bg-opacity-50 z-50 items-center justify-center">
              <div class="bg-white w-80 rounded-lg shadow-lg p-6 relative animate-fade-in">
                <h2 class="text-xl font-semibold mb-4">Detail Transaksi</h2>
                <ul class="text-gray-700 space-y-2 text-sm">
                  @foreach($trx->items as $item)
                    <li class="flex justify-between">
                      <span>{{ $item->product_name }} (x{{ $item->quantity }})</span>
                      <span class="text-right">Rp{{ number_format($item->sell_price, 0, ',', '.') }}</span>
                    </li>
                  @endforeach
                </ul>
                <div class="text-right mt-6">
                  <button onclick="toggleModal('modal-{{ $trx->id }}')" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded">
                    Tutup
                  </button>
                </div>
              </div>
            </div>
          @endforeach
        </tbody>
      </table>
    </div>
    <form action="{{ route('userpanel') }}">
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mt-2">Kembali</button>
    </form>
  </div>

  <script>
    function toggleModal(id) {
      const modal = document.getElementById(id);
      if (modal.classList.contains('hidden')) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
      } else {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
      }
    }
  </script>

  <style>
    @keyframes fade-in {
      from { opacity: 0; transform: scale(0.95); }
      to { opacity: 1; transform: scale(1); }
    }
    .animate-fade-in {
      animation: fade-in 0.25s ease-out;
    }
  </style>
</body>
</html>
