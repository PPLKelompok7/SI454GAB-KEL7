<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratIzinSakit extends Model
{
    use HasFactory;
    protected $table = 'surat_izin_sakit';
    protected $fillable = ['user_id', 'tanggal_mulai', 'tanggal_selesai', 'alasan', 'bukti_file', 'status'];
}
