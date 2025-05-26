<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Konselor;
use Illuminate\Http\Request;
use App\Models\SesiKonseling;
use App\Models\PendaftaranKonseling;

class WebsiteController extends Controller
{
    public function index()
    {
        $konselor = Konselor::get();
        $total_mahasiswa = User::where('is_role',"Mahasiswa")->count();
        $total_selesai_konseling = PendaftaranKonseling::where('status',"Selesai")->count();
        $total_konselor = Konselor::count();
        $sesi_konseling = SesiKonseling::get();

        return view('website.index',compact('total_selesai_konseling','sesi_konseling','konselor','total_mahasiswa','total_konselor'));
    }

    public function konselor()
    {
        $konselor = Konselor::get();
        return view('website.konselor',compact('konselor'));
    }

    public function sesi_konseling()
    {
        $sesi_konseling = SesiKonseling::get();
        return view('website.sesi_konseling',compact('sesi_konseling'));
    }

    public function sesi_konseling_detail($id)
    {
        $sesi_konseling = SesiKonseling::findOrFail($id);

        if ($sesi_konseling->status == 'Terisi') {
            return redirect()->back();
        }
        
        return view('website.sesi_konseling_detail', compact('sesi_konseling'));   
    }

    public function sesi_konseling_post(Request $request)
    {
        $validatedData = $request->validate([
            'sesi_konseling_id' => 'required',
            'nim' => 'required',
            'jurusan' => 'required',
            'fakulitas' => 'required',
            'tempat_tanggal_lahir' => 'required',
            'phone' => 'required',
            'keluhan' => 'required',
            
        ]);

        $validatedData['mahasiswa_id'] = auth()->user()->id;

        PendaftaranKonseling::create($validatedData);

        $sesiKonseling = SesiKonseling::find($validatedData['sesi_konseling_id']);
        if ($sesiKonseling) {
            $sesiKonseling->status = 'Terisi';
            $sesiKonseling->save();
        }

        return redirect('/')->with('success', 'Pendaftaran konseling berhasil ditambahkan!');
   
    }

    
    // public function article() {
    //     $articles = Article::all(); // Ambil semua data artikel
    //     return view('website.article-list', compact('articles'));
    // }

    public function article() {
        $articles = Article::latest()->get();
        return view('website.article-list', compact('articles'));
    }

    public function showArticle($id) {
        $article = Article::findOrFail($id);
        return view('website.article-detail-content', compact('article'));
    }

}
