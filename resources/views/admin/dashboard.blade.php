@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 bg-light vh-100 p-3">
                <h4 class="mb-4">Admin Panel</h4>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#">📊 Dashboard</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#">👥 Manage Users</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#">📚 Manage Courses</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-outline-danger mt-3" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 p-4">
                <h2 class="mb-4">Welcome, {{ Auth::user()->name }}</h2>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card text-white bg-primary">
                            <div class="card-body">
                                <h5 class="card-title">Total Users</h5>
                                <p class="card-text fs-4">{{ $totalUsers }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="card text-white bg-success">
                            <div class="card-body">
                                <h5 class="card-title">Total Courses</h5>
                                <p class="card-text fs-4">{{ $totalCourses }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Bạn có thể thêm thống kê khác ở đây -->
                </div>
            </div>
        </div>
    </div>
@endsection
