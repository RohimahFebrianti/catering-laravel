<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table="menu";
    public function Kategori(){
        return $this->belongsTo(Kategori::class);
    }
}
