<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Supplier extends Model
{
    use HasFactory;

    public function list()
    {
        return DB::table('supplier')->get();
    }

    public function saveData($data)
    {
        DB::table('supplier')->insert($data);
    }

    public function updateData($id, $data)
    {
        DB::table('supplier')
            ->where('id', '=', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('supplier')
            ->where('id', '=', $id)
            ->delete();
    }
}
