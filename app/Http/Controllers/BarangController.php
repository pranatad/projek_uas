<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jenis;
use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->barang = new Barang();
        $this->jenis = new Jenis();
        $this->satuan = new Satuan();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'barang' => $this->barang->list(),
            'jenis' => $this->jenis->list(),
            'satuan' => $this->satuan->list()
        ];
        return view('barang', $data);
    }

    public function save(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'kode' => 'required|max:255',
            'nama' => 'required|max:255',
            'jenis' => 'required|max:255',
            'satuan' => 'required|max:255',
            'stok' => 'required|max:255',
            'hargabeli' => 'required|max:255',
            'hargajual' => 'required|max:255',
            'biayapesan' => 'required|max:255',
            'biayasimpan' => 'required|max:255',
            'leadtime' => 'required|max:255',
            'image' => 'image|file|max:1024',
        ]);

       // if($request->file('image')) {
        //    $validated['image'] = $request->file('image')->store('post-images');
       // }
        
        if ($validated->fails()) {
            // Jika validasi gagal
            return redirect('/barang')->with('failed-message', 'Data gagal disimpan')->withErrors($validated, 'content');
        } else {
            // Jika validasi berhasil
            $data = [
                'kode' => Request()->kode,
                'nama' => Request()->nama,
                'jenis' => Request()->jenis,
                'satuan' => Request()->satuan,
                'stok' => Request()->stok,
                'hargabeli' => Request()->hargabeli,
                'hargajual' => Request()->hargajual,
                'biayapesan' => Request()->biayapesan,
                'biayasimpan' => Request()->biayasimpan,
                'leadtime' => Request()->leadtime,
                'image' => Request("image")->store('post-images'),
            ];
            $this->barang->saveData($data);
            return redirect('/barang')->with('success-message', 'Data berhasil disimpan');
        }
    }

    public function update(Request $request)
    {
        // Membuat validasi
        $validated = Validator::make($request->all(), [
            'kode' => 'required|max:255',
            'nama' => 'required|max:255',
            'jenis' => 'required|max:255',
            'satuan' => 'required|max:255',
            'stok' => 'required|max:255',
            'hargabeli' => 'required|max:255',
            'hargajual' => 'required|max:255',
            'biayapesan' => 'required|max:255',
            'biayasimpan' => 'required|max:255',
            'leadtime' => 'required|max:255',
            'image' => 'image|file|max:1024',
        ]);

        if ($validated->fails()) {
            return redirect('/barang')->with('failed-message', 'Data gagal diupdate')->withErrors($validated, 'content');
        } else {
            $id = Request()->kode;
            $data = [
                'nama' => Request()->nama,
                'jenis' => Request()->jenis,
                'satuan' => Request()->satuan,
                'stok' => Request()->stok,
                'hargabeli' => Request()->hargabeli,
                'hargajual' => Request()->hargajual,
                'biayapesan' => Request()->biayapesan,
                'biayasimpan' => Request()->biayasimpan,
                'leadtime' => Request()->leadtime,
                'image' => Request("image")->store('post-images'),
            ];
            $this->barang->updateData($id, $data);
            return redirect('/barang')->with('success-message', 'Data berhasil diupdate');
        }
    }

    public function delete()
    {
        $id = Request()->kode;
        $this->barang->deleteData($id);
        return redirect('/barang')->with('success-message', 'Data berhasil dihapus');
    }

    public function report()
    {
        $data = [
            'barang' => $this->barang->list()
        ];
        return view('reports/report-barang', $data);
    }
}
