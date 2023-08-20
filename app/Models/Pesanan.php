<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table="pesanan";
    protected $fillable = [	'id','user_id', 'kategori_id','no_pesanan',	'nama_menu',	'deskripsi',	'harga', 'qty',	'qty_paket' , 'alamat',	'subtotal',	'ongkir', 'diskon',	'total', 'status'
];
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Kategori(){
        return $this->belongsTo(Kategori::class);
    }
}
