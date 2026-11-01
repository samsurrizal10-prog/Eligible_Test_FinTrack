<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $transactions = $user->transactions()
            ->with('category')
            ->orderByDesc('transaction_date')
            ->orderByDesc('id')
            ->paginate(10);

        $totalIncome = $user->transactions()
            ->where('type', 'income')
            ->sum('amount');

        $totalExpense = $user->transactions()
            ->where('type', 'expense')
            ->sum('amount');

        $balance = $totalIncome - $totalExpense;

        $categories = $user->categories()
            ->orderBy('name')
            ->get();

        return view('transactions.index', compact(
            'transactions',
            'categories',
            'totalIncome',
            'totalExpense',
            'balance'
        ));
    }

    public function store(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'category_id' => [
                'required',
                Rule::exists('categories', 'id')
                    ->where('user_id', $user->id)
                    ->where('type', $request->input('type')),
            ],
            'type' => ['required', Rule::in(['income', 'expense'])],
            'title' => ['required', 'string', 'max:150'],
            'amount' => ['required', 'numeric', 'min:0.01'],
            'description' => ['nullable', 'string'],
            'transaction_date' => ['required', 'date'],
        ]);

        $user->transactions()->create($validated);

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transaction added successfully.');
    }

    public function update(Request $request, int $id)
    {
        $user = $request->user();

        $transaction = $user->transactions()->findOrFail($id);

        $validated = $request->validate([
            'category_id' => [
                'required',
                Rule::exists('categories', 'id')
                    ->where('user_id', $user->id)
                    ->where('type', $request->input('type')),
            ],
            'type' => ['required', Rule::in(['income', 'expense'])],
            'title' => ['required', 'string', 'max:150'],
            'amount' => ['required', 'numeric', 'min:0.01'],
            'description' => ['nullable', 'string'],
            'transaction_date' => ['required', 'date'],
        ]);

        $transaction->update($validated);

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Request $request, int $id)
    {
        $transaction = $request->user()
            ->transactions()
            ->findOrFail($id);

        $transaction->delete();

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transaction deleted successfully.');
    }
}
