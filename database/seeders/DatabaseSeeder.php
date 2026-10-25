<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\FacilityCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Sarpras',
            'email' => 'admin@sekolah.test',
            'password' => 'password',
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Pak Teknisi',
            'email' => 'teknisi@sekolah.test',
            'password' => 'password',
            'role' => 'teknisi',
        ]);

        User::create([
            'name' => 'Budi Siswa',
            'nisn' => '1234567890',
            'password' => 'password',
            'role' => 'siswa',
        ]);

        // Siswa kedua, untuk test akses laporan milik orang lain (403)
        User::create([
            'name' => 'Sari Siswa',
            'nisn' => '0987654321',
            'password' => 'password',
            'role' => 'siswa',
        ]);

        $kelas = Area::create(['name' => 'Kelas']);

        foreach (['XII.PPLG.1', 'XII.PPLG.2', 'XI.PPLG.1'] as $nama) {
            $kelas->locations()->create(['name' => $nama]);
        }

        foreach (['Meja/Kursi', 'AC/Kipas', 'Proyektor', 'Papan Tulis', 'Lampu'] as $nama) {
            FacilityCategory::create(['name' => $nama]);
        }
    }
}
