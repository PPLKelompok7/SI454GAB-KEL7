<?php

namespace App\Http\Controllers;

use App\Models\Konselor;
use Illuminate\Http\Request;
use App\Models\SesiKonseling;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class SesiKonselingController extends Controller
{
    public function index()
    {
        $sesi_konseling = SesiKonseling::get();
        $konselor = Konselor::get();

        return view('admin.sesi_konseling.index',compact('sesi_konseling','konselor'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'konselor_id' => 'required',
            'sesi' => 'required',
            'hari' => 'required',
            'status' => 'required',
            
        ]);

        SesiKonseling::create($validatedData);

        return response()->json(['message' => 'Data created successfully']);
    }

    public function show($id)
    {
        $data = SesiKonseling::with('konselor.user')->find($id);
        return response()->json($data);
    }
    public function edit($id)
    {
        $data = SesiKonseling::find($id);
        return response()->json($data);
    }
    public function update($id, Request $request)
    {
        $sesi_konseling = SesiKonseling::findOrFail($id); 


        $validatedData = $request->validate([
            'konselor_id' => 'required',
            'sesi' => 'required',
            'hari' => 'required',
            'status' => 'required',
        ]);


        $sesi_konseling->update($validatedData);

        return response()->json(['message' => 'Data Updated successfully']);
    }

    
    public function destroy($id)
    {
        $sesi_konseling = SesiKonseling::find($id);
        $sesi_konseling->delete();
        return response()->json(['message' => 'Data deleted successfully']);
    }
}