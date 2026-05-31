<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            BidangSeeder::class,
            UserSeeder::class,
            KontenSeeder::class,
            MasterDataSeeder::class, // BARU: pengurus, komisariat, timeline, settings
        ]);
    }
}
