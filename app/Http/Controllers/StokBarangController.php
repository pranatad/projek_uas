<?php

namespace App\Http\Controllers;

use App\Models\StokBarang;
use Illuminate\Http\Request;

class StokBarangController extends Controller
{
    public function __construct()
    {
        $this->stokbarang = new StokBarang();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'stokbarang' => $this->stokbarang->list()
        ];
        return view('stok-barang', $data);
    }

    public function report()
    {
        $data = [
            'stokbarang' => $this->stokbarang->list(),
        ];

        return view('reports/report-stok-barang', $data);
    }
}
