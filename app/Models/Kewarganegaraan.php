<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewarganegaraan extends Model
{
    use HasFactory;
    protected $table = 'kewarganegaraan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_kewarganegaraan',
    ];

    public $timestamps = false;

    public function penduduk(){
        return $this->hashMany('App\Models\Penduduk');
    }
}
