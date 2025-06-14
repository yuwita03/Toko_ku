<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
public function index(Request $request)
{
    $query = \App\Models\Transaction::with('items');

    // Tambahkan pencarian jika ada input
    if ($request->search) {
        $query->where('kode_transaksi', 'like', '%'.$request->search.'%');
    }

    $transactions = $query->latest()->get();
    $totalTransactions = $transactions->count();

    return view('transactions.index', compact('transactions', 'totalTransactions'));
}
}
