<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluarga;
use App\Models\Penduduk;
use App\Models\Jorong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    
    public function createKeluarga(Request $request){
        $post = new KartuKeluarga();
        $post->id = $request->id;
        $post->no = $request->no;
        $post->jorong_id = $request->jorong_id;
        $post->tanggal_pencatatan = $request->tanggal_pencatatan;

        $post->save();
        return back()->with('post_create','Penambahan Berhasil');
    }

    public function store(Request $request){

    }



    public function edit(){

    }
    public function delete(){
        
    }

}
