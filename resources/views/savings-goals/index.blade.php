<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Savings Goals | FinTrack</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f8fafc;
            color: #0f172a;
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
            color: #60a5fa;
            padding: 0 14px 35px;
        }

        .menu-label {
            color: #94a3b8;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 1.5px;
            padding: 0 14px;
            margin-bottom: 12px;
        }

        .menu a {
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

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 25px;
        }

        .sidebar-bottom form {
            width: 100%;
        }

        .logout-btn {
            display: block;
            width: 100%;
            border: none;
            border-radius: 9px;
            padding: 13px;
            background: #7f1d1d;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .logout-btn:hover {
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
            box-shadow: 0 2px 10px rgba(0,0,0,.04);
        }

        .welcome h1 {
            font-size: 20px;
        }

        .welcome p {
            color: #64748b;
            font-size: 13px;
            margin-top: 6px;
        }

        .profile {
            font-size: 13px;
            font-weight: bold;
            background: #f8fafc;
            padding: 10px 17px;
            border-radius: 10px;
        }

        .content {
            padding: 35px;
            max-width: 1400px;
            margin: auto;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .page-heading h2 {
            font-size: 22px;
            margin-bottom: 7px;
        }

        .page-heading p {
            color: #64748b;
            font-size: 13px;
        }

        .btn {
            border: none;
            border-radius: 9px;
            padding: 12px 17px;
            cursor: pointer;
            font-weight: bold;
            font-size: 13px;
            text-decoration: none;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
            box-shadow: 0 4px 10px rgba(37,99,235,.2);
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 27px;
        }

        .stat-card {
            background: white;
            padding: 23px;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 12px rgba(15,23,42,.04);
        }

        .stat-card p {
            color: #64748b;
            font-size: 13px;
            margin-bottom: 12px;
        }

        .stat-card h3 {
            font-size: 23px;
            color: #0f172a;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            display: grid;
            place-items: center;
            border-radius: 11px;
            margin-bottom: 16px;
            font-size: 19px;
        }

        .blue { background: #eff6ff; }
        .green { background: #e5f9ef; }
        .purple { background: #f3e8ff; }
        .orange { background: #fff7ed; }

        .content-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(15,23,42,.04);
        }

        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
        }

        .content-header h3 {
            font-size: 17px;
        }

        .content-header p {
            color: #64748b;
            font-size: 12px;
            margin-top: 6px;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        th {
            background: #f8fafc;
            color: #64748b;
            text-align: left;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .6px;
            padding: 15px;
            border-bottom: 1px solid #e2e8f0;
        }

        td {
            padding: 17px 15px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 13px;
            color: #334155;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        .goal-name {
            font-weight: bold;
            color: #0f172a;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            font-size: 11px;
            margin-bottom: 7px;
        }

        .progress-bar {
            height: 8px;
            background: #e2e8f0;
            border-radius: 20px;
            overflow: hidden;
            min-width: 110px;
        }

        .progress-fill {
            height: 100%;
            background: #2563eb;
            border-radius: 20px;
        }

        .status {
            display: inline-block;
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
        }

        .status-active {
            background: #eff6ff;
            color: #2563eb;
        }

        .status-completed {
            background: #e5f9ef;
            color: #15804e;
        }

        .actions {
            display: flex;
            gap: 7px;
        }

        .btn-edit {
            background: #eff6ff;
            color: #2563eb;
            border: 1px solid #bfdbfe;
        }

        .btn-delete {
            background: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }

        .empty {
            text-align: center;
            color: #64748b;
            padding: 35px;
        }

        .alert {
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .success {
            background: #e5f9ef;
            color: #15804e;
        }

        .error {
            background: #fef2f2;
            color: #b42332;
        }

        .form-error {
            color: #dc2626;
            font-size: 12px;
            margin-top: 6px;
        }

        .input-error {
            border-color: #dc2626 !important;
        }

        .pagination {
            margin-top: 20px;
        }

        .modal {
            position: fixed;
            inset: 0;
            background: rgba(12,20,43,.6);
            display: none;
            justify-content: center;
            align-items: center;
            padding: 20px;
            z-index: 10;
        }

        .modal-box {
            background: white;
            width: 100%;
            max-width: 480px;
            padding: 30px;
            border-radius: 18px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 20px 50px rgba(15,23,42,.18);
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 16px;
            border-bottom: 1px solid #e2e8f0;
        }

        .modal-header h3 {
            font-size: 19px;
        }

        .close {
            border: none;
            background: none;
            font-size: 25px;
            cursor: pointer;
            color: #64748b;
        }

        .form-group {
            margin-bottom: 17px;
        }

        .form-group label {
            font-size: 13px;
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            padding: 13px 14px;
            outline: none;
            font-size: 13px;
        }

        .form-group input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,.1);
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 22px;
        }

        .btn-cancel {
            background: #f1f5f9;
            color: #475569;
            border: 1px solid #e2e8f0;
        }

        @media(max-width: 1100px) {
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 650px) {
            .layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: static;
                padding: 18px;
            }

            .logo {
                font-size: 17px;
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

            .content {
                padding: 22px 14px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
                gap: 15px;
                padding: 18px;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .content-card {
                padding: 15px;
            }

            .modal-box {
                padding: 22px;
            }

            .modal-footer .btn {
                flex: 1;
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

            <a href="{{ route('budgets.index') }}">
                <span>◷</span> Budgets
            </a>

            <a href="{{ route('savings-goals.index') }}" class="active">
                <span>◎</span> Savings Goals
            </a>
        </nav>

        <div class="sidebar-bottom">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </aside>

    <main class="main">

        <header class="topbar">
            <div class="welcome">
                <h1>Savings Goals</h1>
                <p>Plan your future and track your savings progress.</p>
            </div>

            <div class="profile">
                👤 {{ auth()->user()->name }}
            </div>
        </header>

        <div class="content">

            @if(session('success'))
                <div class="alert success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert error">
                    <strong>Please check your input:</strong>
                    <ul style="margin: 8px 0 0 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <section class="page-heading">
                <div>
                    <h2>Your Savings Goals</h2>
                    <p>Set financial targets and monitor how close you are to achieving them.</p>
                </div>

                <button type="button" class="btn btn-primary" id="addGoalButton">
                    + Add Savings Goal
                </button>
            </section>

            <section class="stats">

                <div class="stat-card">
                    <div class="stat-icon blue">◎</div>
                    <p>Total Goals</p>
                    <h3>{{ $totalGoals }}</h3>
                </div>

                <div class="stat-card">
                    <div class="stat-icon purple">🎯</div>
                    <p>Total Target</p>
                    <h3>Rp {{ number_format($totalTarget, 0, ',', '.') }}</h3>
                </div>

                <div class="stat-card">
                    <div class="stat-icon green">💰</div>
                    <p>Total Saved</p>
                    <h3>Rp {{ number_format($totalSaved, 0, ',', '.') }}</h3>
                </div>

                <div class="stat-card">
                    <div class="stat-icon orange">🏆</div>
                    <p>Completed Goals</p>
                    <h3>{{ $completedGoals }}</h3>
                </div>

            </section>

            <section class="content-card">

                <div class="content-header">
                    <div>
                        <h3>My Savings Goals</h3>
                        <p>All your personal savings targets</p>
                    </div>
                </div>

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Goal Name</th>
                                <th>Target Amount</th>
                                <th>Saved Amount</th>
                                <th>Progress</th>
                                <th>Target Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($goals as $goal)
                                @php
                                    $percentage = $goal->target_amount > 0
                                        ? min(100, ($goal->current_amount / $goal->target_amount) * 100)
                                        : 0;
                                @endphp

                                <tr>
                                    <td class="goal-name">
                                        {{ $goal->name }}
                                    </td>

                                    <td>
                                        Rp {{ number_format($goal->target_amount, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        Rp {{ number_format($goal->current_amount, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        <div class="progress-info">
                                            <span>{{ number_format($percentage, 1) }}%</span>
                                        </div>

                                        <div class="progress-bar">
                                            <div class="progress-fill"
                                                style="width: {{ $percentage }}%">
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        {{ $goal->target_date ? $goal->target_date->format('d M Y') : 'No deadline' }}
                                    </td>

                                    <td>
                                        <span class="status {{ $goal->status === 'completed' ? 'status-completed' : 'status-active' }}">
                                            {{ ucfirst($goal->status) }}
                                        </span>
                                    </td>

                                    <td>
                                        <div class="actions">
                                            <button
                                                type="button"
                                                class="btn btn-edit"
                                                onclick="editGoal(
                                                    {{ $goal->id }},
                                                    @js($goal->name),
                                                    {{ $goal->target_amount }},
                                                    {{ $goal->current_amount }},
                                                    @js($goal->target_date?->format('Y-m-d'))
                                                )">
                                                Edit
                                            </button>

                                            <form
                                                action="{{ route('savings-goals.destroy', $goal->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this savings goal?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-delete">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="empty">
                                        No savings goals yet. Start by creating your first goal!
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="pagination">
                    {{ $goals->links() }}
                </div>

            </section>
        </div>
    </main>
</div>

<!-- ADD SAVINGS GOAL MODAL -->
<div class="modal" id="addModal">
    <div class="modal-box">

        <div class="modal-header">
            <h3>Add Savings Goal</h3>
            <button type="button" class="close" onclick="closeModal('addModal')">&times;</button>
        </div>

        <form action="{{ route('savings-goals.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Goal Name</label>
                <input
                    type="text"
                    name="name"
                    placeholder="Example: Buy a Laptop"
                    maxlength="100"
                    value="{{ old('name') }}"
                    required
                    class="@error('name') input-error @enderror"
                >
                @error('name')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Target Amount (Rp)</label>
                <input
                    type="number"
                    name="target_amount"
                    min="0.01"
                    step="0.01"
                    placeholder="Example: 10000000"
                    value="{{ old('target_amount') }}"
                    required
                    class="@error('target_amount') input-error @enderror"
                >
                @error('target_amount')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Current Saved Amount (Rp)</label>
                <input
                    type="number"
                    name="current_amount"
                    min="0"
                    step="0.01"
                    value="{{ old('current_amount', 0) }}"
                    class="@error('current_amount') input-error @enderror"
                >
                @error('current_amount')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Target Date (Optional)</label>
                <input
                    type="date"
                    name="target_date"
                    value="{{ old('target_date') }}"
                    class="@error('target_date') input-error @enderror"
                >
                @error('target_date')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-cancel"
                    onclick="closeModal('addModal')">
                    Cancel
                </button>

                <button type="submit" class="btn btn-primary">
                    Save Goal
                </button>
            </div>
        </form>

    </div>
</div>

<!-- EDIT SAVINGS GOAL MODAL -->
<div class="modal" id="editModal">
    <div class="modal-box">

        <div class="modal-header">
            <h3>Edit Savings Goal</h3>
            <button type="button" class="close" onclick="closeModal('editModal')">&times;</button>
        </div>

        <form id="editForm" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Goal Name</label>
                <input
                    type="text"
                    name="name"
                    id="editName"
                    maxlength="100"
                    required
                >
            </div>

            <div class="form-group">
                <label>Target Amount (Rp)</label>
                <input
                    type="number"
                    name="target_amount"
                    id="editTargetAmount"
                    min="0.01"
                    step="0.01"
                    required
                >
            </div>

            <div class="form-group">
                <label>Current Saved Amount (Rp)</label>
                <input
                    type="number"
                    name="current_amount"
                    id="editCurrentAmount"
                    min="0"
                    step="0.01"
                    required
                >
            </div>

            <div class="form-group">
                <label>Target Date (Optional)</label>
                <input
                    type="date"
                    name="target_date"
                    id="editTargetDate"
                >
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-cancel"
                    onclick="closeModal('editModal')">
                    Cancel
                </button>

                <button type="submit" class="btn btn-primary">
                    Update Goal
                </button>
            </div>
        </form>

    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {

        const addButton = document.getElementById('addGoalButton');

        if (addButton) {
            addButton.addEventListener('click', function () {
                openModal('addModal');
            });
        }

        // Jika validasi Add gagal, buka kembali modal Add
        @if($errors->any() && old('_token'))
            openModal('addModal');
        @endif

        window.addEventListener('click', function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
        });

    });

    function openModal(id) {
        document.getElementById(id).style.display = 'flex';
    }

    function closeModal(id) {
        document.getElementById(id).style.display = 'none';
    }

    function editGoal(id, name, targetAmount, currentAmount, targetDate) {

        document.getElementById('editForm').action =
            '/savings-goals/' + id;

        document.getElementById('editName').value = name;
        document.getElementById('editTargetAmount').value = targetAmount;
        document.getElementById('editCurrentAmount').value = currentAmount;
        document.getElementById('editTargetDate').value = targetDate || '';

        openModal('editModal');
    }
</script>

</body>
</html>
