<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduans = Pengaduan::where('user_id', Auth::id())->get();
        return view('pengaduan.index', compact('pengaduans'));
    }

    public function create()
    {
        return view('pengaduan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        Pengaduan::create([
            'user_id' => Auth::id(),
            'judul' => $request->judul,
            'isi' => $request->isi,
            'status' => 'pending',
        ]);

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dikirim!');
    }

    // halaman detail
    public function detail($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('pengaduan.detail', compact('pengaduan'));
    }

    // update status pengaduan
    public function updateStatus(Request $request, $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->status = $request->status;
        $pengaduan->catatan = $request->catatan;
        $pengaduan->save();

        return redirect('/admin/dashboard')->with('success', 'Status pengaduan berhasil diubah!');
    }

    public function slaReport()
    {
        $pengaduans = Pengaduan::with('user')->get(); // eager load user

        foreach ($pengaduans as $p) {
            $created = Carbon::parse($p->created_at);
            $updated = $p->updated_at ? Carbon::parse($p->updated_at) : Carbon::now();
            $p->sla_duration = $updated->diffForHumans($created, true);
            $p->sla_hours = $updated->diffInHours($created);
        }

        return view('admin.sla_report', compact('pengaduans'));
    }


}
