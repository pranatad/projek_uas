<?php

namespace App\Http\Controllers;

use App\Models\ReportPenjualan;
use Illuminate\Http\Request;

class ReportPenjualanController extends Controller
{
    public function __construct()
    {
        $this->reportpenjualan = new ReportPenjualan();
        $this->middleware('auth');
    }

    public function index()
    {
        return view('report-penjualan');
    }

    public function report()
    {
        $tglawal = Request()->tglawal;
        $tglakhir = Request()->tglakhir;

        $data = [
            'reportpenjualan' => $this->reportpenjualan->list($tglawal, $tglakhir),
            'tglawal' => $tglawal,
            'tglakhir' => $tglakhir
        ];

        return view('reports/report-penjualan', $data);
    }
}
