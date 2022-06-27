<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StokBarang extends Model
{
    use HasFactory;

    public function list()
    {
        return DB::table('barang')
            ->select('barang.kode AS kode', 'barang.nama AS namabarang', 'jenis.nama AS namajenis', 'barang.stok AS stok', 'satuan.nama AS namasatuan', 'barang.hargabeli AS hargabeli', 'barang.hargajual AS hargajual', 'barang.biayapesan AS biayapesan', 'barang.biayasimpan AS biayasimpan', 'barang.leadtime AS leadtime', 'barang.jenis AS jenis', 'barang.satuan AS satuan')
            ->join('jenis', 'jenis.id', '=', 'jenis')
            ->join('satuan', 'satuan.id', '=', 'satuan')
            ->get();
    }
}
