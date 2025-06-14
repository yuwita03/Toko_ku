<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

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
            'kode_transaksi' => 'TRX' . time(),
            'total' => $total,
        ]);

        foreach ($cart as $item) {
            \App\Models\TransactionItem::create([
                'transaction_id' => $transaction->id,
                'product_name' => $item['name'],
                'quantity' => $item['quantity'],
                'price' => $item['sell_price'],
            ]);
        }

        session()->forget('cart');
        return redirect()->route('transaksi.index')->with('success', 'Checkout berhasil!');
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "sell_price" => $product->sell_price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$id])){
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.index');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.index');
    }

    public function increment($id)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }

    public function decrement($id)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$id]) && $cart[$id]['quantity'] > 1) {
            $cart[$id]['quantity']--;
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }
}
