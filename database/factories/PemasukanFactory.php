<?php

namespace Database\Factories;

use App\Models\Pemasukan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use faker\Generator as Faker;

class PemasukanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pemasukan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_transaksi' => Str::random(10),
            'rincian_transaksi' => $this->faker->unique()->safeEmail,
            'jumlah' =>12000000,
            'harga' => 0,
            'total' => 0,
            'jenis_transaksi' => 'pemasukan',
            'struk' => 'default.png'
        ];
    }
}
