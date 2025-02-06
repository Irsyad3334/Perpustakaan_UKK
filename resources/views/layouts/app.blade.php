<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #495057;
            margin: 0;
            padding: 0;
        }

        /* Sidebar */
        .sidebar {
            background-color: #343a40;
            height: 100vh;
            color: white;
            padding-top: 20px;
            position: fixed;
            width: 260px;
            transition: all 0.3s ease;
            overflow-y: auto;
            box-shadow: 4px 0px 8px rgba(0, 0, 0, 0.1);
        }

        .sidebar .nav-link {
            color: #adb5bd;
            font-weight: 500;
            font-size: 16px;
            padding: 12px 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .sidebar .nav-link:hover {
            background-color: #007bff;
            color: #fff;
        }

        .sidebar .navbar-nav {
            padding-left: 0;
            list-style: none;
        }

        .sidebar .nav-item {
            margin-bottom: 20px;
        }

        .sidebar .nav-item h5 {
            font-size: 20px;
            color: #fff;
            margin-bottom: 30px;
            padding-left: 20px;
            font-weight: 700;
        }

        .sidebar .nav-item .nav-link.active {
            background-color: #007bff;
        }

        .sidebar .nav-item .btn-logout {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            width: 100%;
            text-align: left;
        }

        .sidebar .nav-item .btn-logout:hover {
            background-color: #c82333;
        }

        /* Content Area */
        .content-area {
            margin-left: 260px;
            padding: 30px;
            transition: all 0.3s ease;
            height: 100vh;
            overflow-y: auto;
        }

        /* Main Content */
        .main-content {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            color: #495057;
            height: calc(100vh - 60px); /* To adjust for the navbar */
            overflow-y: auto;
        }

        .navbar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #343a40;
            color: white;
            padding: 15px 30px;
            border-radius: 5px;
        }

        .navbar-header i {
            font-size: 30px;
            margin-right: 10px;
        }

        /* Footer */
        footer {
            text-align: center;
            margin-top: 30px;
            padding: 15px;
            background-color: #343a40;
            color: white;
            font-size: 14px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                padding: 10px;
            }

            .content-area {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="navbar navbar-light">
            <ul class="navbar-nav">
                @if(Auth::check() && Auth::user()->role == 'admin')
                <li class="nav-item">
                    <h5 class="nav-link text-white">Admin Dashboard</h5>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.perpustakaan.index') }}"><i class="fas fa-book"></i> Perpustakaan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.rak.index') }}"><i class="fas fa-cabinet-filing"></i> Rak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.ddc.index') }}"><i class="fas fa-layer-group"></i> DDC</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.format.index') }}"><i class="fas fa-file-alt"></i> Format</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.penerbit.index') }}"><i class="fas fa-print"></i> Penerbit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.pengarang.index') }}"><i class="fas fa-user-edit"></i> Pengarang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.pustaka.index') }}"><i class="fas fa-book-open"></i> Pustaka</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.jenis_anggota.index') }}"><i class="fas fa-users"></i> Jenis Anggota</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.anggota.index') }}"><i class="fas fa-id-card"></i> Anggota</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.transaksi.index') }}"><i class="fas fa-exchange-alt"></i> Transaksi</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</button>
                    </form>
                </li>
                @elseif(Auth::check())
                <li class="nav-item">
                    <h5 class="nav-link text-white">User Dashboard</h5>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.jenis_anggota.index') }}"><i class="fas fa-users"></i> Jenis Anggota</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.anggota.index') }}"><i class="fas fa-id-card"></i> Anggota</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.transaksi.index') }}"><i class="fas fa-exchange-alt"></i> Transaksi</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</button>
                    </form>
                </li>
                @endif
            </ul>
        </nav>
    </div>

    <!-- Main Content Area -->
    <div class="content-area">
        <div class="navbar-header">
            <!-- Icon -->
            <i class="fas fa-book"></i>
            <h4 style="flex-grow: 1; text-align: center;">Dashboard</h4>
        </div>

        <div class="main-content">
            @yield('content') <!-- Content will be injected here -->
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Perpustakaan. All Rights Reserved.</p>
    </footer>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>