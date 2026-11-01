<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Budget;

class BudgetController extends Controller
{
    // Menampilkan daftar budget
    public function index(Request $request)
    {
        $user = $request->user();

        $month = (int) $request->input('month', now()->month);
        $year = (int) $request->input('year', now()->year);

        $budgets = $user->budgets()
            ->with('category')
            ->where('month', $month)
            ->where('year', $year)
            ->orderBy('id', 'desc')
            ->get();

        $categories = $user->categories()
            ->where('type', 'expense')
            ->orderBy('name')
            ->get();

        $totalBudget = $budgets->sum('amount');

        $totalSpent = 0;

        foreach ($budgets as $budget) {
            $spent = $user->transactions()
                ->where('category_id', $budget->category_id)
                ->where('type', 'expense')
                ->whereMonth('transaction_date', $month)
                ->whereYear('transaction_date', $year)
                ->sum('amount');

            $budget->spent = $spent;
            $budget->remaining = max(0, $budget->amount - $spent);
            $budget->percentage = $budget->amount > 0
                ? min(100, ($spent / $budget->amount) * 100)
                : 0;

            $totalSpent += $spent;
        }

        return view('budgets.index', compact(
            'budgets',
            'categories',
            'month',
            'year',
            'totalBudget',
            'totalSpent'
        ));
    }

    // Menambahkan budget
    public function store(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'category_id' => [
                'required',
                Rule::exists('categories', 'id')
                    ->where('user_id', $user->id)
                    ->where('type', 'expense'),
            ],
            'amount' => ['required', 'numeric', 'min:0.01'],
            'month' => ['required', 'integer', 'between:1,12'],
            'year' => ['required', 'integer', 'min:2020', 'max:2100'],
        ]);

        $user->budgets()->create($validated);

        return redirect()
            ->route('budgets.index')
            ->with('success', 'Budget added successfully.');
    }

    // Mengedit budget
    public function update(Request $request, int $id)
    {
        $user = $request->user();

        $budget = $user->budgets()->findOrFail($id);

        $validated = $request->validate([
            'category_id' => [
                'required',
                Rule::exists('categories', 'id')
                    ->where('user_id', $user->id)
                    ->where('type', 'expense'),
            ],
            'amount' => ['required', 'numeric', 'min:0.01'],
            'month' => ['required', 'integer', 'between:1,12'],
            'year' => ['required', 'integer', 'min:2020', 'max:2100'],
        ]);

        $budget->update($validated);

        return redirect()
            ->route('budgets.index', [
                'month' => $validated['month'],
                'year' => $validated['year'],
            ])
            ->with('success', 'Budget updated successfully.');
    }

    // Menghapus budget
    public function destroy(Request $request, int $id)
    {
        $budget = $request->user()
            ->budgets()
            ->findOrFail($id);

        $budget->delete();

        return redirect()
            ->route('budgets.index')
            ->with('success', 'Budget deleted successfully.');
    }
}
