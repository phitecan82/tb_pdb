<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 'penduduk';

    public $timestamp = false;

    public function kartuKeluarga(){
        return $this->belongsTo('kartu_keluarga', 'keluarga_id', 'id');
    }

    public function levelPendidikan(){
        return $this->belongsTo('level_pendidikan');
    }

    public function kewarganegaraan(){
        return $this->belongsTo('kewarganegaraan');
    }

    public function pekerjaan(){
        return $this->belongsTo('pekerjaan');
    }
}
