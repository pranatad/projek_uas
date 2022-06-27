<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReportPenjualan extends Model
{
    use HasFactory;

    public function list($tglawal, $tglakhir)
    {
        return DB::table('penjualan')
            ->select('penjualan.nofaktur AS nofaktur', 'penjualan.tglkeluar AS tglkeluar', 'penjualan.totalitem AS totalitem', 'penjualan.totalbayar AS totalbayar')
            ->whereBetween('tglkeluar', array($tglawal, $tglakhir))
            ->get();
    }
}
