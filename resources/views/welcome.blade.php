<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1e1e2f;
            color: #ffffff;
        }
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            background: url('https://source.unsplash.com/1600x900/?library,books') no-repeat center center;
            background-size: cover;
            color: white;
        }
        .overlay {
            background: rgba(0, 0, 0, 0.6);
            padding: 50px;
            border-radius: 10px;
        }
        .navbar {
            background-color: #343a40 !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Perpustakaan Digital</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="overlay">
            <h1>Selamat Datang di Perpustakaan Digital</h1>
            <p>Temukan dan baca buku favorit Anda di mana saja, kapan saja.</p>
            <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
