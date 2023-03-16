<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Petugas;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(){
        $pengguna = User::count();
        $barang = Barang::count();
        $petugas = Petugas::count();
        return view('administrator/index', compact('pengguna', 'barang', 'petugas'));
    }
}
