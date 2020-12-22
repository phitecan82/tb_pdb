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
        $jorong = Jorong::get();

        return view('keluarga.index', compact('keluarga','jorong'));
    }

    public function show(KartuKeluarga $keluarga){

        $penduduks = Penduduk::where('keluarga_id', $keluarga->id)->get();
        return view('keluarga.show', compact('keluarga', 'penduduks',));
    }
    
    public function createKeluarga(Request $request){
        $post = new KartuKeluarga();
        $post->id = $request->id;
        $post->no = $request->no;
        $post->jorong_id = $request->jorong_id;
        $post->tanggal_pencatatan = $request->tanggal_pencatatan;

        $post->save();
        return back()->with('post_create','Data Berhasil Ditambahkan');
    }
    public function editKeluarga($id){
        $post= KartuKeluarga::join('jorong','kartu_keluarga.jorong_id','=','jorong.id')
        ->where('kartu_keluarga.id',$id)->first();
        return view('keluarga.edit', compact('post'));
    }

    public function updateKeluarga(Request $request,$id){
        $post = KartuKeluarga::findOrFail($id);  
        $post->no = $request->no; 
        $post->jorong_id = $request->jorong_id;
        $post->tanggal_pencatatan = $request->tanggal_pencatatan;
        
        $post->update();

        return back()->with('success','Data Keluarga Berhasil  di ubah');

    }
    public function deleteKeluarga($id){
        KartuKeluarga::where('id',$id)->delete();
        return  back()->with('post_delete','Data Berhasil Di Ubah');
        
    }

}
