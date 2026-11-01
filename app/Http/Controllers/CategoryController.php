<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    // Menampilkan kategori dan statistik milik user
    public function index(Request $request)
    {
        $user = $request->user();

        $categories = $user->categories()
            ->orderBy('type')
            ->orderBy('name')
            ->paginate(10);

        $totalCategories = $user->categories()->count();

        $incomeCategories = $user->categories()
            ->where('type', 'income')
            ->count();

        $expenseCategories = $user->categories()
            ->where('type', 'expense')
            ->count();

        return view('categories.index', compact(
            'categories',
            'totalCategories',
            'incomeCategories',
            'expenseCategories'
        ));
    }

    // Menambahkan kategori
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('categories', 'name')
                    ->where('user_id', $request->user()->id)
                    ->where('type', $request->input('type')),
            ],
            'type' => ['required', Rule::in(['income', 'expense'])],
            'description' => ['nullable', 'string'],
        ]);

        $request->user()->categories()->create($validated);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category added successfully.');
    }

    // Mengedit kategori
    public function update(Request $request, int $id)
    {
        $category = $request->user()
            ->categories()
            ->findOrFail($id);

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('categories', 'name')
                    ->where('user_id', $request->user()->id)
                    ->where('type', $request->input('type'))
                    ->ignore($category->id),
            ],
            'type' => ['required', Rule::in(['income', 'expense'])],
            'description' => ['nullable', 'string'],
        ]);

        $category->update($validated);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    // Menghapus kategori
    public function destroy(Request $request, int $id)
    {
        $category = $request->user()
            ->categories()
            ->findOrFail($id);

        if (
            $category->transactions()->exists() ||
            $category->budgets()->exists()
        ) {
            return redirect()
                ->route('categories.index')
                ->with('error', 'Category cannot be deleted because it is being used.');
        }

        $category->delete();

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
