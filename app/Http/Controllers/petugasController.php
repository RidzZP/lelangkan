<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Petugas;
use Illuminate\Http\Request;

class petugasController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data = Petugas::where('nama_petugas', 'LIKE', '%'.$request->search. '%')->paginate(5);
        } else{
            $data = Petugas::paginate(5);
        }
        
        return view('petugas/index', compact('data'));
    }

    // Tambah Petugas
    // tampil table
    public function tambahPetugas(){
        $level = Level::all();
        return view('petugas/tambahPetugas', compact('level'));
    }

    // insert data
    public function insertPetugas(Request $request){
        Petugas::create([
            'nama_petugas' => $request->input('nama_petugas'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'id_level' => $request->input('id_level')
        ]);

        return redirect('petugas');
    }

    // Edit Petugas
    // tampil edit
    public function editPetugas($id){
        $petugas = Petugas::find($id);
        $level = Level::all();
        return view('petugas/editPetugas', compact('level', 'petugas'));
    }

    // update data
    public function updatePetugas(Request $request, $id){
        $petugas = Petugas::find($id);
        $petugas->update([
            'nama_petugas' => $request->input('nama_petugas'),
            'username' => $request->input('username'),
            'password' => $request->input('password') ? bcrypt($request->input('id_level')) : $petugas->password,
            'id_level' => $request->input('id_level'),
        ]);

        return redirect('petugas');
    }

    // Hapus
    public function hapusPetugas($id){
        $petugas = Petugas::find($id);
        $petugas->delete();

        return redirect('petugas');
    }
}
