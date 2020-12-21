<?php

namespace Database\Factories;

use App\Models\KartuKeluarga;
use App\Models\Kewarganegaraan;
use App\Models\LevelPendidikan;
use App\Models\Pekerjaan;
use App\Models\penduduk;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PendudukFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = penduduk::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $pendidikan = LevelPendidikan::all()->random(1);
        $pekerjaan = Pekerjaan::all()->random(1);
        $kewarganegaraan = Kewarganegaraan::all()->random(1);
        $keluarga = KartuKeluarga::all()->random(1);

        foreach ($pendidikan as $pendidikan):
            foreach ($pekerjaan as $pekerjaan):
                foreach ($kewarganegaraan as $kewarganegaraan):
                    foreach ($keluarga as $kartuKeluarga):
                        return [
                            'nama'=>$this->faker->name,
                            'nik'=>$this->faker->nik(),
                            'tempat_lahir'=>$this->faker->city(),
                            'tanggal_lahir'=>Carbon::create($this->faker->dateTimeBetween('-80 years', '-20 years')->format('Y-m-d')),
                            'jenis_kelamin'=>$this->faker->randomElement(array('Laki-Laki', 'Perempuan')),
                            'agama'=>$this->faker->randomElement(['Islam', 'Kristen','Koghucu', 'Hindu' , 'Buddha']),
                            'status_pernikahan'=>$this->faker->randomElement(['Kawin', 'Belum Kawin']),
                            'status_keluarga'=>$this->faker->randomElement(['Anak','Suami', 'Istri']),
                            'ayah'=>$this->faker->name('male'),
                            'ibu'=>$this->faker->name('female'),
                            'level_pendidikan_id'=>$pendidikan->id,
                            'pekerjaan_id'=>$pekerjaan->id,
                            'keluarga_id'=>$kartuKeluarga->id,
                            'kewarganegaraan_id'=>$kewarganegaraan->id
                        ];
                    endforeach;
                endforeach;
            endforeach;
        endforeach;


    }
}
