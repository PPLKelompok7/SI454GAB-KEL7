<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konselor;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class KonselorController extends Controller
{
    public function index()
    {
        $konselor = Konselor::get();
        $user = User::where('is_role',"Konselor")->get();

        return view('admin.konselor.index',compact('konselor','user'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'user_id' => 'required',
            'nip' => 'required',
            'no_telepon' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image',
            
        ]);

        if ($request->deskripsi) {
            $validatedData['deskripsi'] = nl2br($request->deskripsi);
        }

        if ($request->hasFile('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('img-foto-konselor');
        }

        Konselor::create($validatedData);

        return response()->json(['message' => 'Data created successfully']);
    }
    public function show($id)
    {
        $data = Konselor::with('user')->find($id);
        return response()->json($data);
    }
    public function edit($id)
    {
        $data = Konselor::find($id);
        return response()->json($data);
    }

}