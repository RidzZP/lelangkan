<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Lelang;
use Illuminate\Http\Request;

class barangController extends Controller
{
    public function index(){
        return view('masyarakat/dataProduk');
    }

    public function data(Request $request){
        if($request->has('search')){
            $data = Barang::where('nama_barang', 'LIKE', '%'.$request->search. '%')->paginate(5);
        } else{
            $data = Barang::paginate(5);
        }
        
        return view('administrator/pendataan', compact('data'));
    }

    // Tambah Barang
    // tampil form
    public function tambahBarang(){
        return view('administrator/tambahBarang');
    }

    // insert barang
    public function insertBarang(Request $request){
        $data = Barang::create($request->all());
        if ($request->hasFile('foto_barang')) {
            $request->file('foto_barang')->move('assets/images', $request->file('foto_barang')->getClientOriginalName());
            $data->foto_barang = $request->file('foto_barang')->getClientOriginalName();
            $data->save();
        }

        return redirect('pendataan-barang')->withSuccess('Data Berhasil Ditambahkan');
    }

    // Edit Barang
    public function editBarang($id){
        $data = Barang::find($id);
        return view('administrator/editBarang', compact('data'));
    }

    public function updateBarang(Request $request, $id){
        $data = Barang::find($id);
        $data->update($request->all());

        return redirect('pendataan-barang')->withSuccess('Data Berhasil Di Ubah');
    }

    // Hapus Barang
    public function hapusBarang($id){
        $data = Barang::find($id);
        $data->delete();

        return redirect('pendataan-barang');
    }

    // detail barang
    public function detailBarang($id){
        $data = Barang::find($id);
        return view('administrator/detailBarang', compact('data'));
    }

    
    public function barang($id){
        $data = Barang::find($id);
        return view('masyarakat/dataProduk', compact('data'));
    }

}
