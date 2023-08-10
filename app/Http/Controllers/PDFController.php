<?php

namespace App\Http\Controllers;

use App\Models\FeedbackModel;
use App\Models\JenisLangganan;
use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;
Use PDF;
use Dompdf\Dompdf;

class PDFController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function cetak_pdf()
    {
        $dompdf = new Dompdf();


// Render the HTML as PDF

// Output the generated PDF to Browser
        $menu = Menu::all();
        $pesananUser = Pesanan::all();
        $dataUser = User::all();
        $feedbackUser = FeedbackModel::all();
        $pdf = PDF::loadView('admin.report', compact('menu', 'pesananUser', 'dataUser', 'feedbackUser'));
        // $pdf->setPaper('A4', 'potrait');

        return $pdf->stream('admin.report');
    }
}
