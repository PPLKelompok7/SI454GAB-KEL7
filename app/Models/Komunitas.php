<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Komunitas extends Model
{
    use SoftDeletes;

    protected $table = "komunitas";
    protected $guarded = [
    ];

    protected $hidden = [
        'deleted_at',
    ];

}