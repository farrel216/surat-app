<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SuratKeluar>
 */
class SuratKeluarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $a = $this->faker->numberBetween(4, 10);
        $b = $this->faker->numberBetween(1, 2);
        return [
            'no' => $this->faker->numberBetween(100, 999),
            'tgl_surat' => $this->faker->date(),
            'perihal' => $this->faker->sentence(mt_rand(1, 2)),
            'jenis_id' => $b,
            'ditujukan' => $this->faker->sentence(mt_rand(1, 2)),
            'pengirim' => $this->faker->name(),
            'berkas' => '12345674.pdf',
            'created_by' => $a
        ];
    }
}
