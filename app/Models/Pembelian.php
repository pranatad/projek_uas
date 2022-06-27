<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pembelian extends Model
{
    use HasFactory;

    public function list()
    {
        return DB::table('pembelian')
            ->select('pembelian.nofaktur AS nofaktur', 'pembelian.tglmasuk AS tglmasuk', 'pembelian.supplier AS idsupplier', 'pembelian.totalitem AS totalitem', 'pembelian.totalbayar AS totalbayar', 'supplier.nama AS namasupplier')
            ->join('supplier', 'supplier.id', '=', 'pembelian.supplier')
            ->get();
    }

    public function fakturpembelian($nofaktur)
    {
        return DB::table('pembelian')
            ->select('pembelian.nofaktur AS nofaktur', 'pembelian.tglmasuk AS tglmasuk', 'pembelian.supplier AS idsupplier', 'pembelian.totalitem AS totalitem', 'pembelian.totalbayar AS totalbayar', 'supplier.nama AS namasupplier')
            ->join('supplier', 'supplier.id', '=', 'pembelian.supplier')
            ->where('pembelian.nofaktur', '=', $nofaktur)
            ->get();
    }

    public function detail($nofaktur)
    {
        return DB::table('detailpembelian')
            ->select('detailpembelian.id AS id', 'detailpembelian.nofaktur AS nofaktur', 'detailpembelian.kodebarang AS kodebarang', 'detailpembelian.qty AS qty', 'detailpembelian.jumlah AS jumlah', 'barang.nama AS namabarang', 'barang.hargabeli AS hargabeli', 'barang.stok AS stok')
            ->join('barang', 'detailpembelian.kodebarang', '=', 'barang.kode')
            ->where('detailpembelian.nofaktur', '=', $nofaktur)
            ->get();
    }

    public function saveData($data)
    {
        DB::table('detailpembelian')->insert($data);
    }

    public function deleteData($id)
    {
        DB::table('detailpembelian')
            ->where('id', '=', $id)
            ->delete();
    }

    public function saveDataTransaction($data)
    {
        DB::table('pembelian')->insert($data);
    }
}
