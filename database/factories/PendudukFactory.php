<?php

namespace Database\Factories;
use App\Models\Kartu_Keluarga;
use App\Models\Kewarganegaraan;
use App\Models\Level_Pendidikan;
use App\Models\Pekerjaan;

use App\Models\Penduduk;
use Illuminate\Database\Eloquent\Factories\Factory;

class PendudukFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Penduduk::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $pendidikans = LevelPendidikan::all()->random(1);
        $pekerjaan = Pekerjaan::all()->random(1);
        $kewarganegaraan = Kewarganegaraan::all()->random(1);
        $keluarga = KartuKeluarga::all()->random(1);

        foreach ($pendidikans as $pendidikan):
            foreach ($pekerjaan as $pekerjaan):
                foreach ($kewarganegaraan as $kewarganegaraan):
                    foreach ($keluarga as $kartuKeluarga):
                        return [
                            'nama'=>$this->faker->name,
                            'nik'=>$this->faker->unique()->bankAccountNumber,
                            'tempat_lahir'=>$this->faker->state,
                            'tanggal_lahir'=>$this->faker->dateTimeBetween(),
                            'agama'=>$this->faker->colorName,
                            'jenis_kelamin'=>$this->faker->randomElement(array('Laki-Laki', 'Perempuan')),
                            'agama'=>$this->faker->randomElement(array('Islam', 'Katolik', 'Protestan', 'Koghucu', 'Hindu' , 'Budddha')),
                            'status_pernikahan'=>$this->faker->randomElement(array('Kawin', 'Belum Kawin', 'Cerai')),
                            'status_keluarga'=>$this->faker->randomElement(array('Anak', 'Mertua', 'Kepala Keluarga', 'Istri')),
                            'ayah'=>$this->faker->name('man'),
                            'ibu'=>$this->faker->name('woman'),
                            'keluarga_id'=>$kartuKeluarga->id,
                            'level_pendidikan_id'=>$pendidikan->id,
                            'pekerjaan_id'=>$pekerjaan->id,
                            'kewarganegaraan_id'=>$kewarganegaraan->id
                        ];
                    endforeach;
                endforeach;
            endforeach;
        endforeach;
    }
}
