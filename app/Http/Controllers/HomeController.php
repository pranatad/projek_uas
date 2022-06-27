<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->home = new Home();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'supplier' => $this->home->countSupplier(),
            'barang' => $this->home->countBarang(),
            'pembelian' => $this->home->countPembelian(),
            'penjualan' => $this->home->countPenjualan(),
        ];
        return view('home', $data);
    }
}
