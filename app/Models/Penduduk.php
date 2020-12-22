<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;
    protected $table = 'penduduk';
    protected $primaryKey = 'id';
    protected $fillable = [
        'keluarga_id','nama','nik', 'tempat_lahir', 'tanggal_lahir','agama','jenis_kelamin','level_pendidikan_id','pekerjaan_id','status_pernikahan','status_keluarga','kewarganegaraan_id','ayah','ibu',
    ];
    

    public function kartuKeluarga(){
        return $this->belongsTo('kartu_keluarga', 'keluarga_id', 'id');
    }

    public function levelPendidikan(){
        return $this->belongsTo('App\Models\Levelpendidikan');
    }

    public function kewarganegaraan(){
        return $this->belongsTo('App\Models\Kewarganegaraan');
    }

    public function pekerjaan(){
        return $this->belongsTo('App\Models\Pekerjaan');
    }

    public $timestamps = false;
}
