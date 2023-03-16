<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Lelang;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class historyLelangController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data = History::where('penawaran_harga', 'LIKE', '%'.$request->search. '%')->paginate(5);
        } else{
            $data = History::paginate(5);
        }
        
        // Menampilkan history berdasarkan user
        $user = Auth::user();
        $history = User::with('history')->find($user->id)->history;

        return view('history/index', compact('data', 'history'));
    }

    // penawaran
    public function tawarBarang($id){
        $barang = Barang::find($id);
        $lelang = Lelang::where('id_barang', $id)->pluck('id')->first();
        
        return view('masyarakat/penawaran', compact('barang', 'lelang'));
    }

    public function insertTawar(Request $request){
        // $validated = $request->validate([
        //     'penawaran_harga' => 'required|numeric',
        //     'id_barang' => 'required',
        //     'id_lelang' => 'required',
        // ]);

        // $lelang = Lelang::find($validated['id_lelang']);
        // if($validated['penawaran_harga'] <= $lelang->harga_awal){
        //     return redirect()->back()->with('error', 'penawaran harus lebih tinggi');
        // }

        // History::create([
        //     'id_barang' => $validated['id_barang'],
        //     'id_user' => $request->id_user,
        //     'penawaran_harga' => $validated['penawaran_harga'],
        //     'id_lelang' => $validated['id_barang'],
            
        // ]);

        $barang = Barang::find($request->id_barang);

        if($request->penawaran_harga > $barang->harga_awal){
            History::create([
                'id_barang' => $request->id_barang,
                'id_user' => $request->id_user,
                'penawaran_harga' => $request->penawaran_harga,
                'id_lelang' => $request->id_lelang
            ]);
        } else {
            return redirect()->back()->with('errors', 'Penawaran Harus Lebih Tinggi Dari Harga Awal!');
        }

        return redirect('history');
    }

    public function editTawar($id){
        $data = History::find($id);
        
        return view('masyarakat/editPenawaran', compact('data'));
    }

    public function updateTawar(Request $request, $id){

        // CARA KE 1
        $data = History::find($id);
        $barang = Barang::find($data->id_barang);
        // $data->update($request->all());

        // return redirect('history');


        if($request->penawaran_harga < $barang->harga_awal){
                return redirect()->back()->with(['penawaran harga harus lebih tinggi']);
        }

        $data->update([
            'penawaran_harga' => $request->penawaran_harga,
        ]);

        return redirect('history');
    }
}
