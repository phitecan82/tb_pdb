<?php

namespace Database\Seeders;


use App\Models\Jorong;
use App\Models\Kewarganegaraan;
use App\Models\Pekerjaan;
use App\Models\Penduduk;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Pekerjaan::factory()->count(10)->create();
        Kewarganegaraan::factory()->count(1)->create();

        $this->call([
            NagariSeeder::class,
            LevelPendidikanSeeder::class,
            JorongSeeder::class,
            PendudukSeeder::class
        ]);


    }
}
