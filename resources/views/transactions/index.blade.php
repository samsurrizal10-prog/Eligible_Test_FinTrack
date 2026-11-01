
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions - FinTrack</title>

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
            opacity: .45;
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
            box-shadow: 0 2px 10px rgba(0,0,0,.04);
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

        .page-heading h1 {
            margin: 0 0 8px;
            font-size: 25px;
        }

        .page-heading p {
            margin: 0;
            color: #64748b;
            font-size: 13px;
        }

        .primary-btn {
            border: none;
            background: #2563eb;
            color: white;
            padding: 12px 18px;
            border-radius: 9px;
            font-weight: bold;
            cursor: pointer;
        }

        .primary-btn:hover {
            background: #1d4ed8;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            padding: 23px;
            border-radius: 14px;
            border: 1px solid #edf0f5;
            box-shadow: 0 4px 15px rgba(0,0,0,.035);
        }

        .stat-card small {
            color: #64748b;
            font-size: 13px;
        }

        .stat-card h2 {
            margin: 13px 0 0;
            font-size: 23px;
        }

        .income { color: #059669; }
        .expense { color: #dc2626; }
        .balance { color: #2563eb; }

        .alert {
            padding: 14px 17px;
            border-radius: 9px;
            margin-bottom: 18px;
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

        .alert ul {
            margin: 7px 0 0;
            padding-left: 20px;
        }

        .table-card {
            background: white;
            border-radius: 14px;
            border: 1px solid #edf0f5;
            padding: 24px;
            box-shadow: 0 4px 15px rgba(0,0,0,.035);
        }

        .table-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .table-heading h3 {
            margin: 0;
            font-size: 17px;
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
            text-align: left;
            padding: 15px 12px;
            border-bottom: 1px solid #edf0f5;
            font-size: 13px;
        }

        th {
            color: #64748b;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        .badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
        }

        .badge-income {
            background: #dcfce7;
            color: #15803d;
        }

        .badge-expense {
            background: #fee2e2;
            color: #b91c1c;
        }

        .action-btn {
            border: none;
            border-radius: 6px;
            padding: 8px 11px;
            cursor: pointer;
            font-size: 11px;
            font-weight: bold;
            margin-right: 4px;
        }

        .edit-btn {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .delete-btn {
            background: #fee2e2;
            color: #dc2626;
        }

        .empty {
            text-align: center;
            padding: 45px 15px;
            color: #64748b;
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .pagination a,
        .pagination span {
            display: inline-block;
            padding: 7px 11px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 12px;
        }

        .pagination a {
            background: #eff6ff;
            color: #2563eb;
        }

        .pagination span {
            color: #64748b;
        }

        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(15,23,42,.6);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            padding: 18px;
        }

        .modal.show {
            display: flex;
        }

        .modal-content {
            background: white;
            width: 100%;
            max-width: 520px;
            max-height: 90vh;
            overflow-y: auto;
            border-radius: 16px;
            padding: 27px;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
        }

        .modal-header h2 {
            margin: 0;
            font-size: 20px;
        }

        .close-btn {
            border: none;
            background: #f1f5f9;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 18px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 13px;
            outline: none;
            background: white;
            color: #1e293b;
            cursor: pointer;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #2563eb;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 75px;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 22px;
        }

        .cancel-btn {
            background: #e2e8f0;
            color: #334155;
            border: none;
            padding: 11px 17px;
            border-radius: 8px;
            cursor: pointer;
        }

        @media(max-width: 1000px) {
            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
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

            .stats {
                grid-template-columns: 1fr;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
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

            <a href="{{ route('transactions.index') }}" class="active">
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
                <button type="submit" class="logout">Logout</button>
            </form>
        </div>
    </aside>

    <main class="main">

        <header class="topbar">
            <h2>Transactions</h2>
            <span>{{ auth()->user()->name }}</span>
        </header>

        <div class="content">

            <div class="page-heading">
                <div>
                    <h1>Transactions Management</h1>
                    <p>Track and manage your income and expenses.</p>
                </div>

                <button type="button" class="primary-btn" onclick="openAddModal()">
                    + Add Transaction
                </button>
            </div>

            @if(session('success'))
                <div class="alert success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert error">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert error">
                    Please check the following errors:
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <section class="stats">

                <div class="stat-card">
                    <small>Total Income</small>
                    <h2 class="income">
                        Rp {{ number_format($totalIncome, 0, ',', '.') }}
                    </h2>
                </div>

                <div class="stat-card">
                    <small>Total Expenses</small>
                    <h2 class="expense">
                        Rp {{ number_format($totalExpense, 0, ',', '.') }}
                    </h2>
                </div>

                <div class="stat-card">
                    <small>Current Balance</small>
                    <h2 class="balance">
                        Rp {{ number_format($balance, 0, ',', '.') }}
                    </h2>
                </div>

            </section>

            <section class="table-card">

                <div class="table-heading">
                    <h3>Transaction History</h3>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($transactions as $transaction)
                                <tr>
                                    <td>
                                        {{ $transaction->transaction_date->format('d M Y') }}
                                    </td>

                                    <td>
                                        <strong>{{ $transaction->title }}</strong>
                                        @if($transaction->description)
                                            <br>
                                            <small style="color:#94a3b8;">
                                                {{ $transaction->description }}
                                            </small>
                                        @endif
                                    </td>

                                    <td>
                                        {{ $transaction->category->name ?? 'No Category' }}
                                    </td>

                                    <td>
                                        @if($transaction->type === 'income')
                                            <span class="badge badge-income">Income</span>
                                        @else
                                            <span class="badge badge-expense">Expense</span>
                                        @endif
                                    </td>

                                    <td>
                                        <strong class="{{ $transaction->type === 'income' ? 'income' : 'expense' }}">
                                            Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                                        </strong>
                                    </td>

                                    <td>
                                        <button
                                            type="button"
                                            class="action-btn edit-btn"
                                            onclick="openEditModal(
                                                {{ $transaction->id }},
                                                @js($transaction->title),
                                                @js($transaction->type),
                                                {{ $transaction->category_id }},
                                                {{ (float) $transaction->amount }},
                                                @js($transaction->description),
                                                @js($transaction->transaction_date->format('Y-m-d'))
                                            )"
                                        >
                                            Edit
                                        </button>

                                        <form
                                            action="{{ route('transactions.destroy', $transaction->id) }}"
                                            method="POST"
                                            style="display:inline;"
                                            onsubmit="return confirm('Are you sure you want to delete this transaction?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="action-btn delete-btn">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="empty">
                                        <strong>No transactions yet.</strong>
                                        <br><br>
                                        Start by adding your first income or expense.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="pagination">
                    {{ $transactions->links() }}
                </div>

            </section>

        </div>
    </main>
</div>

<!-- ADD TRANSACTION MODAL -->
<div class="modal" id="addModal">
    <div class="modal-content">

        <div class="modal-header">
            <h2>Add Transaction</h2>
            <button type="button" class="close-btn" onclick="closeModal('addModal')">
                ×
            </button>
        </div>

        <form action="{{ route('transactions.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Transaction Type</label>
                <select name="type" id="addType" required>
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                </select>
            </div>

            <div class="form-group">
                <label>Category</label>
                <select name="category_id" id="addCategory" required>
                    <option value="">Select Category</option>

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" data-type="{{ $category->type }}">
                            {{ $category->name }} ({{ ucfirst($category->type) }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Transaction Title</label>
                <input
                    type="text"
                    name="title"
                    maxlength="150"
                    placeholder="Example: Monthly Salary"
                    required
                >
            </div>

            <div class="form-group">
                <label>Amount (Rp)</label>
                <input
                    type="number"
                    name="amount"
                    min="0.01"
                    step="0.01"
                    placeholder="Example: 500000"
                    required
                >
            </div>

            <div class="form-group">
                <label>Transaction Date</label>
                <input
                    type="date"
                    name="transaction_date"
                    value="{{ now()->format('Y-m-d') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label>Description (Optional)</label>
                <textarea name="description" placeholder="Add transaction notes..."></textarea>
            </div>

            <div class="modal-actions">
                <button type="button" class="cancel-btn" onclick="closeModal('addModal')">
                    Cancel
                </button>

                <button type="submit" class="primary-btn">
                    Save Transaction
                </button>
            </div>
        </form>

    </div>
</div>

<!-- EDIT TRANSACTION MODAL -->
<div class="modal" id="editModal">
    <div class="modal-content">

        <div class="modal-header">
            <h2>Edit Transaction</h2>
            <button type="button" class="close-btn" onclick="closeModal('editModal')">
                ×
            </button>
        </div>

        <form id="editForm" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Transaction Type</label>
                <select name="type" id="editType" required>
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                </select>
            </div>

            <div class="form-group">
                <label>Category</label>
                <select name="category_id" id="editCategory" required>
                    <option value="">Select Category</option>

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" data-type="{{ $category->type }}">
                            {{ $category->name }} ({{ ucfirst($category->type) }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Transaction Title</label>
                <input type="text" name="title" id="editTitle" maxlength="150" required>
            </div>

            <div class="form-group">
                <label>Amount (Rp)</label>
                <input type="number" name="amount" id="editAmount" min="0.01" step="0.01" required>
            </div>

            <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" name="transaction_date" id="editDate" required>
            </div>

            <div class="form-group">
                <label>Description (Optional)</label>
                <textarea name="description" id="editDescription"></textarea>
            </div>

            <div class="modal-actions">
                <button type="button" class="cancel-btn" onclick="closeModal('editModal')">
                    Cancel
                </button>

                <button type="submit" class="primary-btn">
                    Update Transaction
                </button>
            </div>
        </form>

    </div>
</div>

<script>
    function openAddModal() {
        document.getElementById('addModal').classList.add('show');
        filterCategories('addType', 'addCategory');
    }

    function openEditModal(id, title, type, categoryId, amount, description, date) {
        document.getElementById('editForm').action = `/transactions/${id}`;

        document.getElementById('editTitle').value = title;
        document.getElementById('editType').value = type;
        document.getElementById('editAmount').value = amount;
        document.getElementById('editDescription').value = description || '';
        document.getElementById('editDate').value = date;

        filterCategories('editType', 'editCategory');
        document.getElementById('editCategory').value = categoryId;

        document.getElementById('editModal').classList.add('show');
    }

    function closeModal(id) {
        document.getElementById(id).classList.remove('show');
    }

    // Tampilkan semua kategori tanpa menyembunyikan pilihan.
    function filterCategories(typeId, categoryId) {
        const categorySelect = document.getElementById(categoryId);

        Array.from(categorySelect.options).forEach(option => {
            option.hidden = false;
            option.disabled = false;
        });
    }

    document.getElementById('addType').addEventListener('change', function () {
        filterCategories('addType', 'addCategory');
    });

    document.getElementById('editType').addEventListener('change', function () {
        filterCategories('editType', 'editCategory');
    });

    document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('click', function (event) {
            if (event.target === modal) {
                modal.classList.remove('show');
            }
        });
    });
</script>

</body>
</html>
