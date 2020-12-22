<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jorong extends Model
{
    use HasFactory;
    protected $table = 'jorong';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_jorong','nagari_id',
    ];

    public function nagari(){
        return $this->belongsTo('App\Models\Nagari','nagari_id','id');
    }

    public function keluarga(){
        return $this->hasMany('App\Models\KartuKeluarga' );
    }

    public $timestamps = false;
}
