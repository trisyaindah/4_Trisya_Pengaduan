<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Carbon\Carbon;

class AdminController extends Controller
{
    // Halaman dashboard admin
    public function index()
    {
        $pengaduan = Pengaduan::all();
        return view('admin.dashboard', compact('pengaduan'));
    }

    // Laporan SLA
    public function slaReport()
    {
        $pengaduans = Pengaduan::all();

        foreach ($pengaduans as $p) {
            $created = Carbon::parse($p->created_at);
            $updated = $p->updated_at ? Carbon::parse($p->updated_at) : Carbon::now();
            $p->sla_duration = $updated->diffForHumans($created, true); // misal "2 days", "3 hours"
            $p->sla_hours = $updated->diffInHours($created); // durasi dalam jam
        }

        return view('admin.sla_report', compact('pengaduans'));
    }
}
