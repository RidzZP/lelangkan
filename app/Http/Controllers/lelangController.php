<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\History;
use App\Models\Lelang;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class lelangController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            // Percobaan 1
            // $data = Lelang::where('id_barang', 'LIKE', '%'.$request->search. '%')->paginate(5);

            // Percobaan 2 Mengambil kolom nama barang dari tabel barang pada id_barang(hasMany pada model barang)
            $keyword = $request->input('search');
            $data = Lelang::whereHas('barang', function($query) use ($keyword){
                $query->where('nama_barang', 'LIKE', "%$keyword%");
            })->paginate(5);
        }else{
            $data = Lelang::paginate(5);
        }

        $lelangAktif = Lelang::where('status', 'dibuka')->get();
        foreach ($lelangAktif as $lelang) {
            $tglLelang = $lelang->tgl_lelang;
            $tutupLelang = $lelang->tutup_lelang;

            if ($tglLelang >= $tutupLelang) {
                $lelang->status = 'ditutup';
                $lelang->save();
            }
        }


        return view('admin/aktivasiBarang', compact('data'));
    }

    // Tampil data pemenang lelang
    public function pemenangLelang(){
        $data = Lelang::all();
        return view('history/pemenangLelang', compact('data'));
    }

    // Tambah Lelang
    public function tambahLelang(){
        $barang = Barang::all();
        $user = User::all();
        return view('admin/tambahLelang', compact('barang', 'user', ));
    }

    public function insertLelang(Request $request){
        $date = date('Y-m-d H:i:s');

        Lelang::create([
            'id_barang' => $request->id_barang,
            'tgl_lelang' => $date
        ]);

        return redirect('aktivasi-barang');
    }

    // Aktivasi Barang
    public function tutupLelang($id){
        Lelang::find($id)->update([
            'status' => 'ditutup'
        ]);

        return redirect('aktivasi-barang');
    }

    public function bukaLelang($id){
        Lelang::find($id)->update([
            'status' => 'dibuka'
        ]);

        return redirect('aktivasi-barang');
    }

    // Masyarakat
    // tampil produk
    public function home(Request $request){
        $barang = Barang::all();
        $data = Lelang::all();
        return view('masyarakat/home', compact('data', 'barang'));
    }

    // tampil menu penawaran barang
    public function penawaranBarang(){
        $barang = Barang::all();
        $data = Lelang::all();

        return view('masyarakat/penawaranBarang', compact('data', 'barang'));
    }

}
