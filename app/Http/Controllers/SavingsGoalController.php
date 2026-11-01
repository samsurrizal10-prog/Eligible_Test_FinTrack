<?php

namespace App\Http\Controllers;

use App\Models\SavingsGoal;
use Illuminate\Http\Request;

class SavingsGoalController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $goals = $user->savingsGoals()
            ->latest()
            ->paginate(10);

        $totalGoals = $user->savingsGoals()->count();

        $totalTarget = $user->savingsGoals()
            ->sum('target_amount');

        $totalSaved = $user->savingsGoals()
            ->sum('current_amount');

        $completedGoals = $user->savingsGoals()
            ->where('status', 'completed')
            ->count();

        return view('savings-goals.index', compact(
            'goals',
            'totalGoals',
            'totalTarget',
            'totalSaved',
            'completedGoals'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'target_amount' => 'required|numeric|min:0.01',
            'current_amount' => 'nullable|numeric|min:0',
            'target_date' => 'nullable|date|after_or_equal:today',
        ]);

        $currentAmount = $validated['current_amount'] ?? 0;

        $validated['current_amount'] = $currentAmount;
        $validated['status'] = $currentAmount >= $validated['target_amount']
            ? 'completed'
            : 'active';

        $request->user()->savingsGoals()->create($validated);

        return redirect()->route('savings-goals.index')
            ->with('success', 'Savings goal created successfully!');
    }

    public function update(Request $request, $id)
    {
        $goal = $request->user()->savingsGoals()->findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'target_amount' => 'required|numeric|min:0.01',
            'current_amount' => 'required|numeric|min:0',
            'target_date' => 'nullable|date|after_or_equal:today',
        ]);

        $validated['status'] = $validated['current_amount'] >= $validated['target_amount']
            ? 'completed'
            : 'active';

        $goal->update($validated);

        return redirect()->route('savings-goals.index')
            ->with('success', 'Savings goal updated successfully!');
    }

    public function destroy(Request $request, $id)
    {
        $goal = $request->user()->savingsGoals()->findOrFail($id);

        $goal->delete();

        return redirect()->route('savings-goals.index')
            ->with('success', 'Savings goal deleted successfully!');
    }
}