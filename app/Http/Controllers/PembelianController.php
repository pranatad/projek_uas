<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pembelian;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function __construct()
    {
        $this->pembelian = new Pembelian();
        $this->supplier = new Supplier();
        $this->barang = new Barang();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'pembelian' => $this->pembelian->list()
        ];
        return view('pembelian', $data);
    }

    public function add()
    {
        $datenow = date('Y-m-d');

        $generateRandom = rand(100, 999);
        $generateDate = date('YmdHis');
        $generatefaktur = 'MS-' . $generateDate . $generateRandom;
        $data = [
            'detail' => $this->pembelian->detail($generatefaktur),
            'supplier' => $this->supplier->list(),
            'barang' => $this->barang->list(),
            'faktur' => $generatefaktur,
            'datenow' => $datenow
        ];
        return view('tambah-pembelian', $data);
    }

    public function tabledetail(Request $request)
    {
        $faktur = Request()->faktur;

        $data = [
            'detail' =>  $this->pembelian->detail($faktur)
        ];

        echo view('tablepembelian', $data);
    }

    public function savedetail(Request $request)
    {
        $data = [
            'nofaktur' => Request()->faktur,
            'kodebarang' => Request()->kodebarang,
            'qty' => Request()->qty,
            'jumlah' => Request()->jumlah,
        ];
        $this->pembelian->saveData($data);

        $kodebarang = Request()->kodebarang;

        $datadua = [
            'stok' => Request()->stok + Request()->qty,
        ];
        $this->barang->updateData($kodebarang, $datadua);
    }

    public function deletedetail(Request $request)
    {
        $id = Request()->id;

        $this->pembelian->deleteData($id);
    }

    public function saveTransaction(Request $request)
    {
        $data = [
            'nofaktur' => Request()->faktur,
            'tglmasuk' => Request()->tanggal,
            'supplier' => Request()->idsupplier,
            'totalitem' => Request()->totalitem,
            'totalbayar' => Request()->totalbayar,
        ];
        $this->pembelian->saveDataTransaction($data);
    }

    public function faktur($id)
    {
        $data = [
            'pembelian' => $this->pembelian->fakturpembelian($id),
            'detailpembelian' => $this->pembelian->detail($id),
        ];

        return view('reports/faktur-pembelian', $data);
    }
}
