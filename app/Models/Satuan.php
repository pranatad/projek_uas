<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Satuan extends Model
{
    use HasFactory;

    public function list()
    {
        return DB::table('satuan')->get();
    }

    public function saveData($data)
    {
        DB::table('satuan')->insert($data);
    }

    public function updateData($id, $data)
    {
        DB::table('satuan')
            ->where('id', '=', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('satuan')
            ->where('id', '=', $id)
            ->delete();
    }
}
