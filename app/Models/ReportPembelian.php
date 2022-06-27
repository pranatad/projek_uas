<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReportPembelian extends Model
{
    use HasFactory;

    public function list($tglawal, $tglakhir)
    {
        return DB::table('pembelian')
            ->select('pembelian.nofaktur AS nofaktur', 'pembelian.tglmasuk AS tglmasuk', 'pembelian.supplier AS idsupplier', 'pembelian.totalitem AS totalitem', 'pembelian.totalbayar AS totalbayar', 'supplier.nama AS namasupplier')
            ->join('supplier', 'supplier.id', '=', 'pembelian.supplier')
            ->whereBetween('tglmasuk', array($tglawal, $tglakhir))
            ->get();
    }
}
