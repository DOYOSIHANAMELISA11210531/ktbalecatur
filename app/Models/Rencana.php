<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rencana extends Model
{
    use HasFactory;
    protected $table = 'rencana';
    protected $fillable = ['title', 'pj_kegiatan', 'tanggal', 'kategori_id', 'deskripsi', 'image'];

}
