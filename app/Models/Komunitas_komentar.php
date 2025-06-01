<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Komunitas_komentar extends Model
{
    use SoftDeletes;

    protected $table = "komunitas_komentar";
    protected $guarded = [
    ];

    protected $hidden = [
        'deleted_at',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

}
