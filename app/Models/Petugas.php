<?php

namespace App\Models;

use App\Models\Level;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Petugas extends Model
{

    protected $table = 'tb_petugas';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function encriptPassword($value){
        $this->attributes['password'] = Hash::make($value);
    }

    public function level(){
        return $this->belongsTo(Level::class, 'id_level');
    }
    
}
