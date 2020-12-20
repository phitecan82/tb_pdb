<?php

namespace Database\Seeders;

use App\Models\Nagari;
use Illuminate\Database\Seeder;

class NagariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nagaris = ['Koto Tuo', 'Koto Gadang', 'Balingka', 'Sianok'];
        foreach ($nagaris as $nagari):
            Nagari::create([
                'nama'=>$nagari
            ]);
        endforeach;
    }
}
