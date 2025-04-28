<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranKonseling;
use App\Models\SesiKonseling;
use Illuminate\Http\Request;

class PendaftaranKonselingController extends Controller
{
    public function index()
    {
        $data = PendaftaranKonseling::get();
        return view('admin.pendaftaran_konseling.index',compact('data'));       
    }

    public function show($id)
    {
        $data = PendaftaranKonseling::with('sesiKonseling.konselor.user','mahasiswa')->find($id);
        // dd($data);
        return response()->json($data);
    }
    public function edit($id)
    {
        $data = PendaftaranKonseling::with('sesiKonseling.konselor.user','mahasiswa')->find($id);
        return response()->json($data);
    }
    public function update($id, Request $request)
    {
        $sesi_konseling = PendaftaranKonseling::findOrFail($id); 

        $validatedData = $request->validate([           
            'status' => 'required',
            'link' => 'required',
        ]);

        $sesi_konseling->update($validatedData);

        if ($validatedData['status'] == 'Selesai') {
            SesiKonseling::where('id', $sesi_konseling->sesi_konseling_id)
                ->update(['status' => 'Tersedia']);
        }

        return response()->json(['message' => 'Data Updated successfully']);
    }   

}
