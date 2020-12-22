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
        $pdd = Penduduk::paginate(10);
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

            if(!empty($produktif)){
            $penduduk = Penduduk::join('kartu_keluarga','kartu_keluarga.id','=','penduduk.keluarga_id')
                                ->join('jorong','kartu_keluarga.jorong_id','=','jorong.id')
                                ->join('nagari','jorong.nagari_id','=','nagari.id')
                                ->join('kewarganegaraan','kewarganegaraan.id','=','penduduk.kewarganegaraan_id')
                                ->join('level_pendidikan','level_pendidikan.id','=','penduduk.level_pendidikan_id')
                                ->join('pekerjaan','pekerjaan.id','=','penduduk.pekerjaan_id')
                                ->where([['penduduk.nama','like',"%$produktif%"],
                                        ['tanggal_lahir', '<=', date('Y-m-d', strtotime('-14 years'))],
                                        ['tanggal_lahir', '>=', date('Y-m-d', strtotime('-64 years'))]       
                                        ])
                                ->paginate($perpage);
            }
            else{
                $penduduk = Penduduk::where([['tanggal_lahir', '<=', date('Y-m-d', strtotime('-14 years'))],
                                            ['tanggal_lahir', '>=', date('Y-m-d', strtotime('-64 years'))]       
                                    ])->paginate($perpage);
            }
            

                $pendudukNagari = Penduduk::join('kartu_keluarga','kartu_keluarga.id','=','penduduk.keluarga_id')
                                ->join('jorong','kartu_keluarga.jorong_id','=','jorong.id')
                                ->join('nagari','jorong.nagari_id','=','nagari.id')
                                ->join('kewarganegaraan','kewarganegaraan.id','=','penduduk.kewarganegaraan_id')
                                ->join('level_pendidikan','level_pendidikan.id','=','penduduk.level_pendidikan_id')
                                ->join('pekerjaan','pekerjaan.id','=','penduduk.pekerjaan_id')
                                ->where([['nagari.id','=', $nagari]])
                                ->paginate($perpage);

                                

                $pendudukNagariPendidikan = Penduduk::join('kartu_keluarga','kartu_keluarga.id','=','penduduk.keluarga_id')
                                ->join('jorong','kartu_keluarga.jorong_id','=','jorong.id')
                                ->join('nagari','jorong.nagari_id','=','nagari.id')
                                ->join('kewarganegaraan','kewarganegaraan.id','=','penduduk.kewarganegaraan_id')
                                ->join('level_pendidikan','level_pendidikan.id','=','penduduk.level_pendidikan_id')
                                ->join('pekerjaan','pekerjaan.id','=','penduduk.pekerjaan_id')
                                ->where('nagari.id','=', $nagariPendidikan)
                                ->where(function($q) {
                                    $q->where('level_pendidikan.nama_pendidikan', '=',"Tidak Sekolah")
                                    ->orWhere('level_pendidikan.nama_pendidikan', '=',"SD")
                                    ->orWhere('level_pendidikan.nama_pendidikan', '=',"SLTP");
                                })
                                ->paginate($perpage);

            // dd($pendudukNagariPendidikan);
            return view('laporan.laporan', compact('penduduk','getNagari','pendudukNagari','pendudukNagariPendidikan')); 
    }

}
