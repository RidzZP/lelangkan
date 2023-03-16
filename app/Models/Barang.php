<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Barang extends Model
{
    use HasFactory;
    protected $table = 'tb_barangs';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function lelang(){
        return $this->hasMany(Lelang::class, 'id_barang');
    }
}
