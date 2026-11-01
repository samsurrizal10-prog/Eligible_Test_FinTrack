<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories | FinTrack</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f8fafc;
            color: #18213b;
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

        .sidebar-bottom form {
            width: 100%;
        }

        .logout-btn {
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
            padding: 0;
        }

        .content {
            padding: 35px;
            max-width: 1400px;
            margin: auto;
        }

        .topbar {
            background: white;
            padding: 22px 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,.04);
            margin-bottom: 0;
        }

        .welcome h1 {
            margin: 0;
            font-size: 20px;
        }

        .welcome p {
            color: #64748b;
            font-size: 13px;
            margin-top: 6px;
        }

        .profile {
            background: white;
            padding: 10px 17px;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(25,40,80,.05);
            font-size: 13px;
            font-weight: bold;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            gap: 15px;
        }

        .page-heading h2 {
            font-size: 22px;
            margin-bottom: 7px;
        }

        .page-heading p {
            color: #8490a9;
            font-size: 13px;
        }

        .btn {
            border: none;
            border-radius: 9px;
            padding: 13px 18px;
            cursor: pointer;
            font-weight: bold;
            font-size: 13px;
            text-decoration: none;
        }

        .btn-primary {
            background: #2563eb;
            color: #ffffff;
            border: none;
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.2);
            transition: background 0.2s ease, transform 0.2s ease;
        }

        .btn-primary:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 27px;
        }

        .stat-card {
            background: #ffffff;
            padding: 24px;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.04);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.08);
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 19px;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            font-size: 20px;
        }

        .purple { background: #eff6ff; }
        .green { background: #e5f9ef; }
        .red { background: #ffebed; }

        .stat-card p {
            color: #64748b;
            font-size: 13px;
            margin-bottom: 9px;
        }

        .stat-card h3 {
            font-size: 27px;
            color: #0f172a;
        }

        .content-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.04);
        }

        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
        }

        .content-header h3 {
            font-size: 17px;
            color: #0f172a;
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
            min-width: 600px;
        }

        th {
            background: #f8fafc;
            color: #64748b;
            text-align: left;
            font-size: 11px;
            font-weight: 700;
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

        .category-name {
            font-weight: bold;
        }

        .badge {
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
        }

        .income {
            background: #e5f9ef;
            color: #15945b;
        }

        .expense {
            background: #ffebed;
            color: #dc4755;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .btn-edit {
            background: #eff6ff;
            color: #2563eb;
            border: 1px solid #bfdbfe;
            transition: all 0.2s ease;
        }

        .btn-edit:hover {
            background: #dbeafe;
        }

        .btn-delete {
            background: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
            transition: all 0.2s ease;
        }

        .btn-delete:hover {
            background: #fee2e2;
        }

        .empty {
            text-align: center;
            color: #8490a9;
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
            background: #ffebed;
            color: #b42332;
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
            background: #ffffff;
            width: 100%;
            max-width: 480px;
            padding: 30px;
            border-radius: 18px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 20px 50px rgba(15, 23, 42, 0.18);
            animation: modalFadeIn 0.2s ease;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
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
            font-weight: 700;
            color: #0f172a;
        }

        .close {
            border: none;
            background: none;
            font-size: 25px;
            cursor: pointer;
            color: #8490a9;
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

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            padding: 13px 14px;
            outline: none;
            font-size: 13px;
            color: #0f172a;
            background: #ffffff;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
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
            transition: all 0.2s ease;
        }

        .btn-cancel:hover {
            background: #e2e8f0;
        }

        @media(max-width: 900px) {
            .sidebar {
                width: 190px;
            }

            .stats {
                gap: 12px;
            }
        }

        @media(max-width: 650px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: static;
            }

            .brand {
                font-size: 18px;
                padding: 0 5px 35px;
            }

            .brand span,
            .menu-label,
            .nav-text,
            .logout-text {
                display: none;
            }

            .nav-link {
                justify-content: center;
                padding: 13px 5px;
                font-size: 18px;
            }

            .logout-btn {
                font-size: 16px;
                padding: 10px 3px;
            }

            .main {
                padding: 22px 14px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
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
                max-height: 90vh;
                overflow-y: auto;
            }

            .modal-footer {
                flex-wrap: wrap;
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

            <a href="{{ route('categories.index') }}" class="active">
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
                <button type="submit" class="logout-btn">
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <main class="main">

        <header class="topbar">
            <div class="welcome">
                <h1>Category Management</h1>
                <p>Organize your income and expenses efficiently.</p>
            </div>

            <div class="profile">
                👤 {{ auth()->user()->name }}
            </div>
        </header>
        <div class="content">
        @if(session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert error">{{ session('error') }}</div>
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
                <h2>Your Categories</h2>
                <p>Manage and organize your financial categories.</p>
            </div>

            <button class="btn btn-primary" onclick="openModal('addModal')">
                + Add Category
            </button>
        </section>

        <section class="stats">

            <div class="stat-card">
                <div class="stat-top">
                    <span>📁</span>
                    <span class="stat-icon purple">▤</span>
                </div>
                <p>Total Categories</p>
                <h3>{{ $totalCategories }}</h3>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <span>💰</span>
                    <span class="stat-icon green">↗</span>
                </div>
                <p>Income Categories</p>
                <h3>{{ $incomeCategories }}</h3>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <span>💳</span>
                    <span class="stat-icon red">↘</span>
                </div>
                <p>Expense Categories</p>
                <h3>{{ $expenseCategories }}</h3>
            </div>

        </section>

        <section class="content-card">

            <div class="content-header">
                <div>
                    <h3>All Categories</h3>
                    <p>Your personal income and expense categories</p>
                </div>
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td class="category-name">
                                    {{ $category->name }}
                                </td>

                                <td>
                                    <span class="badge {{ $category->type }}">
                                        {{ ucfirst($category->type) }}
                                    </span>
                                </td>

                                <td>
                                    {{ $category->description ?? 'No description' }}
                                </td>

                                <td>
                                    <div class="actions">

                                        <button
                                            class="btn btn-edit"
                                            type="button"
                                            onclick="editCategory(
                                                {{ $category->id }},
                                                @js($category->name),
                                                @js($category->type),
                                                @js($category->description)
                                            )"
                                        >
                                            Edit
                                        </button>

                                        <form
                                            action="{{ route('categories.destroy', $category->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this category?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-delete" type="submit">
                                                Delete
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="empty">
                                    No categories yet. Add your first category!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pagination">
                {{ $categories->links() }}
            </div>

        </section>
        </div>

    </main>

</div>

<!-- ADD CATEGORY MODAL -->
<div class="modal" id="addModal">
    <div class="modal-box">

        <div class="modal-header">
            <h3>Add New Category</h3>
            <button class="close" onclick="closeModal('addModal')">&times;</button>
        </div>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Category Name</label>
                <input
                    type="text"
                    name="name"
                    placeholder="Example: Salary"
                    value="{{ old('name') }}"
                    maxlength="100"
                    required
                >
            </div>

            <div class="form-group">
                <label>Category Type</label>
                <select name="type" required>
                    <option value="">Select category type</option>
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                </select>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea
                    name="description"
                    rows="3"
                    placeholder="Write a short description..."
                >{{ old('description') }}</textarea>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-cancel"
                    onclick="closeModal('addModal')">
                    Cancel
                </button>

                <button type="submit" class="btn btn-primary">
                    Save Category
                </button>
            </div>
        </form>

    </div>
</div>

<!-- EDIT CATEGORY MODAL -->
<div class="modal" id="editModal">
    <div class="modal-box">

        <div class="modal-header">
            <h3>Edit Category</h3>
            <button class="close" onclick="closeModal('editModal')">&times;</button>
        </div>

        <form id="editForm" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="name" id="editName" maxlength="100" required>
            </div>

            <div class="form-group">
                <label>Category Type</label>
                <select name="type" id="editType" required>
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                </select>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="editDescription" rows="3"></textarea>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-cancel"
                    onclick="closeModal('editModal')">
                    Cancel
                </button>

                <button type="submit" class="btn btn-primary">
                    Update Category
                </button>
            </div>
        </form>

    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById(id).style.display = 'flex';
    }

    function closeModal(id) {
        document.getElementById(id).style.display = 'none';
    }

    function editCategory(id, name, type, description) {
        document.getElementById('editForm').action =
            '/categories/' + id;

        document.getElementById('editName').value = name;
        document.getElementById('editType').value = type;
        document.getElementById('editDescription').value =
            description || '';

        openModal('editModal');
    }

    window.addEventListener('click', function(event) {
        if (event.target.classList.contains('modal')) {
            event.target.style.display = 'none';
        }
    });
</script>

</body>
</html>
