<?php

use App\Http\Controllers\SavingsGoalController;
use App\Http\Controllers\BudgetController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;

// Halaman utama
Route::get('/', function () {
    return redirect()->route('register');
});

// Register
Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.store');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.store');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// CRUD untuk user yang sudah login
Route::middleware('auth')->group(function () {

    // Categories
    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('categories.index');

    Route::post('/categories', [CategoryController::class, 'store'])
        ->name('categories.store');

    Route::put('/categories/{id}', [CategoryController::class, 'update'])
        ->name('categories.update');

    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])
        ->name('categories.destroy');

    // Transactions
    Route::get('/transactions', [TransactionController::class, 'index'])
        ->name('transactions.index');

    Route::post('/transactions', [TransactionController::class, 'store'])
        ->name('transactions.store');

    Route::put('/transactions/{id}', [TransactionController::class, 'update'])
        ->name('transactions.update');

    Route::delete('/transactions/{id}', [TransactionController::class, 'destroy'])
        ->name('transactions.destroy');

    // Budgets
    Route::get('/budgets', [BudgetController::class, 'index'])
        ->name('budgets.index');

    Route::post('/budgets', [BudgetController::class, 'store'])
        ->name('budgets.store');

    Route::put('/budgets/{id}', [BudgetController::class, 'update'])
        ->name('budgets.update');

    Route::delete('/budgets/{id}', [BudgetController::class, 'destroy'])
        ->name('budgets.destroy');

    // Savings Goals
    Route::get('/savings-goals', [SavingsGoalController::class, 'index'])
        ->name('savings-goals.index');

    Route::post('/savings-goals', [SavingsGoalController::class, 'store'])
        ->name('savings-goals.store');

    Route::put('/savings-goals/{id}', [SavingsGoalController::class, 'update'])
        ->name('savings-goals.update');

    Route::delete('/savings-goals/{id}', [SavingsGoalController::class, 'destroy'])
        ->name('savings-goals.destroy');
});
