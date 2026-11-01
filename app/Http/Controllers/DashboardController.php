<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Menampilkan halaman dashboard
    public function index()
    {
        $user = auth()->user();

        // Menghitung total pemasukan
        $totalIncome = $user->transactions()
            ->where('type', 'income')
            ->sum('amount');

        // Menghitung total pengeluaran
        $totalExpense = $user->transactions()
            ->where('type', 'expense')
            ->sum('amount');

        // Menghitung saldo
        $balance = $totalIncome - $totalExpense;

        // Menghitung jumlah transaksi
        $totalTransactions = $user->transactions()->count();

        // Mengambil 5 transaksi terbaru
        $recentTransactions = $user->transactions()
            ->with('category')
            ->orderByDesc('transaction_date')
            ->orderByDesc('id')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'user',
            'totalIncome',
            'totalExpense',
            'balance',
            'totalTransactions',
            'recentTransactions'
        ));
    }
}
