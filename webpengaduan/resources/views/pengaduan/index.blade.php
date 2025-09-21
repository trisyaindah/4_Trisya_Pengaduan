<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pengaduan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h1 class="mb-4">Daftar Pengaduan Saya</h1>

    {{-- Pesan sukses --}}
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    {{-- Jika belum ada pengaduan --}}
    @if($pengaduans->isEmpty())
    <div class="alert alert-info">
        Belum ada pengaduan yang dibuat.
    </div>
    @else
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Judul</th>
            <th>Isi</th>
            <th>Status</th>
            <th>Tanggal Dibuat</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pengaduans as $p)
        <tr>
            <td>{{ $p->judul }}</td>
            <td>{{ $p->isi }}</td>
            <td>
                            <span class="badge
                                @if($p->status == 'menunggu') bg-warning
                                @elseif($p->status == 'diterima') bg-success
                                @elseif($p->status == 'ditolak') bg-danger
                                @else bg-secondary
                                @endif">
                                {{ ucfirst($p->status) }}
                            </span>
            </td>
            <td>{{ $p->created_at->format('d M Y H:i') }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @endif

    <a href="{{ route('pengaduan.create') }}" class="btn btn-primary mt-3">Tambah Pengaduan</a>
    <a href="{{ route('welcome') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
</body>
</html>
