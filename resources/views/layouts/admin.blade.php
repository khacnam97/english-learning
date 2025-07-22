<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - English Learning</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: "Segoe UI", sans-serif;
        }
        .sidebar {
            width: 220px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            background-color: #343a40;
            padding-top: 60px;
        }
        .sidebar a {
            padding: 12px 20px;
            display: block;
            color: #ccc;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
            color: #fff;
        }
        .content {
            margin-left: 220px;
            padding: 20px;
        }
        .navbar {
            position: fixed;
            left: 220px;
            right: 0;
            top: 0;
            z-index: 1000;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand">Admin Dashboard</span>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<!-- Sidebar -->
<div class="sidebar">
        <h4 class="mb-4" style="color: white">Admin Panel</h4>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a class="nav-link" href="#">📊 Dashboard</a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link" href="/admin">👥 Manage Users</a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ route('admin.courses.index', Auth::user()->id) }}">📚 Manage Courses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('lessons*') ? 'active' : '' }}" href="{{ route('lessons.index') }}"><i class="fas fa-book-open me-1"></i> Lessons</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('categories*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
                    <i class="fas fa-tags"></i> Categories
                </a>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-outline-danger mt-3" type="submit">Logout</button>
                </form>
            </li>
        </ul>
</div>

<!-- Content -->
<div class="content mt-5">
    @yield('content')
</div>

</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
