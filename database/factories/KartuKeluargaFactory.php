<?php

namespace Database\Factories;

use App\Models\Jorong;
use App\Models\KartuKeluarga;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class KartuKeluargaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = KartuKeluarga::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'no'=> $this->faker->randomNumber(),
            'jorong_id'=>Jorong::factory(),
            'tanggal_pencatatan'=>Carbon::create($this->faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d'))
        ];
    }
}
