<!DOCTYPE html>
<html>
<head>
    <title>Report SLA Pengaduan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h1 class="mb-4">Report SLA Pengaduan</h1>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Nama Pelapor</th>
            <th>Durasi SLA</th>
            <th>Durasi (jam)</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pengaduans as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->judul }}</td>
            <td>
                @if($p->status == 'pending')
                Open
                @elseif($p->status == 'proses')
                Progress
                @else
                Closed
                @endif
            </td>
            <td>{{ $p->created_at }}</td>
            <td>{{ $p->updated_at }}</td>
            <td>{{ $p->user->name ?? 'N/A' }}</td>
            <td>{{ $p->sla_duration }}</td>
            <td>{{ $p->sla_hours }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <a href="{{ url('/admin/dashboard') }}" class="btn btn-secondary">Kembali</a>
</div>
</body>
</html>
