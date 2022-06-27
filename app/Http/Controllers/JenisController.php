<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class JenisController extends Controller
{
    public function __construct()
    {
        $this->jenis = new Jenis();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'jenis' => $this->jenis->list()
        ];
        return view('jenis', $data);
    }

    public function save(Request $request)
    {
        // Membuat validasi
        $validated = Validator::make($request->all(), [
            'name' => 'required|max:255'
        ]);

        if ($validated->fails()) {
            // Jika validasi gagal
            return redirect('/jenis')->with('failed-message', 'Data failed to save')->withErrors($validated, 'content');
        } else {
            // Jika validasi berhasil
            $data = [
                'nama' => Request()->name,
            ];
            $this->jenis->saveData($data);
            return redirect('/jenis')->with('success-message', 'Data saved successfully');
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
            return redirect('/jenis')->with('failed-message', 'Data failed to update')->withErrors($validated, 'content');
        } else {
            $id = Request()->id;
            $data = [
                'nama' => Request()->name
            ];
            $this->jenis->updateData($id, $data);
            return redirect('/jenis')->with('success-message', 'Data updated successfully');
        }
    }

    public function delete()
    {
        $id = Request()->id;
        $this->jenis->deleteData($id);
        return redirect('/jenis')->with('success-message', 'Data deleted successfully');
    }

    public function report()
    {
        $data = [
            'jenis' => $this->jenis->list()
        ];
        return view('reports/report-jenis', $data);
    }
}
