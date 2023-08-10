<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
   public function index()
   {
        $pengiriman = Pengiriman::paginate(5);
        return view('admin.pengiriman',compact('pengiriman'));
   }

   public function create()
   {
    return view('admin.pengiriman-create');

   }

   public function store()
   {
    Pengiriman::create(
        [
            'kota' => request()->kota,
            'ongkir' => request()->ongkir,
        ]
        );
    toastr()
    ->success('Data Berhasil disimpan ');
    return redirect('/pengiriman');
   }

   public function edit($id)
   {
    $pengiriman = Pengiriman::find($id);
    return view('admin.pengiriman-edit',compact('pengiriman'));

   }

   public function update($id)
   {
    $pengiriman = Pengiriman::find($id);

    $pengiriman->update(
        [
            'kota' => request()->kota,
            'ongkir' => request()->ongkir,
        ]
        );
    toastr()
    ->success('Data Berhasil disimpan ');
    return redirect('/pengiriman');
   }

   public function destroy($id)
   {
    $pengiriman = Pengiriman::find($id);

    $pengiriman->delete();
    toastr()
    ->success('Data Berhasil disimpan ');
    return redirect('/pengiriman');
   }
}
