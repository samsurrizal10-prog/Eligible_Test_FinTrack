
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budgets - FinTrack</title>

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

        .menu a, .menu .disabled {
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

        .disabled {
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

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .page-heading h1 {
            margin: 0 0 8px;
            font-size: 26px;
        }

        .page-heading p {
            margin: 0;
            color: #64748b;
            font-size: 14px;
        }

        .button {
            border: none;
            border-radius: 8px;
            padding: 12px 18px;
            background: #2563eb;
            color: white;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            font-size: 13px;
        }

        .button:hover {
            background: #1d4ed8;
        }

        .button-secondary {
            background: #64748b;
        }

        .button-danger {
            background: #dc2626;
        }

        .filter, .card, .table-section {
            background: white;
            border: 1px solid #edf0f5;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.035);
        }

        .filter {
            padding: 20px;
            margin-bottom: 22px;
            display: flex;
            align-items: end;
            gap: 15px;
            flex-wrap: wrap;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
            flex: 1;
            min-width: 130px;
        }

        label {
            font-size: 13px;
            font-weight: bold;
            color: #475569;
        }

        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 14px;
            background: white;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 25px;
        }

        .card {
            padding: 23px;
        }

        .card-label {
            color: #64748b;
            font-size: 13px;
            margin-bottom: 14px;
        }

        .card-value {
            font-size: 23px;
            font-weight: bold;
            color: #2563eb;
        }

        .table-section {
            padding: 25px;
        }

        .table-section h3 {
            margin: 0 0 20px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        th, td {
            padding: 15px 12px;
            text-align: left;
            border-bottom: 1px solid #edf0f5;
            font-size: 13px;
        }

        th {
            color: #64748b;
            font-size: 12px;
        }

        .progress {
            height: 8px;
            background: #e2e8f0;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 7px;
            min-width: 90px;
        }

        .progress-bar {
            height: 100%;
            border-radius: 10px;
            background: #2563eb;
        }

        .status {
            font-weight: bold;
            font-size: 12px;
        }

        .status.safe {
            color: #16a34a;
        }

        .status.warning {
            color: #d97706;
        }

        .status.over {
            color: #dc2626;
        }

        .actions {
            display: flex;
            gap: 7px;
        }

        .small-button {
            padding: 8px 11px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            color: white;
            font-size: 12px;
        }

        .edit-button {
            background: #2563eb;
        }

        .delete-button {
            background: #dc2626;
        }

        .empty {
            text-align: center;
            color: #64748b;
            padding: 35px;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
        }

        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(15,23,42,0.55);
            justify-content: center;
            align-items: center;
            padding: 20px;
            z-index: 100;
        }

        .modal-content {
            background: white;
            padding: 28px;
            border-radius: 14px;
            width: 100%;
            max-width: 480px;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-content h2 {
            margin-top: 0;
        }

        .modal-content .form-group {
            margin-bottom: 17px;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 22px;
        }

        @media(max-width: 900px) {
            .cards {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media(max-width: 650px) {
            .layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                padding: 18px;
            }

            .logo {
                padding: 0 5px 18px;
            }

            .menu {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 5px;
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

            .page-heading {
                align-items: flex-start;
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
            <a href="{{ route('dashboard') }}">
                <span>▦</span> Dashboard
            </a>

            <a href="{{ route('transactions.index') }}">
                <span>↗</span> Transactions
            </a>

            <a href="{{ route('categories.index') }}">
                <span>▤</span> Categories
            </a>

            <a href="{{ route('budgets.index') }}" class="active">
                <span>◷</span> Budgets
            </a>

            <a href="{{ route('savings-goals.index') }}">
                <span>◎</span> Savings Goals
            </a>
        </nav>

        <div class="sidebar-bottom">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout">Logout</button>
            </form>
        </div>
    </aside>

    <main class="main">

        <header class="topbar">
            <h2>Budgets</h2>
            <span>{{ $userName ?? auth()->user()->name }}</span>
        </header>

        <div class="content">

            <div class="page-heading">
                <div>
                    <h1>Monthly Budgets</h1>
                    <p>Plan and monitor your monthly expenses.</p>
                </div>

                <button class="button" onclick="openAddModal()">
                    + Add Budget
                </button>
            </div>

            @if(session('success'))
                <div class="alert success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert error">
                    <strong>Please check the following:</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('budgets.index') }}" method="GET" class="filter">

                <div class="form-group">
                    <label for="month">Month</label>
                    <select name="month" id="month">
                        @foreach(range(1, 12) as $m)
                            <option value="{{ $m }}" {{ (int)$month === $m ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::create()->month($m)->format('F') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="number" name="year" id="year"
                           value="{{ $year }}" min="2020" max="2100">
                </div>

                <button type="submit" class="button">Apply Filter</button>
            </form>

            <section class="cards">

                <div class="card">
                    <div class="card-label">Total Budget</div>
                    <div class="card-value">
                        Rp {{ number_format($totalBudget, 0, ',', '.') }}
                    </div>
                </div>

                <div class="card">
                    <div class="card-label">Total Spent</div>
                    <div class="card-value" style="color:#dc2626;">
                        Rp {{ number_format($totalSpent, 0, ',', '.') }}
                    </div>
                </div>

                <div class="card">
                    <div class="card-label">Budget Remaining</div>
                    <div class="card-value" style="color:#16a34a;">
                        Rp {{ number_format($totalBudget - $totalSpent, 0, ',', '.') }}
                    </div>
                </div>

            </section>

            <section class="table-section">
                <h3>Budget Overview</h3>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Budget</th>
                                <th>Spent</th>
                                <th>Remaining</th>
                                <th>Usage</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($budgets as $budget)

                                @php
                                    $percentage = $budget->amount > 0
                                        ? ($budget->spent / $budget->amount) * 100
                                        : 0;

                                    $status = $percentage > 100
                                        ? 'over'
                                        : ($percentage >= 80 ? 'warning' : 'safe');
                                @endphp

                                <tr>
                                    <td>
                                        <strong>{{ $budget->category->name ?? 'Unknown' }}</strong>
                                    </td>

                                    <td>
                                        Rp {{ number_format($budget->amount, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        Rp {{ number_format($budget->spent, 0, ',', '.') }}
                                    </td>

                                    <td style="font-weight:bold; color:{{ $budget->remaining > 0 ? '#16a34a' : '#dc2626' }};">
                                        Rp {{ number_format($budget->remaining, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        {{ number_format($percentage, 1) }}%

                                        <div class="progress">
                                            <div class="progress-bar"
                                                 style="width:{{ min(100, $percentage) }}%; background:{{ $status === 'over' ? '#dc2626' : ($status === 'warning' ? '#d97706' : '#2563eb') }};">
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        @if($status === 'over')
                                            <span class="status over">Over Budget</span>
                                        @elseif($status === 'warning')
                                            <span class="status warning">Almost Used</span>
                                        @else
                                            <span class="status safe">On Track</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="actions">
                                            <button
                                                type="button"
                                                class="small-button edit-button"
                                                onclick="openEditModal(
                                                    {{ $budget->id }},
                                                    {{ $budget->category_id }},
                                                    '{{ $budget->amount }}',
                                                    {{ $budget->month }},
                                                    {{ $budget->year }}
                                                )">
                                                Edit
                                            </button>

                                            <form action="{{ route('budgets.destroy', $budget->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Delete this budget?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="small-button delete-button">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="7" class="empty">
                                        No budgets found for this month.
                                        Click Add Budget to create one.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>

        </div>
    </main>
</div>

<!-- Add Budget Modal -->
<div class="modal" id="addModal">
    <div class="modal-content">
        <h2>Add New Budget</h2>

        <form action="{{ route('budgets.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="add_category_id">Expense Category</label>
                <select name="category_id" id="add_category_id" required>
                    <option value="">Select Category</option>

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="add_amount">Budget Amount (Rp)</label>
                <input type="number" name="amount" id="add_amount"
                       min="0.01" step="0.01" required>
            </div>

            <input type="hidden" name="month" value="{{ $month }}">
            <input type="hidden" name="year" value="{{ $year }}">

            <div class="modal-actions">
                <button type="button" class="button button-secondary"
                        onclick="closeModal('addModal')">
                    Cancel
                </button>

                <button type="submit" class="button">
                    Save Budget
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Budget Modal -->
<div class="modal" id="editModal">
    <div class="modal-content">
        <h2>Edit Budget</h2>

        <form id="editForm" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="edit_category_id">Expense Category</label>
                <select name="category_id" id="edit_category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="edit_amount">Budget Amount (Rp)</label>
                <input type="number" name="amount" id="edit_amount"
                       min="0.01" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="edit_month">Month</label>
                <select name="month" id="edit_month" required>
                    @foreach(range(1, 12) as $m)
                        <option value="{{ $m }}">
                            {{ \Carbon\Carbon::create()->month($m)->format('F') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="edit_year">Year</label>
                <input type="number" name="year" id="edit_year"
                       min="2020" max="2100" required>
            </div>

            <div class="modal-actions">
                <button type="button" class="button button-secondary"
                        onclick="closeModal('editModal')">
                    Cancel
                </button>

                <button type="submit" class="button">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openAddModal() {
        document.getElementById('addModal').style.display = 'flex';
    }

    function openEditModal(id, categoryId, amount, month, year) {
        document.getElementById('editForm').action = '/budgets/' + id;
        document.getElementById('edit_category_id').value = categoryId;
        document.getElementById('edit_amount').value = amount;
        document.getElementById('edit_month').value = month;
        document.getElementById('edit_year').value = year;

        document.getElementById('editModal').style.display = 'flex';
    }

    function closeModal(id) {
        document.getElementById(id).style.display = 'none';
    }

    window.onclick = function(event) {
        if (event.target.classList.contains('modal')) {
            event.target.style.display = 'none';
        }
    };
</script>

</body>
</html>
