<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\User;

class TransactionController extends Controller
{
public function index(Request $request)
{
    $query = \App\Models\Transaction::with('items')->where('user_id', Auth::id());

    // Tambahkan pencarian jika ada input
    if ($request->search) {
        $query->where('kode_transaksi', 'like', '%'.$request->search.'%');
    }

    $transactions = $query->latest()->get();
    $totalTransactions = $transactions->count();

    // return view('transactions.index', compact('transactions', 'totalTransactions'));
    return view('user_panel.transaction.history_transaction', compact('transactions', 'totalTransactions'));
}
// Menampilkan semua transaksi untuk admin
public function all(Request $request)
{
    $query = Transaction::with('user', 'items');

    if ($request->search) {
        $query->where('kode_transaksi', 'like', '%'.$request->search.'%');
    }
    $transactions = $query->latest()->get();
    $totalTransactions = $transactions->count();

    return view('transactions.index', compact('transactions','totalTransactions'));
}

}
