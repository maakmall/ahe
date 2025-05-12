<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use App\Models\Siswa;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        Siswa::factory(10)->create();
    }
}
