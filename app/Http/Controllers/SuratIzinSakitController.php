<?php

// app/Http/Controllers/SuratIzinSakitController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratIzinSakit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratIzinSakitController extends Controller
{
    public function index()
    {
        $izin = SuratIzinSakit::where('user_id', Auth::id())->latest()->get();
        return view('izin.index', compact('izin'));
    }

    public function create()
    {
        return view('izin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required|string|max:1000',
            'bukti_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);
        $file = null;
        if ($request->hasFile('bukti_file')) {
            $file = $request->file('bukti_file')->store('izin_sakit');
        }
        SuratIzinSakit::create([
            'user_id' => Auth::id(),
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'alasan' => $request->alasan,
            'bukti_file' => $file,
            'status' => 'pending',
        ]);
        return redirect()->route('izin.index')->with('success', 'Pengajuan izin berhasil dikirim.');
    }

    public function edit($id)
    {
        $izin = SuratIzinSakit::where('id', $id)->where('user_id', Auth::id())->where('status', 'pending')->firstOrFail();
        return view('izin.edit', compact('izin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required|string|max:1000',
            'bukti_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);
        $izin = SuratIzinSakit::where('id', $id)->where('user_id', Auth::id())->where('status', 'pending')->firstOrFail();
        $data = [
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'alasan' => $request->alasan,
        ];
        if ($request->hasFile('bukti_file')) {
            if ($izin->bukti_file) {
                Storage::delete($izin->bukti_file);
            }
            $data['bukti_file'] = $request->file('bukti_file')->store('izin_sakit');
        }
        $izin->update($data);
        return redirect()->route('izin.index')->with('success', 'Izin sakit berhasil diupdate.');
    }

    public function destroy($id)
    {
        $izin = SuratIzinSakit::where('id', $id)->where('user_id', Auth::id())->where('status', 'pending')->firstOrFail();
        if ($izin->bukti_file) {
            Storage::delete($izin->bukti_file);
        }
        $izin->delete();
        return redirect()->route('izin.index')->with('success', 'Izin sakit berhasil dihapus.');
    }

    // ===== ADMIN =====
    public function adminIndex()
    {
        $izin = SuratIzinSakit::with('user')->latest()->get();
        return view('izin.admin_index', compact('izin'));
    }

    public function approve($id)
    {
        $izin = SuratIzinSakit::findOrFail($id);
        $izin->status = 'approved';
        $izin->save();
        return back()->with('success', 'Izin sakit disetujui.');
    }

    public function reject($id)
    {
        $izin = SuratIzinSakit::findOrFail($id);
        $izin->status = 'rejected';
        $izin->save();
        return back()->with('success', 'Izin sakit ditolak.');
    }
}
