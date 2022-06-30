<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SatuanController extends Controller
{
    public function __construct()
    {
        $this->satuan = new Satuan();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'satuan' => $this->satuan->list()
        ];
        return view('satuan', $data);
    }

    public function save(Request $request)
    {
        // Membuat validasi
        $validated = Validator::make($request->all(), [
            'name' => 'required|max:255'
        ]);

        if ($validated->fails()) {
            // Jika validasi gagal
            return redirect('/satuan')->with('failed-message', 'Data gagal disimpan')->withErrors($validated, 'content');
        } else {
            // Jika validasi berhasil
            $data = [
                'nama' => Request()->name,
            ];
            $this->satuan->saveData($data);
            return redirect('/satuan')->with('success-message', 'Data berhasil disimpan');
        }
    }

    public function update(Request $request)
    {
        // Membuat validasi
        $validated = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required|max:255'
        ]);

        if ($validated->fails()) {
            return redirect('/satuan')->with('failed-message', 'Data gagal diupdate')->withErrors($validated, 'content');
        } else {
            $id = Request()->id;
            $data = [
                'nama' => Request()->name
            ];
            $this->satuan->updateData($id, $data);
            return redirect('/satuan')->with('success-message', 'Data berhasil diupdate');
        }
    }

    public function delete()
    {
        $id = Request()->id;
        $this->satuan->deleteData($id);
        return redirect('/satuan')->with('success-message', 'Data berhasil dihapus');
    }

    public function report()
    {
        $data = [
            'satuan' => $this->satuan->list()
        ];
        return view('reports/report-satuan', $data);
    }
}
