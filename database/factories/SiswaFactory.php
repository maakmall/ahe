<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_lengkap'    => fake()->name(),
            'nama_panggilan'  => fake()->firstName(),
            'jenis_kelamin'   => fake()->randomElement(['Laki-Laki', 'Perempuan']),
            'tempat_lahir'    => fake()->city(),
            'tanggal_lahir'   => fake()->date('Y-m-d', '-10 years'), // kira2 umur 10+
            'kelas'           => fake()->numberBetween(1, 6),
            'sekolah'         => fake()->company(),
            'nama_orang_tua'  => fake()->name(),
            'alamat'          => fake()->address(),
            'no_wa'           => fake()->numerify('08##########'),
            'email'           => fake()->unique()->safeEmail(),
            'status'          => fake()->randomElement(['Aktif', 'Non Aktif']),
        ];
    }
}
