<!DOCTYPE html>
<html>
<head>
    <title>Detail Pengaduan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h1 class="mb-4">Detail Pengaduan</h1>

    <div class="card mb-4">
        <div class="card-header">
            ID: {{ $pengaduan->id }} | Status: {{ $pengaduan->status }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $pengaduan->judul }}</h5>
            <p class="card-text">{{ $pengaduan->deskripsi }}</p>
        </div>
    </div>

    <form action="{{ url('/pengaduan/update-status/'.$pengaduan->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="status" class="form-label">Ubah Status</label>
            <select name="status" id="status" class="form-select">
                <option value="pending" {{ $pengaduan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="proses" {{ $pengaduan->status == 'proses' ? 'selected' : '' }}>Proses</option>
                <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan</label>
            <textarea name="catatan" id="catatan" class="form-control" rows="3">{{ $pengaduan->catatan }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update Status</button>
        <a href="{{ url('/admin/dashboard') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
