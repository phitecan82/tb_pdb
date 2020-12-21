<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class KartuKeluargaController extends Controller
{
    public function index(){

        // Mengghitung angota keluarga
        $keluarga = KartuKeluarga::withCount('penduduks')->paginate(10);

        return view('keluarga.index', compact('keluarga'));
    }

    public function show(KartuKeluarga $keluarga){

        $penduduks = Penduduk::where('keluarga_id', $keluarga->id)->get();
        return view('keluarga.show', compact('keluarga', 'penduduks'));
    }

    public function create(){}

    public function store(Request $request){

    }



    public function edit(){

    }
    public function delete(){
        
    }

}
