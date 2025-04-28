<?php

namespace App\Http\Controllers;

use App\Models\Konselor;
use App\Models\PendaftaranKonseling;
use App\Models\SesiKonseling;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pendaftaran_sesi_konseling_selesai = PendaftaranKonseling::where('status','Selesai')->count();
        $pendaftaran_sesi_konseling_terverifikasi = PendaftaranKonseling::where('status','Terverifikasi')->count();
        $pendaftaran_sesi_konseling_menunggu = PendaftaranKonseling::where('status','Menunggu')->count();
        $total_admin = User::where('is_role','Admin')->count();
        $total_mahasiswa = User::where('is_role','Mahasiswa')->count();
        $total_konselor = Konselor::count();
        $total_sesi_konseling = SesiKonseling::count();
     
        return view('admin.dashboard.index',compact('pendaftaran_sesi_konseling_selesai','pendaftaran_sesi_konseling_terverifikasi','pendaftaran_sesi_konseling_menunggu','total_admin','total_mahasiswa','total_konselor','total_sesi_konseling'));
    }
    
    public function index_konselor()
    {
        $total_sesi_konseling = SesiKonseling::whereHas('konselor', function($query) {
            $query->where('user_id', auth()->user()->id);
        })->count();

        $total_pendaftaran_sesi_konseling = PendaftaranKonseling::whereHas('sesiKonseling.konselor', function($query) {
            $query->where('user_id', auth()->user()->id);
        })->count();
        
        return view('konselor.dashboard',compact('total_sesi_konseling','total_pendaftaran_sesi_konseling'));
    }

    public function sesi_konseling_konselor()
    {
        $sesi_konseling = SesiKonseling::whereHas('konselor', function($query) {
            $query->where('user_id', auth()->user()->id);
        })->get();

        return view('konselor.sesi_konseling',compact('sesi_konseling'));
    }

    public function sesi_konseling_konselor_show($id)
    {
        $data = SesiKonseling::with('konselor.user')->find($id);
        return response()->json($data);
    }

    public function pendaftaran_konseling_konselor_index()
    {
        $data = PendaftaranKonseling::whereHas('sesiKonseling.konselor', function($query) {
            $query->where('user_id', auth()->user()->id);
        })->get();
        return view('konselor.pendaftaran_konseling',compact('data'));       
    }

    public function pendaftaran_konseling_konselor_show($id)
    {
        $data = PendaftaranKonseling::with('sesiKonseling.konselor.user','mahasiswa')->find($id);
        // dd($data);
        return response()->json($data);
    }
    public function pendaftaran_konseling_konselor_edit($id)
    {
        $data = PendaftaranKonseling::with('sesiKonseling.konselor.user','mahasiswa')->find($id);
        return response()->json($data);
    }
    public function pendaftaran_konseling_konselor_update($id, Request $request)
    {
        $sesi_konseling = PendaftaranKonseling::findOrFail($id); 

        $validatedData = $request->validate([           
            'kesimpulan' => 'required',
        ]);

        $sesi_konseling->update($validatedData);

        return response()->json(['message' => 'Data Updated successfully']);
    }

    
    public function index_mahasiswa()
    {      
        $total_pendaftaran_sesi_konseling = PendaftaranKonseling::where('mahasiswa_id',auth()->user()->id)->count();
        $total_pendaftaran_sesi_konseling_selesai = PendaftaranKonseling::where('mahasiswa_id',auth()->user()->id)->where('status','Selesai')->count();

        
        return view('mahasiswa.dashboard',compact('total_pendaftaran_sesi_konseling','total_pendaftaran_sesi_konseling_selesai'));
    }


    public function pendaftaran_konseling_mahasiswa_index()
    {
        $data = PendaftaranKonseling::where('mahasiswa_id',auth()->user()->id)->get();
        return view('mahasiswa.pendaftaran_konseling',compact('data'));       
    }

    public function pendaftaran_konseling_mahasiswa_show($id)
    {
        $data = PendaftaranKonseling::with('sesiKonseling.konselor.user','mahasiswa')->find($id);
        // dd($data);
        return response()->json($data);
    }

    public function laporan()
    {

        $data = PendaftaranKonseling::get();
        return view('admin.laporan.index',compact('data'));
    }

    public function laporan_export($id)
    {
        $data = PendaftaranKonseling::find($id);
        return view('admin.laporan.export',compact('data'));

    }
}
