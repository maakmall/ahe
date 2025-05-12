<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use App\Models\Pendaftaran;
use App\Models\PendaftaranJadwal;
use App\Models\Siswa;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'nama' => 'Admin',
            'email' => 'admin@ahe.com',
        ]);

        $days = [
            'Senin Rabu Jumat',
            'Selasa Kamis Sabtu',
        ];

        $hours = [
            '08:00-09:00',
            '10:00-11:00',
            '11:00-12:00',
            '13:00-14:00',
            '15:00-16:00',
        ];

        $schedules = [];
        foreach ($days as $day) {
            foreach ($hours as $hour) {
                $schedules[] = [
                    'hari' => $day,
                    'jam' => $hour,
                ];
            }
        }

        Jadwal::insert($schedules);

        Siswa::factory(10)->create()->each(function ($siswa) {
            $prefix = 'PN';
            $today = Carbon::now()->format('dmY');
            $randomNumber = str_pad(mt_rand(1, 999), 3, '0', STR_PAD_LEFT);
            $idPendaftaran = $prefix . $today . $randomNumber;

            Pendaftaran::create([
                'id' => $idPendaftaran,
                'id_siswa' => $siswa->id,
                'metode_pembayaran' => fake()->randomElement(['Dana', 'Transfer', 'QRIS']),
                'status' => fake()->randomElement(['Pending', 'Diterima', 'Ditolak']),
                'tanggal' => now(),
                'info' => fake()->randomElement(['Teman', 'Media Sosial', 'Brosur', 'Lainnya']),
            ]);

            $jadwalIds = Jadwal::inRandomOrder()->limit(2)->pluck('id'); // ambil 2 random jadwal

            foreach ($jadwalIds as $jadwalId) {
                PendaftaranJadwal::create([
                    'id_pendaftaran' => $idPendaftaran,
                    'id_jadwal' => $jadwalId,
                ]);
            }
        });
    }
}
