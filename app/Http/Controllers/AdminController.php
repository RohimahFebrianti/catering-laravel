<?php

namespace App\Http\Controllers;
use App\Models\FeedbackModel;
use App\Models\JenisLangganan;
use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth');
     }
    public function index()
    {
        $total = Pesanan::sum('total');
        $uang_angka = preg_replace("/[^0-9]/", "", $total);

        $total_pemasukan = number_format($uang_angka / 100, 2);
        $total_menu = Menu::count();
        $feedback = FeedbackModel::count();
        $total_member = User::whereNotNull('is_member')->count();
        // dd($total_member);
        return view('admin.dashboard', compact('total_pemasukan', 'total_menu', 'feedback', 'total_member'));

    }
    public function deletePesananUser($id)
    {   
       
        $pesanan = Pesanan::find($id);
        // dd($id);
        $pesanan->delete();
        toastr()
        ->success('Sukses Menghapus Data ');
        // dd($request->all());
        return redirect('/pesanan-user');
    }
    public function dashboard()
    {
        // admin lte
        $total_pemasukan = Pesanan::sum('total');
        $total_menu = Menu::count();
        $feedback = FeedbackModel::count();
        $total_member = User::whereNotNull('is_member')->count();
        // dd($total_member);
        return view('admin.dashboard', compact('total_pemasukan', 'total_menu', 'feedback', 'total_member'));
    }
    public function allMenu()
    {
        // admin lte
        $dataMenu = Menu::with('kategori')->orderBy('id', 'DESC')->paginate(5);
        // dd($dataMenu);
        return view('admin.all_menu', compact('dataMenu'));
    }
    public function pesananUser()
    {
        // admin lte
        $pesananUser = Pesanan::with('user', 'kategori')->paginate(5);
        // dd($pesananUser);
        return view('admin.pesanan_user', compact('pesananUser'));
    }
    public function managePaket()
    {
        // admin lte
        $jenisLangganan = JenisLangganan::all();
        // dd($pesananUser);
        return view('admin.manage_paket', compact('jenisLangganan'));
    }
    public function editPaket($id)
    {
        // admin lte
        $jenisLangganan = JenisLangganan::find($id);
        // dd($pesananUser);
        return view('admin.edit_paket', compact('jenisLangganan'));
    }
    public function updatePaketProses(Request $request, $id)
    {
        // admin lte
        $jenis_langganan = JenisLangganan::find($id);
        $jenis_langganan->nama_jenis = $request->nama_jenis;
        $jenis_langganan->diskon = $request->diskon;
        $jenis_langganan->deskripsi = $request->deskripsi;
        if ($request->image == null) {
            $jenis_langganan->gambar = $jenis_langganan->gambar;

        } else if($request->image != null){
            $file_nm = $request->image->getClientOriginalName();
            $image = $request->image->move('foto_menu', $file_nm);
            $jenis_langganan->gambar = $image;
        }
        $jenis_langganan->update();
        // dd($pesananUser);
        toastr()
        ->success('Suksses Edit Paket ');
        return redirect('/manage-paket');
    }
    public function dataUser()
    {
        // admin lte
        $dataUser = User::paginate(5);
        // dd($pesananUser);
        return view('admin.data_user', compact('dataUser'));
    }

    public function feedbackUser()
    {
        // admin lte
        $feedbackUser = FeedbackModel::with('user')->orderBy('id', "DESC")->paginate(5);
        // dd($feedbackUser);
        return view('admin.feedback_user', compact('feedbackUser'));
    }
    public function deleteFeedback($id)
    {
        // admin lte
        $feedbackUser = FeedbackModel::find($id);
        $feedbackUser->delete();
        // dd($feedbackUser);
        toastr()
        ->success('Delete Feedback');
        return redirect('feedback-user');
    }
    public function updatePesananUser($id)
    {
        // admin lte
        $pesananUser = Pesanan::find($id);
        $pesananUser->status = 'kirim';
        $pesananUser->update();
        // dd($pesananUser);
        toastr()
        ->success('Pesanan Siap Dikirim ');
        return redirect('/pesanan-user');
    }

    public function editMenu($id)
    {
        // admin lte
        $dataMenu = Menu::with('kategori')->find($id);
        $kategoriAll = Kategori::all();
        // dd($dataMenu);
        return view('admin.update', compact('dataMenu', 'kategoriAll'));
    }
    public function editMenuProses(Request $request, $id)
    {
        // admin lte
        $dataMenu = Menu::with('kategori')->find($id);
        $kategoriAll = Kategori::all();



        $menu = Menu::find($id);
        $menu->nama_menu = $request->nama_menu;
        $menu->deskripsi = $request->deskripsi;
        $menu->harga = $request->harga;
        $menu->kategori_id = $request->kategori_id;
        $menu->jenis_menu = $request->jenis_menu;

            if ($request->image == null) {
                $menu->gambar = $dataMenu->gambar;

            } else if($request->image != null){
                $file_nm = $request->image->getClientOriginalName();
                $image = $request->image->move('foto_menu', $file_nm);
                $menu->gambar = $image;
            }
        $menu->update();
        // dd($dataMenu);
        toastr()
        ->success('Sukses Update Menu');
        return redirect('allmenu');


    }
    public function tambahMenu()
    {
        $kategoriAll = Kategori::all();
        // dd($dataMenu);
        return view('admin.create', compact('kategoriAll'));
    }
    public function hapusMenu($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        toastr()
        ->success('Sukses Hapus Menu ');
        return redirect('allmenu');
    }
    public function getAlamatPengirimanById($id)
    {
        $pesanan = Pesanan::find($id);
        $user = User::find($pesanan->user_id);

       
        $alamat = $pesanan->alamat;
        $userPenerima = $user->name;
        // dd($alamat);
        return response()->json(['alamat' => $alamat, 'userPenerima' => $userPenerima]);

    
    }
    public function prosesTambah(Request $request)
    {
        // admin lte
        $kategoriAll = Kategori::all();
        $file_nm = $request->image->getClientOriginalName();
        $image = $request->image->move('foto_menu', $file_nm);

        $menu = new Menu();
        $menu->nama_menu = $request->nama_menu;
        $menu->deskripsi = $request->deskripsi;
        $menu->harga = $request->harga;
        $menu->kategori_id = $request->kategori_id;
        $menu->gambar = $image;
        $menu->jenis_menu = $request->jenis_menu;
        $menu->save();
        // dd($dataMenu);
        toastr()
        ->success('Sukses Tambah Menu ');
        return redirect('allmenu');


    }

    /**
     * Show the form for creating a new resource.
     */
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
