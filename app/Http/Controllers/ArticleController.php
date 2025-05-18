<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function update(Request $request, $id) {
        $request->validate([
            'judul'   => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'isi'     => 'required|string',
            'gambar'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $article = Article::findOrFail($id);

        // Jika gambar baru diunggah
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($article->gambar && file_exists(public_path('storage/artikel/' . $article->gambar))) {
                unlink(public_path('storage/artikel/' . $article->gambar));
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/artikel/'), $filename);
            $article->gambar = $filename;
        }

        $article->judul   = $request->judul;
        $article->penulis = $request->penulis;
        $article->isi     = $request->isi;
        $article->save();

        return redirect()->route('article.index')->with('success', 'Artikel berhasil diperbarui');
    }

    public function destroy($id)
{
    $article = Article::findOrFail($id);

    // Hapus gambar jika ada
    if ($article->gambar && Storage::exists('public/gambar/' . $article->gambar)) {
        Storage::delete('public/gambar/' . $article->gambar);
    }

    $article->delete();

    return redirect()->route('article.index')->with('success', 'Artikel berhasil dihapus.');
}

}
