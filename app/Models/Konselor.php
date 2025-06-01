<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Konselor extends Model
{
    use HasFactory,SoftDeletes;

    protected $table ='konselor';
    protected $guarded = ['id'];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function sesiKonseling()
    {
        return $this->hasMany(SesiKonseling::class);
    }

}
