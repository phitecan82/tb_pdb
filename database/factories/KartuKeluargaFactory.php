<?php

namespace Database\Factories;

use App\Models\Jorong;
use App\Models\Kartu_Keluarga;
use Illuminate\Database\Eloquent\Factories\Factory;

class KartuKeluargaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kartu_Keluarga::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'no'=> $this->faker->macAddress,
            'jorong_id'=>Jorong::factory(),
            'tanggal_pencatatan'=>$this->faker->date('Y/m/d')
        ];
    }
}
