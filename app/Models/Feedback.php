<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedback'; // Nama tabel di database
    protected $fillable = ['user_id', 'isi_feedback']; // Kolom yang boleh diisi
}
