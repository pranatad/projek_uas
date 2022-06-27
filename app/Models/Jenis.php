<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Jenis extends Model
{
    use HasFactory;

    public function list()
    {
        return DB::table('jenis')->get();
    }

    public function saveData($data)
    {
        DB::table('jenis')->insert($data);
    }

    public function updateData($id, $data)
    {
        DB::table('jenis')
            ->where('id', '=', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('jenis')
            ->where('id', '=', $id)
            ->delete();
    }
}
