<?php

namespace Database\Factories;

use App\Models\Kendaraan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use Faker\Generator as Fakerr;

class KendaraanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kendaraan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            $faker = new Fakerr();
            $faker->addProvider(new \Faker\Provider\Fakecar($faker));
            $faker_id = Faker::create('id_ID');

            return [
                "nama" => $faker->vehicle,
                "jenis_bbm" => $faker->vehicleFuelType,
                "avg_bbm" => $faker_id->randomFloat(2, 1, 15),
                "tgl_service" => $faker_id->date('Y_m_d'),
                "tgl_dipakai" => $faker_id->dateTimeThisCentury->format('Y-m-d'),
                "pemilik" => $faker_id->randomElement(['Perushaan', 'Penyewaan']),
                "status" => $faker_id->randomElement(['Dipakai', 'Rusak', 'Tersedia'])
            ];
    }
}
