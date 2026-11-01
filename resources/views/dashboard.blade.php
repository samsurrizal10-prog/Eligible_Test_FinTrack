<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - FinTrack</title>


<style>
* {
box-sizing: border-box;
font-family: Arial, sans-serif;
}

body {
margin: 0;
background: #f4f6fb;
color: #1e293b;
}

.layout {
display: flex;
min-height: 100vh;
}

.sidebar {
width: 250px;
height: 100vh;
position: sticky;
top: 0;
background: #111827;
color: white;
padding: 28px 18px;
display: flex;
flex-direction: column;
flex-shrink: 0;
}

.logo {
font-size: 25px;
font-weight: bold;
padding: 0 14px 35px;
color: #60a5fa;
}

.menu-label {
color: #94a3b8;
font-size: 11px;
font-weight: bold;
letter-spacing: 1.5px;
padding: 0 14px;
margin-bottom: 12px;
}

.menu a,
.menu .disabled {
display: flex;
align-items: center;
gap: 12px;
padding: 13px 14px;
margin-bottom: 7px;
border-radius: 9px;
color: #cbd5e1;
text-decoration: none;
font-size: 14px;
}

.menu a:hover {
background: #263449;
color: white;
}

.menu a.active {
background: #2563eb;
color: white;
}

.menu .disabled {
opacity: 0.45;
cursor: not-allowed;
}

.coming {
margin-left: auto;
font-size: 9px;
color: #94a3b8;
}

.sidebar-bottom {
margin-top: auto;
padding-top: 25px;
}

.logout {
width: 100%;
border: none;
border-radius: 9px;
padding: 13px;
background: #7f1d1d;
color: white;
font-weight: bold;
cursor: pointer;
}

.logout:hover {
background: #dc2626;
}

.main {
flex: 1;
min-width: 0;
}

.topbar {
background: white;
padding: 22px 35px;
display: flex;
justify-content: space-between;
align-items: center;
box-shadow: 0 2px 10px rgba(0,0,0,0.04);
}

.topbar h2 {
margin: 0;
font-size: 20px;
}

.topbar span {
color: #64748b;
font-size: 13px;
}

.content {
padding: 35px;
max-width: 1300px;
margin: auto;
}

.welcome {
background: linear-gradient(120deg, #2563eb, #6366f1);
color: white;
padding: 35px;
border-radius: 18px;
margin-bottom: 28px;
box-shadow: 0 10px 25px rgba(37,99,235,0.15);
}

.welcome h1 {
margin: 0 0 12px;
font-size: 27px;
}

.welcome p {
margin: 0;
color: #dbeafe;
line-height: 1.6;
}

.section-title {
font-size: 19px;
margin: 0 0 18px;
}

.cards {
display: grid;
grid-template-columns: repeat(4, minmax(0, 1fr));
gap: 18px;
}

.card {
background: white;
padding: 24px;
border-radius: 14px;
box-shadow: 0 4px 15px rgba(0,0,0,0.035);
border: 1px solid #edf0f5;
}

.card-label {
color: #64748b;
font-size: 13px;
margin-bottom: 15px;
}

.card-value {
font-size: 24px;
font-weight: bold;
color: #2563eb;
}

.quick-section {
margin-top: 30px;
background: white;
border-radius: 14px;
padding: 25px;
border: 1px solid #edf0f5;
}

.quick-section p {
color: #64748b;
font-size: 14px;
line-height: 1.7;
}

.quick-link {
display: inline-block;
margin-top: 8px;
background: #2563eb;
color: white;
padding: 11px 18px;
border-radius: 8px;
text-decoration: none;
font-size: 13px;
font-weight: bold;
}

.quick-link:hover {
background: #1d4ed8;
}

@media (max-width: 1000px) {
.cards {
grid-template-columns: repeat(2, minmax(0, 1fr));
}
}

@media (max-width: 650px) {
.layout {
flex-direction: column;
}

.sidebar {
width: 100%;
height: auto;
position: static;
}

.logo {
padding: 0 5px 18px;
}

.menu {
display: grid;
grid-template-columns: repeat(2, minmax(0, 1fr));
gap: 5px;
}

.menu-label {
margin-top: 10px;
}

.sidebar-bottom {
margin-top: 15px;
}

.topbar {
padding: 18px;
}

.content {
padding: 20px;
}

.cards {
grid-template-columns: 1fr;
}

.welcome {
padding: 25px;
}
}
</style>

</head>


<body>


<div class="layout">


<aside class="sidebar">

<div class="logo">FinTrack.</div>

<div class="menu-label">MAIN MENU</div>

<nav class="menu">

<a href="{{ route('dashboard') }}" class="active">
    <span>▦</span> Dashboard
</a>

<a href="{{ route('transactions.index') }}">
    <span>↗</span> Transactions
</a>

<a href="{{ route('categories.index') }}">
    <span>▤</span> Categories
</a>

<a href="{{ route('budgets.index') }}">
    <span>◷</span> Budgets
</a>

<a href="{{ route('savings-goals.index') }}">
    <span>◎</span> Savings Goals
</a>

</nav>

<div class="sidebar-bottom">
<form action="{{ route('logout') }}" method="POST">
@csrf
<button type="submit" class="logout">
Logout
</button>
</form>
</div>

</aside>

<main class="main">

<header class="topbar">
<h2>Dashboard</h2>
<span>{{ $user->name }}</span>
</header>

<div class="content">

<section class="welcome">
<h1>Welcome back, {{ $user->name }}!</h1>
<p>
Manage your personal finances smarter with FinTrack.
Keep track of your income, expenses, budgets, and savings.
</p>
</section>

<h3 class="section-title">Financial Overview</h3>


<section class="cards">

    <div class="card">
        <div class="card-label">Total Income</div>
        <div class="card-value">
            Rp {{ number_format($totalIncome, 0, ',', '.') }}
        </div>
    </div>

    <div class="card">
        <div class="card-label">Total Expenses</div>
        <div class="card-value">
            Rp {{ number_format($totalExpense, 0, ',', '.') }}
        </div>
    </div>

    <div class="card">
        <div class="card-label">Current Balance</div>
        <div class="card-value">
            Rp {{ number_format($balance, 0, ',', '.') }}
        </div>
    </div>

    <div class="card">
        <div class="card-label">Total Transactions</div>
        <div class="card-value">
            {{ $totalTransactions }} Transactions
        </div>
    </div>

</section>


<section class="quick-section">
    <h3>Recent Transactions</h3>

    @if($recentTransactions->count() > 0)
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                <thead>
                    <tr style="text-align: left; color: #64748b; font-size: 13px; border-bottom: 1px solid #edf0f5;">
                        <th style="padding: 14px 10px;">Title</th>
                        <th style="padding: 14px 10px;">Category</th>
                        <th style="padding: 14px 10px;">Date</th>
                        <th style="padding: 14px 10px;">Type</th>
                        <th style="padding: 14px 10px;">Amount</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($recentTransactions as $transaction)
                        <tr style="border-bottom: 1px solid #edf0f5;">
                            <td style="padding: 14px 10px;">
                                {{ $transaction->title }}
                            </td>

                            <td style="padding: 14px 10px;">
                                {{ $transaction->category->name ?? '-' }}
                            </td>

                            <td style="padding: 14px 10px;">
                                {{ $transaction->transaction_date->format('d M Y') }}
                            </td>

                            <td style="padding: 14px 10px;">
                                {{ ucfirst($transaction->type) }}
                            </td>

                            <td style="padding: 14px 10px; font-weight: bold; color: {{ $transaction->type === 'income' ? '#16a34a' : '#dc2626' }};">
                                {{ $transaction->type === 'income' ? '+' : '-' }}Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p>No transactions found. Start adding your transactions!</p>
    @endif

    <a href="{{ route('transactions.index') }}" class="quick-link">
        View All Transactions →
    </a>
</section>


</div>

</main>

</div>


</body>
</html>