<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $cart = session('cart');
        if (!$cart || count($cart) == 0) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong.');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['sell_price'] * $item['quantity'];
        }

        $transaction = \App\Models\Transaction::create([
            'kode_transaksi' => 'TRX' . Carbon::now('Asia/Jakarta')->format('YmdHis'),
            'total' => $total,
            'user_id' => Auth::id(),
        ]);

        foreach ($cart as $item) {
            \App\Models\TransactionItem::create([
                'user_id'        => Auth::id(),
                'transaction_id' => $transaction->id,
                'product_name'   => $item['name'],
                'quantity'       => $item['quantity'],
                'sell_price'     => $item['sell_price'],
                'cost_price'     => $item['cost_price'] ?? 0,
                'profit'         => $item['profit'] ?? 0,
            ]);
        }

        session()->forget('cart');
        return redirect()->route('transactions.index')->with('success', 'Checkout berhasil!');
    }
}
