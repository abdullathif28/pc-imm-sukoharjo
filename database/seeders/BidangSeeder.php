<?php

namespace Database\Seeders;

use App\Models\Bidang;
use Illuminate\Database\Seeder;

class BidangSeeder extends Seeder
{
    public function run(): void
    {
        $bidangs = [
            [
                'nama'      => 'Bidang Organisasi',
                'singkatan' => 'BIDOR',
                'deskripsi' => 'Bidang yang bertanggung jawab atas pengembangan organisasi dan anggota IMM Sukoharjo.',
                'warna'     => '#1d4ed8',
                'urutan'    => 1,
                'is_active' => true,
            ],
            [
                'nama'      => 'Bidang Riset dan Pengembangan Keilmuan',
                'singkatan' => 'RPK',
                'deskripsi' => 'Bidang yang fokus pada penelitian, pengembangan ilmu pengetahuan, dan kajian-kajian strategis untuk kemajuan umat.',
                'warna'     => '#7c3aed',
                'urutan'    => 2,
                'is_active' => true,
            ],
            [
                'nama'      => 'Bidang Tabligh dan Kajian Keislaman',
                'singkatan' => 'TKK',
                'deskripsi' => 'Bidang yang mengelola kegiatan dakwah, tabligh, dan kajian-kajian keislaman di lingkungan IMM.',
                'warna'     => '#059669',
                'urutan'    => 3,
                'is_active' => true,
            ],
            [
                'nama'      => 'Bidang Sosial dan Pemberdayaan Masyarakat',
                'singkatan' => 'SPM',
                'deskripsi' => 'Bidang yang bergerak di bidang sosial kemasyarakatan dan pemberdayaan masyarakat sekitar.',
                'warna'     => '#d97706',
                'urutan'    => 4,
                'is_active' => true,
            ],
            [
                'nama'      => 'Bidang Hikmah Politik dan Kebijakan Publik',
                'singkatan' => 'HPKP',
                'deskripsi' => 'Bidang yang mengkaji isu-isu politik, kebijakan publik, dan advokasi untuk kepentingan umat.',
                'warna'     => '#dc2626',
                'urutan'    => 5,
                'is_active' => true,
            ],
            [
                'nama'      => 'Bidang Media dan Komunikasi',
                'singkatan' => 'MEDKOM',
                'deskripsi' => 'Bidang yang mengelola media komunikasi dan publikasi informasi organisasi IMM Sukoharjo.',
                'warna'     => '#0891b2',
                'urutan'    => 6,
                'is_active' => true,
            ],
        ];

        foreach ($bidangs as $bidang) {
            Bidang::create($bidang);
        }

        $this->command->info('Bidang seeded successfully.');
    }
}
