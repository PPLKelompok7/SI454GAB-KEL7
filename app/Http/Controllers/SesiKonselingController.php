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
}