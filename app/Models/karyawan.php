<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    use HasFactory;
    protected $guarded =[];
    
    public function golongan()
    {
        return $this->hasMany('App\Models\Golongan', 'id_Karyawan');
    }
}
