<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->supplier = new Supplier();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'supplier' => $this->supplier->list()
        ];
        return view('supplier', $data);
    }

    public function save(Request $request)
    {
        // Membuat validasi
        $validated = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'notelp' => 'required|max:15',
            'alamat' => 'required|max:255',
            'image' => 'image|file|max:5120',
        ]);

        if ($validated->fails()) {
            // Jika validasi gagal
            return redirect('/supplier')->with('failed-message', 'Data gagal disimpan')->withErrors($validated, 'content');
        } else {
            // Jika validasi berhasil
            $data = [
                'nama' => Request()->name,
                'notelp' => Request()->notelp,
                'alamat' => Request()->alamat,
                'image' => Request("image")->store('sup-images'),
            ];
            $this->supplier->saveData($data);
            return redirect('/supplier')->with('success-message', 'Data berhasil disimpan');
        }
    }

    public function update(Request $request)
    {
        // Membuat validasi
        $validated = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required|max:255',
            'notelp' => 'required|max:15',
            'alamat' => 'required|max:255',
            'image' => 'image|file|max:5120',
        ]);

        if ($validated->fails()) {
            return redirect('/supplier')->with('failed-message', 'Data gagal diupdate')->withErrors($validated, 'content');
        } else {
            $id = Request()->id;
            $data = [
                'nama' => Request()->name,
                'notelp' => Request()->notelp,
                'alamat' => Request()->alamat,
                'image' => Request("image")->store('sup-images'),
            ];
            $this->supplier->updateData($id, $data);
            return redirect('/supplier')->with('success-message', 'Data berhasil diupdate');
        }
    }

    public function delete()
    {
        $id = Request()->id;
        $this->supplier->deleteData($id);
        return redirect('/supplier')->with('success-message', 'Data berhasil dihapus');
    }

    public function report()
    {
        $data = [
            'supplier' => $this->supplier->list()
        ];
        return view('reports/report-supplier', $data);
    }
}
