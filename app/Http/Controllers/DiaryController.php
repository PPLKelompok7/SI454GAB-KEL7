<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiaryController extends Controller
{
    public function index()
    {
        $diaries = Diary::where('user_id', Auth::id())
                        ->orderBy('entry_date', 'desc')
                        ->get();
        
        return view('mahasiswa.diary', compact('diaries'));
    }

    public function create()
    {
        return response()->json(['message' => 'Create diary form']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'entry_date' => 'required|date',
        ]);

        $validatedData['user_id'] = Auth::id();

        Diary::create($validatedData);

        return response()->json(['success' => true, 'message' => 'Diary entry created successfully.']);
    }

    public function show($id)
    {
        $diary = Diary::where('id', $id)
                     ->where('user_id', Auth::id())
                     ->firstOrFail();
        
        return response()->json($diary);
    }

    public function edit($id)
    {
        $diary = Diary::where('id', $id)
                     ->where('user_id', Auth::id())
                     ->firstOrFail();
        
        return response()->json($diary);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'entry_date' => 'required|date',
        ]);

        $diary = Diary::where('id', $id)
                     ->where('user_id', Auth::id())
                     ->firstOrFail();
        
        $diary->update($validatedData);

        return response()->json(['success' => true, 'message' => 'Diary entry updated successfully.']);
    }

    public function destroy($id)
    {
        $diary = Diary::where('id', $id)
                     ->where('user_id', Auth::id())
                     ->firstOrFail();
        
        $diary->delete();

        return response()->json(['success' => true, 'message' => 'Diary entry deleted successfully.']);
    }
}