<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="text-center">Login Perpustakaan</h2>
        <p class="text-center text-muted">Masuk untuk mengakses koleksi buku</p>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required autofocus>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input type="checkbox" id="remember_me" class="form-check-input" name="remember">
                    <label for="remember_me" class="form-check-label">Ingat Saya</label>
                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-decoration-none">Lupa Password?</a>
                @endif
            </div>
            
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
