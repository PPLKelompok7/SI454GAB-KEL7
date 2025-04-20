<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendaftaranKonseling extends Model
{
    use HasFactory,SoftDeletes;

    protected $table ='pendaftaran_konseling';
    protected $guarded = ['id'];

    public function sesiKonseling()
    {
        return $this->belongsTo(SesiKonseling::class);
    }

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }
    
}
