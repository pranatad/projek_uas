<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'user' => $this->user->list()
        ];
        return view('user', $data);
    }

    public function save(Request $request)
    {
        // Membuat validasi
        $validated = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users',
            'password' => 'required|max:255',
            'role' => 'required'
        ]);

        if ($validated->fails()) {
            // Jika validasi gagal
            return redirect('/user')->with('failed-message', 'Data gagal disimpan')->withErrors($validated, 'content');
        } else {
            // Jika validasi berhasil
            $data = [
                'name' => Request()->name,
                'email' => Request()->email,
                'password' => Hash::make(Request()->password),
                'role' => Request()->role
            ];
            $this->user->saveData($data);
            return redirect('/user')->with('success-message', 'Data berhasil disimpan');
        }
    }

    public function update(Request $request)
    {
        // Membuat validasi
        $validated = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'role' => 'required',
        ]);

        if ($validated->fails()) {
            return redirect('/user')->with('failed-message', 'Data gagal diupdate')->withErrors($validated, 'content');
        } else {
            $id = Request()->id;
            $data = [
                'name' => Request()->name,
                'email' => Request()->email,
                'role' => Request()->role
            ];
            $this->user->updateData($id, $data);
            return redirect('/user')->with('success-message', 'Data berhasil diupdate');
        }
    }

    public function delete()
    {
        $id = Request()->id;
        $this->user->deleteData($id);
        return redirect('/user')->with('success-message', 'Data berhasil dihapus');
    }

    public function resetpassword(Request $request)
    {
        $id = Request()->id;
        $data = [
            'password' => Hash::make('12345678'),
        ];
        $this->user->updateData($id, $data);
        return redirect('/user')->with('success-message', 'Password berhasil direset');
    }

    public function updateprofile(Request $request)
    {
        $id = Request()->id;
        $data = [
            'name' => Request()->nama,
        ];
        $this->user->updateData($id, $data);
        return redirect('/')->with('success-message', 'Profil berhasil diupdate');
    }

    public function changepassword(Request $request)
    {
        $id = Request()->id;
        $data = [
            'password' => Hash::make(Request()->password),
        ];
        $this->user->updateData($id, $data);
        return redirect('/')->with('success-message', 'Password Berhasil diganti');
    }

    public function report()
    {
        $data = [
            'user' => $this->user->list()
        ];
        return view('reports/report-user', $data);
    }
}
