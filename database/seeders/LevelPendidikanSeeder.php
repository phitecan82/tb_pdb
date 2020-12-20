<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LevelPendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $level = ['Tidak Sekolah','TK','SD', 'SLTP', 'SLTA', 'D1', 'D2', 'D3', 'S1/D4', 'S2', 'S3'];

        foreach ($level as $lvl):
            LevelPendidikan::create([
                'nama'=>$lvl
            ]);
        endforeach;
    }
}
