<?php

// app/Http/Controllers/FeedbackController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::where('user_id', Auth::id())->latest()->get();
        return view('feedback.index', compact('feedbacks'));
    }

    public function create()
    {
        return view('feedback.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'isi_feedback' => 'required|string|max:1000',
        ]);
        Feedback::create([
            'user_id' => Auth::id(),
            'isi_feedback' => $request->isi_feedback,
        ]);
        return redirect()->route('feedback.index')->with('success', 'Feedback berhasil dikirim.');
    }

    public function edit($id)
    {
        $feedback = Feedback::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('feedback.edit', compact('feedback'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'isi_feedback' => 'required|string|max:1000',
        ]);
        $feedback = Feedback::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $feedback->update(['isi_feedback' => $request->isi_feedback]);
        return redirect()->route('feedback.index')->with('success', 'Feedback berhasil diupdate.');
    }

    public function destroy($id)
    {
        $feedback = Feedback::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $feedback->delete();
        return redirect()->route('feedback.index')->with('success', 'Feedback berhasil dihapus.');
    }
}
