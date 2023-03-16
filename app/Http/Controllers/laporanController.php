<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Lelang;
use Illuminate\Http\Request;

class laporanController extends Controller
{
    public function laporanAdmin(Request $request){
        if($request->has('search')){
            $data = Lelang::where('nama_barang', 'LIKE', '%'.$request->search. '%')->paginate(5);
        }else{
            $data = Lelang::paginate(5);
        }

        $lelang = Lelang::all();
        $barang = Barang::all();

        return view('laporan/laporanAdmin', compact('data', 'lelang', 'barang'));
    }

    public function filterData(Request $request){
        $tglAwal = $request->input('tglAwal');
        $tglAkhir = $request->input('tglAkhir');

        $data = Lelang::whereBetween('created_at', [$tglAwal, $tglAkhir])->get();

        $lelang = Lelang::all();
        $barang = Barang::all();

        return view('laporan/laporanAdmin', compact('data', 'lelang', 'barang'));
    }

    public function printLaporan(){
        $lelang = Lelang::all();
        $barang = Barang::all();
        $data = Lelang::all();
        return view('laporan/printLaporan', compact('data', 'lelang', 'barang'));
    }
}
