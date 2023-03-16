<?php

namespace App\Models;

use App\Models\User;
use App\Models\Barang;
use App\Models\Lelang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class History extends Model
{
    use HasFactory;
    protected $table = 'tb_history_lelangs';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function lelang(){
        return $this->belongsTo(Lelang::class, 'id_lelang');
    }

    public function barang(){
        return $this->belongsTo(Barang::class, 'id_barang');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
