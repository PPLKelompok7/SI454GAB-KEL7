<?php

namespace App\Http\Controllers;

use App\Models\Komunitas;
use App\Models\Komunitas_komentar;
use Illuminate\Http\Request;
use App\Models\Konselor;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class MahasiswaKomunitasController extends Controller
{
    public function komunitas(){
        $data = [
            'page_title' => 'Komunitas',
            'sub_title' => 'Daftar Komunitas',
            'komunitas' => Komunitas::get(),
        ];

        return view('mahasiswa.komunitas.index', $data);
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
        return view('mahasiswa.komunitas.read-komunitas', $data);
    }

    public function doKomentar(Request $request){
        $insert = Komunitas_komentar::create([
            'id_komunitas' => $request->input('id_komunitas'),
            'id_user' => Auth::user()->id,
            'komentar' => $request->input('komentar')
        ]);

        if($insert){
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }
}
