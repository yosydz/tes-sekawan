<?php

namespace Database\Factories;

use App\Models\Supir;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class SupirFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Supir::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create('id_ID');
        return [
            "nama" => $faker->name,
            "email" => $this->faker->unique()->safeEmail,
            "alamat" => $faker->address,
            "umur" => $faker->numberBetween(25,40)
        ];
    }
}
