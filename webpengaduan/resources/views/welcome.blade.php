<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container text-center mt-5">
    <h1>Halo, {{ Auth::user() ? Auth::user()->name : 'Guest' }} 👋</h1>
    <p>Selamat datang di aplikasi testapp!</p>

    <a href="{{ route('pengaduan.create') }}" class="btn btn-primary">Tambah Pengaduan</a>
    <a href="{{ route('pengaduan.index') }}" class="btn btn-success">Daftar Pengaduan</a>
    <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
</div>
</body>
</html>
