<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SesiKonseling extends Model
{
    use HasFactory,SoftDeletes;

    protected $table ='sesi_konseling';
    protected $guarded = ['id'];

    public function konselor()
    {
        return $this->belongsTo(Konselor::class, 'konselor_id', 'id');
    }

    public function pendaftaranKonseling()
    {
        return $this->hasMany(PendaftaranKonseling::class);
    }
}
