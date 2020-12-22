<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jorong extends Model
{
    use HasFactory;
    protected $table = 'jorong';

    public function nagari(){
        return $this->belongsTo('App\Models\Nagari');
    }

    public function keluarga(){
        return $this->hasMany('App\Models\KartuKeluarga' );
    }

    public $timestamps = false;
}
