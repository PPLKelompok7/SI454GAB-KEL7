<?php

namespace App\Http\Controllers;

use App\Models\Komunitas;
use App\Models\Komunitas_komentar;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class KomunitasController extends Controller
{
    public function index(){
        $data = [
            'page_title' => 'Komunitas',
            'sub_title' => 'Daftar Komunitas',
            'komunitas' => Komunitas::get(),
        ];

        return view('admin.komunitas.index', $data);
    }

    public function tambahKomunitas(){
        $data = [
            'page_title' => 'Komunitas',
            'sub_title' => 'Tambah Komunitas',
            'komunitas' => Komunitas::get(),
        ];

        return view('admin.komunitas.tambah-komunitas', $data);
    }

    public function editKomunitas($id_komunitas){
        $data = [
            'page_title' => 'Komunitas',
            'sub_title' => 'Tambah Komunitas',
            'komunitas' => Komunitas::find($id_komunitas),
        ];

        // dd($data);
        return view('admin.komunitas.edit-komunitas', $data);
    }

    public function storeKomunitas(Request $request){
        try {
            $request->validate([
                'nama_komunitas' => 'required|string|max:255',
                'kategori' => 'required|string|max:100',
                'deskripsi' => 'nullable|string',
            ]);
    
            $path = null;
            if ($request->hasFile('img')) {
                $path = $request->file('img')->store('img_komunitas', 'public');
            }
    
            $komunitas = new Komunitas();
            $komunitas->nama_komunitas = $request->nama_komunitas;
            $komunitas->kategori_komunitas = $request->kategori;
            $komunitas->deskripsi = $request->deskripsi;
            $komunitas->artikel = $request->artikel;
            $komunitas->img_path = $path;
            $komunitas->save();
    
            return response()->json([
                'msg' => 'Data komunitas berhasil disimpan',
                'data' => $komunitas
            ], 200);
    
        } catch (\Exception $e) {
            return response()->json([
                'msg' => 'Terjadi kesalahan saat menyimpan data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function saveKomunitas(Request $request){
        try {
            $request->validate([
                'id' => 'required|exists:komunitas,id', // pastikan ID dikirim
                'nama_komunitas' => 'required|string|max:255',
                'kategori' => 'required|string|max:100',
                'deskripsi' => 'nullable|string',
                'artikel' => 'nullable|string',
            ]);
    
            $path = null;
            if ($request->hasFile('img')) {
                $path = $request->file('img')->store('img_komunitas', 'public');
            }
    
            $komunitas = Komunitas::findOrFail($request->id);
            $komunitas->update([
                'nama_komunitas' => $request->nama_komunitas,
                'kategori_komunitas' => $request->kategori,
                'deskripsi' => $request->deskripsi,
                'artikel' => $request->artikel,
                'img_path' => $path ?? $komunitas->img_path, // pakai path baru jika ada
                'updated_at' => now()
            ]);
    
            return response()->json([
                'msg' => 'Data komunitas berhasil disimpan',
                'data' => $komunitas
            ], 200);
    
        } catch (\Exception $e) {
            return response()->json([
                'msg' => 'Terjadi kesalahan saat menyimpan data',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    

    public function deleteKomunitas(Request $request){
        $id = $request->input('id');
        $komuntas = Komunitas::where('id', $id)->delete();

        if($komuntas){
            return response()->json(['status' => true, 'msg' => 'Komunitas berhasil dihapus']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Komunitas gagal dihapus']);
        }
    }

    public function readKomunitas($id_komunitas){
        $komunitas = Komunitas::find($id_komunitas);
        $komentar = Komunitas_komentar::with('user')->where('id_komunitas', $id_komunitas)->get();
        $data = [
            'page_title' => $komunitas->nama_komunitas,
            'sub_title' => $komunitas->kategori_komunitas,
            'komunitas' => $komunitas,
            'komentar' => $komentar
        ];

        // dd($data);
        return view('admin.komunitas.read-komunitas', $data);
    }
}
