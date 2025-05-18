<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konselor;
use App\Models\User;
use App\Models\Webinar;

class WebinarController extends Controller
{
    public function index()
    {
        $konselor = Konselor::get();
        $user = User::where('is_role', "Konselor")->get();
        $webinars = Webinar::all();
        return view('admin.webinar.index', compact('konselor', 'user', 'webinars'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'gambar' => 'nullable|image',
            'user_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'jam' => 'required|regex:/^\d{2}:\d{2}-\d{2}:\d{2}$/',
            'deskripsi' => 'required|string',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('webinars', 'public');
            $validated['gambar'] = $path;
        }

        $webinar = Webinar::create($validated);

        return response()->json([
            'message' => 'Webinar berhasil ditambahkan.',
            'data' => $webinar
        ]);
    }

}