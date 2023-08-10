<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisLangganan extends Model
{
    use HasFactory;
    protected $table="jenis_langganan";
    protected $fillable = ['nama_jenis', 'gambar', 'deskripsi', 'diskon', 'is_member'];
}
