<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Golongan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // factory manual
        $this->user();
        $this->golongan();

        // factory otomatis
        User::factory(50)->create();
    }

    private function user()
    {
        User::factory()->create([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'nama' => 'Admin E-PLN',
            'role' => 1,
            'remember_token' => Str::random(10)
        ]);
    }

    public function golongan()
    {
        Golongan::factory()->create([
            'kode' => 'GOL_' . Str::random(5),
            'nama' => 'Rumah Tangga'
        ]);

        Golongan::factory()->create([
            'kode' => 'GOL_' . Str::random(5),
            'nama' => 'Bisnis Besar'
        ]);

        Golongan::factory()->create([
            'kode' => 'GOL_' . Str::random(5),
            'nama' => 'Industri Besar'
        ]);

        Golongan::factory()->create([
            'kode' => 'GOL_' . Str::random(5),
            'nama' => 'Pemerintah'
        ]);

        Golongan::factory()->create([
            'kode' => 'GOL_' . Str::random(5),
            'nama' => 'Layanan Khusus'
        ]);
    }
}
