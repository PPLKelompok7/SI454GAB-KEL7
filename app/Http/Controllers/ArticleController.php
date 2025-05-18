<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
        $articles = Article::all();
        return view('admin.articles.article', ['articles' => $articles]);
    } 

    public function add() {
        return view('admin.articles.article-add');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul'   => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'isi'     => 'required|string',
            'gambar'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Simpan gambar jika ada
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('artikel', 'public');
        }

        // Simpan data ke database
        Article::create([
            'judul'   => $request->judul,
            'penulis' => $request->penulis,
            'isi'     => $request->isi,
            'gambar'  => $gambarPath,
        ]);

        // Redirect dengan pesan sukses
        return redirect('/admin/article')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit($id){
        $article = Article::findOrFail($id);
        return view('admin.articles.article-edit', compact('article'));
    }
}
