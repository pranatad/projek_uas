<?php

namespace App\Http\Controllers;

use App\Models\ReportPembelian;
use Illuminate\Http\Request;

class ReportPembelianController extends Controller
{
    public function __construct()
    {
        $this->reportpembelian = new ReportPembelian();
        $this->middleware('auth');
    }

    public function index()
    {
        return view('report-pembelian');
    }

    public function report()
    {
        $tglawal = Request()->tglawal;
        $tglakhir = Request()->tglakhir;

        $data = [
            'reportpembelian' => $this->reportpembelian->list($tglawal, $tglakhir),
            'tglawal' => $tglawal,
            'tglakhir' => $tglakhir
        ];

        return view('reports/report-pembelian', $data);
    }
}
