<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container d-flex vh-100">
    <div class="card m-auto p-4 shadow" style="width: 350px;">
        <h3 class="text-center mb-3">Login</h3>

        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif


        <!-- Alert Success -->
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <!-- Tombol Registrasi -->
        <div class="text-center mt-3">
            <a href="{{ route('register') }}" class="btn btn-secondary w-100">Registrasi</a>
        </div>
    </div>
</div>
</body>
</html>
