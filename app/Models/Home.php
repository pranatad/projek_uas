<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Home extends Model
{
    use HasFactory;

    public function countSupplier()
    {
        return DB::table('supplier')->get()->count('id');
    }

    public function countBarang()
    {
        return DB::table('barang')->get()->count('kode');
    }

    public function countPembelian()
    {
        return DB::table('pembelian')->get()->count('id');
    }

    public function countPenjualan()
    {
        return DB::table('penjualan')->get()->count('id');
    }
}
