<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KartuKeluarga;
use App\Models\Penduduk;
use App\Models\LevelPendidikan;
use App\Models\Pekerjaan;
use App\Models\Kewarganegaraan;
use App\Models\Nagari;



class PendudukController extends Controller
{
    public function index(){
        $pdd = Penduduk::orderBy('id','DESC')->paginate(10);
        return view('penduduk.index',compact('pdd'));


    }
    public function show(){

    }
    public function create(){

    }
    public function edit(){

    }
    public function delete(){
        
    }
    public function laporan(Request $request){
        
        $produktif = $request->get('produktif');
        $nagari = $request->get('nagari');
        $nagariPendidikan = $request->get('nagariPendidikan');
        $getNagari = Nagari::pluck('nama_nagari','id');
        $perpage = 10;



                $penduduk = Penduduk::join('kartu_keluarga','penduduk.keluarga_id','=','kartu_keluarga.id')
                ->join('jorong','kartu_keluarga.jorong_id','=','jorong.id')
                ->join('nagari','jorong.nagari_id','=','nagari.id')
                ->join('kewarganegaraan','penduduk.kewarganegaraan_id','=','kewarganegaraan.id')
                ->join('level_pendidikan','penduduk.level_pendidikan_id','=','level_pendidikan.id')
                ->join('pekerjaan','penduduk.pekerjaan_id','=','pekerjaan.id')
                ->where([['tanggal_lahir', '<=', date('Y-m-d', strtotime('-14 years'))],
                        ['tanggal_lahir', '>=', date('Y-m-d', strtotime('-64 years'))]])
                        ->paginate($perpage);

                $pendudukNagari = Penduduk::join('kartu_keluarga','penduduk.keluarga_id','=','kartu_keluarga.id')
                                ->join('jorong','kartu_keluarga.jorong_id','=','jorong.id')
                                ->join('nagari','jorong.nagari_id','=','nagari.id')
                                ->join('kewarganegaraan','penduduk.kewarganegaraan_id','=','kewarganegaraan.id')
                                ->join('level_pendidikan','penduduk.level_pendidikan_id','=','level_pendidikan.id')
                                ->join('pekerjaan','penduduk.pekerjaan_id','=','pekerjaan.id')
                                ->where('nagari.id', $nagari)
                                ->paginate($perpage);


                $pendudukNagariPendidikan = Penduduk::join('kartu_keluarga','penduduk.keluarga_id','=','kartu_keluarga.id')
                                ->join('jorong','kartu_keluarga.jorong_id','=','jorong.id')
                                ->join('nagari','jorong.nagari_id','=','nagari.id')
                                ->join('kewarganegaraan','penduduk.kewarganegaraan_id','=','kewarganegaraan.id')
                                ->join('level_pendidikan','penduduk.level_pendidikan_id','=','level_pendidikan.id')
                                ->join('pekerjaan','penduduk.pekerjaan_id','=','pekerjaan.id')
                                ->Where('nagari.id',$nagariPendidikan)
                                ->whereBetween('level_pendidikan_id', [1, 3])
                                ->paginate($perpage);
                            


            return view('laporan.laporan', compact('penduduk','getNagari','pendudukNagari','pendudukNagariPendidikan')); 
    }

}
