<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Support\Facades\Auth;

class CartButtonDropdown extends Component
{
    public $cart = [];
    public $isOpen = false;
    public $showConfirmModal = false;
    public $showCheckoutConfirm = false;
    public $itemToDelete = null;
    public $metodePembayaran = '';

    public function mount()
    {
        $this->cart = session()->get('cart', []);
    }

    public function toggleDropdown()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function increment($id)
    {
        if (isset($this->cart[$id])) {
            $this->cart[$id]['quantity']++;
            session()->put('cart', $this->cart);
        }
    }

    public function decrement($id)
    {
        if (isset($this->cart[$id]) && $this->cart[$id]['quantity'] > 1) {
            $this->cart[$id]['quantity']--;
            session()->put('cart', $this->cart);
        }
    }

    public function confirmDelete($id)
    {
        $this->itemToDelete = $id;
        $this->showConfirmModal = true;
    }

    public function cancelDelete()
    {
        $this->itemToDelete = null;
        $this->showConfirmModal = false;
    }

    public function deleteConfirmed()
    {
        if ($this->itemToDelete !== null && isset($this->cart[$this->itemToDelete])) {
            unset($this->cart[$this->itemToDelete]);
            session()->put('cart', $this->cart);
        }

        $this->itemToDelete = null;
        $this->showConfirmModal = false;
    }
    public function konfirmasiCheckout()
    {
        $this->showCheckoutConfirm = true;
    }
public function checkout()
{
    $this->validate([
        'metodePembayaran' => 'required|in:COD,Transfer Bank,E-Wallet',
    ], [
        'metodePembayaran.required' => 'Silakan pilih metode pembayaran.',
    ]);

    if (count($this->cart) == 0) {
        session()->flash('error', 'Keranjang kosong.');
        return;
    }

    $total = 0;
    foreach ($this->cart as $item) {
        $total += $item['sell_price'] * $item['quantity'];
    }

    $transaction = Transaction::create([
        'kode_transaksi'    => 'TRX' . now()->format('YmdHis'),
        'total'             => $total,
        'user_id'           => Auth::id(),
        'metode_pembayaran' => $this->metodePembayaran, // pastikan kolom ini ada
    ]);

    foreach ($this->cart as $item) {
        TransactionItem::create([
            'transaction_id' => $transaction->id,
            'product_name'   => $item['name'],
            'quantity'       => $item['quantity'],
            'sell_price'     => $item['sell_price'],
            'cost_price'     => $item['cost_price'] ?? 0,
            'profit'         => $item['profit'] ?? 0,
        ]);
    }

    session()->forget('cart');
    $this->cart = [];
    $this->metodePembayaran = ''; // reset
    $this->showCheckoutConfirm = false;
    session()->flash('success', 'Checkout berhasil!');
}


    public function render()
    {
        return view('livewire.cart-button-dropdown');
    }
}
