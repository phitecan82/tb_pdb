<?php

namespace Database\Factories;

use App\Models\Jorong;
use Illuminate\Database\Eloquent\Factories\Factory;

class JorongFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jorong::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->city
        ];
    }
}
