<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Menu;
use App\Models\User;
use App\Models\Pesanan;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use App\Models\FeedbackModel;
use App\Models\JenisLangganan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        //

        // $idUser = Auth::user()->id;
        $data = Menu::where('jenis_menu', 'terbaik')->get();

        return view('halaman_awal', compact('data'));

    }
    public function profile()
    {
        //

        $data = User::find(Auth::user()->id);

        return view('profile', compact('data'));

    }


    public function menu()
    {
        //$data=Menu::all();

        $data = Menu::where("kategori_id", 1)->get();
        $data2 = Menu::where("kategori_id", 2)->get();
        $data3 = Menu::where("kategori_id", 3)->get();
        // dd($data2);

        return view('menu', compact('data', 'data2', 'data3'));
    }

    public function jenis()
    {
        $data = JenisLangganan::all();
        return view('jenis_langganan', compact('data'));
    }
    public function updateProfile(Request $request, $id)
    {

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->update();
        toastr()
        ->success('Sukses Merubah Profile');
        // dd($request->all());
        return redirect('/profile');
    }
    public function deletePesananUser($id)
    {

        $user = User::find($id);
        $pesanan = Pesanan::where('user_id', $user->id);
        $pesanan->delete();
        $user->update();
        toastr()
        ->success('Sukses Menghapus Data ');
        // dd($request->all());
        return redirect('/pesanan-user');
    }

    public function contact()
    {
        //
        return view('contact');
    }

    public function status()
    {
        //
        // $invoice = Pesanan::where('user_id', Auth::user()->id)->where('status', 'proses')->get();
        $user = User::find(Auth::user()->id);
        $data_pesanan = Pesanan::where('user_id', Auth::user()->id)->get();
        $lastCheckout = Pesanan::where('user_id', Auth::user()->id)->latest()->first();
        // dd($data_pesanan);
        // $no_onvoice = Pesanan::where('user_id', Auth::user()->id)->pluck('no_pesanan');
        $no_onvoice = Pesanan::where('user_id', Auth::user()->id)->latest()->value('no_pesanan');
        return view('status', compact('data_pesanan', 'user', 'lastCheckout', 'no_onvoice'));
    }

    public function createLangganan(Request $request, $id)

    {
        $langganan = JenisLangganan::find($id);
        // dd($langganan->nama_jenis);

        $userId = Auth::user()->id;

        $user = User::find($userId);
        $user->is_member = $langganan->id;
        $user->save();
        toastr()
        ->info('Terimakasih telah Join Member');



        // return Redirect::back();
    }
    public function kirimMasukkan(Request $request, $id)

    {
        $feedback = new FeedbackModel();
        // dd($langganan->nama_jenis);


        $feedback->user_id = $id;
        $feedback->isi = $request->isi;
        $feedback->save();
        toastr()
        ->info('Terimakasih Atas Masukannya');
        return redirect('/contact');




        // return Redirect::back();
    }

    public function detail($id)
{
    $userId = Auth::user()->id;
    $user = User::find($userId);
    $pesanan = Pesanan::where('user_id', $user->id)->first();
    $diskonMember = 0; // Default diskon
    $jenisLangganan = JenisLangganan::find($user->is_member);


    if ($jenisLangganan == null) {
                $diskonMember = 0;
                # code...
            } else {
                # code...
                $diskonMember = $jenisLangganan->diskon;
            }

    $menuById = Menu::find($id);
    $pengiriman = Pengiriman::all();
    //dd($diskonMember);
   //dd($jenisLangganan);


    return view('detail_pesanan', compact('menuById', 'diskonMember', 'pengiriman', 'jenisLangganan'));
}


    /**
     * Show the form for creating a new resource.
     */
    // user pilih menu
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        // inisialisasi table
        $userId = Auth::user()->id;
        $kategoriId = $request->kategori_id;
        $noPesanan = 'VC-' . sprintf("%06d", rand(0, 9999));
        $namaMenu = $request->nama_menu;
        $deskripsi = $request->deskripsi;
        $alamat = $request->alamat;
        $harga = $request->harga;
        $qty = $request->quantity;
        $qty_paket = $request->qty_paket;
        $subtotal = $request->subtotal;
        $ongkir = $request->ongkir;
        $diskon = $request->diskon;
        $total = $request->total;
        $deskripsi = Menu::find($request->menu_id);
        $tanggal = $now = Carbon::now();
        // dd($namaMenu);
        // dd($deskripsi);
        $pesanan = new Pesanan;

        $pesanan->user_id = $userId;
        $pesanan->kategori_id = $kategoriId;
        $pesanan->no_pesanan = $noPesanan;
        $pesanan->nama_menu = $namaMenu;
        $pesanan->deskripsi = $deskripsi->deskripsi;
        $pesanan->harga = $harga;
        $pesanan->qty = $qty;
        $pesanan->qty_paket = $qty_paket;
        $pesanan->alamat = $alamat;
        $pesanan->subtotal = $subtotal;
        $pesanan->ongkir = $ongkir;
        $pesanan->diskon = $diskon;
        $pesanan->total = $total;
        $pesanan->created_at = $tanggal;
        $pesanan->updated_at = $tanggal;
        $pesanan->save();
        // dd($pesanan);

        toastr()
            ->success('Sukses checkout '.$namaMenu);
        return Redirect::back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
