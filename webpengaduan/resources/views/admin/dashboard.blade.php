<!DOCTYPE html>
<html>
<head>
    <title>Verifikasi Pengaduan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h1 class="mb-4">Daftar Pengaduan Masyarakat</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Catatan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pengaduan as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->judul }}</td>
            <td>{{ $p->catatan }}</td>
            <td>{{ $p->status }}</td>
            <td>
                <a href="{{ url('/pengaduan/detail/'.$p->id) }}" class="btn btn-primary btn-sm">Detail</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.sla-report') }}" class="btn btn-primary">Lihat Report SLA</a>
        <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
    </div>

</div>
</body>
</html>
