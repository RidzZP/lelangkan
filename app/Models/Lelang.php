<?php

namespace App\Models;

use App\Models\Barang;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lelang extends Model
{
    use HasFactory;
    protected $table = 'tb_lelangs';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function barang(){
        return $this->belongsTo(Barang::class, 'id_barang');
    }

    public function masyarakat(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function petugas(){
        return $this->belongsTo(Petugas::class, 'id_petugas');
    }

    public function history(){
        return $this->hasMany(History::class, 'id_lelang');
    }

    // public function pemenang(){
    //     return $this->hasOne(History::class, 'id_lelang')->orderBy('penawaran_harga');
    // }

    public function getHargaAkhirAttribute(){
        $maxPenawaran = History::where('id_lelang', $this->id)->max('penawaran_harga');
        return $maxPenawaran ?? $this->harga_awal;
    }
}
