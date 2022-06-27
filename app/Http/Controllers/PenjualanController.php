<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Supplier;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function __construct()
    {
        $this->penjualan = new Penjualan();
        $this->supplier = new Supplier();
        $this->barang = new Barang();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'penjualan' => $this->penjualan->list()
        ];
        return view('penjualan', $data);
    }

    public function add()
    {
        $datenow = date('Y-m-d');

        $generateRandom = rand(100, 999);
        $generateDate = date('YmdHis');
        $generatefaktur = 'KL-' . $generateDate . $generateRandom;
        $data = [
            'detail' => $this->penjualan->detail($generatefaktur),
            'supplier' => $this->supplier->list(),
            'barang' => $this->barang->list(),
            'faktur' => $generatefaktur,
            'datenow' => $datenow
        ];
        return view('tambah-penjualan', $data);
    }

    public function tabledetail(Request $request)
    {
        $faktur = Request()->faktur;

        $data = [
            'detail' =>  $this->penjualan->detail($faktur)
        ];

        echo view('tablepenjualan', $data);
    }

    public function savedetail(Request $request)
    {
        $data = [
            'nofaktur' => Request()->faktur,
            'kodebarang' => Request()->kodebarang,
            'qty' => Request()->qty,
            'jumlah' => Request()->jumlah,
        ];
        $this->penjualan->saveData($data);

        $kodebarang = Request()->kodebarang;

        $datadua = [
            'stok' => Request()->stok - Request()->qty,
        ];
        $this->barang->updateData($kodebarang, $datadua);
    }

    public function deletedetail(Request $request)
    {
        $id = Request()->id;

        $this->penjualan->deleteData($id);
    }

    public function saveTransaction(Request $request)
    {
        $data = [
            'nofaktur' => Request()->faktur,
            'tglkeluar' => Request()->tanggal,
            'totalitem' => Request()->totalitem,
            'totalbayar' => Request()->totalbayar,
        ];
        $this->penjualan->saveDataTransaction($data);
    }

    public function faktur($id)
    {
        $data = [
            'penjualan' => $this->penjualan->fakturpenjualan($id),
            'detailpenjualan' => $this->penjualan->detail($id),
        ];

        return view('reports/faktur-penjualan', $data);
    }
}
