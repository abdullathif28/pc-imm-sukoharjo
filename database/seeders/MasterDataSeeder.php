<?php

namespace Database\Seeders;

use App\Models\Komisariat;
use App\Models\Pengurus;
use App\Models\Setting;
use App\Models\Timeline;
use Illuminate\Database\Seeder;

class MasterDataSeeder extends Seeder
{
    public function run(): void
    {
        // ===== SETTINGS =====
        $settings = [
            // Grup: organisasi
            ['key' => 'nama_organisasi',  'label' => 'Nama Organisasi',   'group' => 'organisasi', 'tipe' => 'text',     'value' => 'PC IMM Sukoharjo'],
            ['key' => 'nama_lengkap',     'label' => 'Nama Lengkap',      'group' => 'organisasi', 'tipe' => 'text',     'value' => 'Pimpinan Cabang Ikatan Mahasiswa Muhammadiyah Sukoharjo'],
            ['key' => 'periode_aktif',    'label' => 'Periode Aktif',     'group' => 'organisasi', 'tipe' => 'text',     'value' => '2026'],
            ['key' => 'visi',             'label' => 'Visi Organisasi',   'group' => 'organisasi', 'tipe' => 'textarea', 'value' => 'Terwujudnya kader IMM Sukoharjo yang religius, intelektual, dan humanis — sebagai kekuatan perubahan menuju masyarakat Islam yang berkemajuan dan berkeadaban.'],
            ['key' => 'misi',             'label' => 'Misi Organisasi',   'group' => 'organisasi', 'tipe' => 'textarea', 'value' => "1. Memperkuat nilai-nilai Islam berkemajuan di kalangan mahasiswa\n2. Mengembangkan tradisi intelektual dan budaya kritis\n3. Menumbuhkan kepedulian sosial dan semangat pengabdian\n4. Mencetak kader pemimpin yang berkarakter dan berintegritas\n5. Membangun sinergi antar komisariat untuk gerakan kolektif"],
            ['key' => 'deskripsi_singkat','label' => 'Deskripsi Singkat', 'group' => 'organisasi', 'tipe' => 'textarea', 'value' => 'Pimpinan Cabang Ikatan Mahasiswa Muhammadiyah Sukoharjo — Berjuang dalam Religiusitas, Intelektualitas, dan Humanitas.'],
            // Grup: kontak
            ['key' => 'alamat',           'label' => 'Alamat Sekretariat','group' => 'kontak',     'tipe' => 'text',     'value' => 'Universitas Muhammadiyah Surakarta, Sukoharjo, Jawa Tengah'],
            ['key' => 'email',            'label' => 'Email',             'group' => 'kontak',     'tipe' => 'email',    'value' => 'pcimm.sukoharjo@gmail.com'],
            ['key' => 'telepon',          'label' => 'Nomor Telepon/WA',  'group' => 'kontak',     'tipe' => 'phone',    'value' => ''],
            // Grup: sosmed
            ['key' => 'instagram',        'label' => 'Instagram URL',     'group' => 'sosmed',     'tipe' => 'url',      'value' => 'https://instagram.com'],
            ['key' => 'facebook',         'label' => 'Facebook URL',      'group' => 'sosmed',     'tipe' => 'url',      'value' => 'https://facebook.com'],
            ['key' => 'youtube',          'label' => 'YouTube URL',       'group' => 'sosmed',     'tipe' => 'url',      'value' => 'https://youtube.com'],
            ['key' => 'tiktok',           'label' => 'TikTok URL',        'group' => 'sosmed',     'tipe' => 'url',      'value' => 'https://tiktok.com'],
            ['key' => 'twitter',          'label' => 'Twitter/X URL',     'group' => 'sosmed',     'tipe' => 'url',      'value' => 'https://twitter.com'],
        ];
        foreach ($settings as $s) {
            Setting::updateOrCreate(['key' => $s['key']], $s);
        }

        // ===== PENGURUS =====
        $pengurusData = [
            ['nama' => 'Azhar Ardiansyah Al-Aziz', 'jabatan' => 'Ketua Umum',      'tipe' => 'ketua_umum',    'periode' => '2026', 'quote' => 'Tradisi membaca, menulis, dan berdiskusi harus terus dihidupkan di tubuh IMM.', 'urutan' => 1],
            ['nama' => 'Sekretaris Umum',           'jabatan' => 'Sekretaris Umum', 'tipe' => 'pengurus_inti', 'periode' => '2026', 'urutan' => 2],
            ['nama' => 'Bendahara Umum',            'jabatan' => 'Bendahara Umum',  'tipe' => 'pengurus_inti', 'periode' => '2026', 'urutan' => 3],
        ];
        foreach ($pengurusData as $p) {
            Pengurus::updateOrCreate(['nama' => $p['nama'], 'periode' => $p['periode']], array_merge($p, ['asal_kampus' => 'UMS Sukoharjo', 'is_active' => true]));
        }

        // ===== KOMISARIAT =====
        $komisariatData = [
            ['nama' => 'PK IMM Muhammad Abduh',         'singkatan' => 'IMM M. Abduh',      'kampus' => 'FAI UMS',                         'basis' => 'ums',       'emoji' => '🕌', 'warna_gradient' => 'linear-gradient(135deg, #1565C0, #0D47A1)', 'jumlah_kader' => 120, 'jumlah_proker' => 8, 'urutan' => 1, 'deskripsi' => 'Komisariat berbasis di Fakultas Agama Islam UMS, fokus pada pengembangan keilmuan Islam dan kaderisasi mahasiswa FAI.'],
            ['nama' => 'PK IMM Pondok Hj. Nuriyah Sobron','singkatan' => 'IMM NHS',          'kampus' => 'Pesantren Hj. Nuriyah Sobron',    'basis' => 'pesantren', 'emoji' => '📖', 'warna_gradient' => 'linear-gradient(135deg, #2E7D32, #1B5E20)', 'jumlah_kader' => 85,  'jumlah_proker' => 6, 'urutan' => 2, 'deskripsi' => 'Komisariat yang berakar dari tradisi pesantren dengan kekuatan pada kajian keislaman mendalam.'],
            ['nama' => 'PK IMM K.H. Mas Manshur',       'singkatan' => 'IMM Mas Manshur',   'kampus' => 'UMS',                             'basis' => 'ums',       'emoji' => '🏛️', 'warna_gradient' => 'linear-gradient(135deg, #6A1B9A, #4A148C)', 'jumlah_kader' => 95,  'jumlah_proker' => 7, 'urutan' => 3, 'deskripsi' => 'Komisariat yang mengedepankan gerakan sosial dan intelektualitas kader.'],
            ['nama' => 'PK IMM H. Misbach',             'singkatan' => 'IMM H. Misbach',    'kampus' => 'UMS',                             'basis' => 'ums',       'emoji' => '⚡', 'warna_gradient' => 'linear-gradient(135deg, #E65100, #BF360C)', 'jumlah_kader' => 110, 'jumlah_proker' => 9, 'urutan' => 4, 'deskripsi' => 'Komisariat aktif dengan fokus pada pengembangan kepemimpinan mahasiswa.'],
            ['nama' => 'PK IMM Mahad Abu Bakr Putri',   'singkatan' => 'IMM Abu Bakr Putri','kampus' => 'Mahad Abu Bakr UMS',              'basis' => 'pesantren', 'emoji' => '🌸', 'warna_gradient' => 'linear-gradient(135deg, #880E4F, #560027)', 'jumlah_kader' => 75,  'jumlah_proker' => 6, 'urutan' => 5, 'deskripsi' => 'Komisariat khusus kader putri yang mengedepankan pemberdayaan perempuan dalam bingkai nilai Islam berkemajuan.'],
            ['nama' => 'PK IMM Abu Toyib',              'singkatan' => 'IMM Abu Toyib',     'kampus' => 'UMS',                             'basis' => 'ums',       'emoji' => '🔬', 'warna_gradient' => 'linear-gradient(135deg, #00695C, #004D40)', 'jumlah_kader' => 90,  'jumlah_proker' => 7, 'urutan' => 6, 'deskripsi' => 'Komisariat dengan tradisi kuat dalam riset, kajian keilmuan, dan pengembangan intelektual kader.'],
        ];
        foreach ($komisariatData as $k) {
            Komisariat::updateOrCreate(['nama' => $k['nama']], array_merge($k, ['is_active' => true]));
        }

        // ===== TIMELINE =====
        $timelineData = [
            ['tahun' => 'Berdiri',       'judul' => 'Pendirian PC IMM Sukoharjo',              'urutan' => 1, 'deskripsi' => 'PC IMM Sukoharjo resmi berdiri sebagai wadah gerakan mahasiswa Muslim di wilayah Sukoharjo, berbasis di lingkungan kampus Muhammadiyah.'],
            ['tahun' => 'Pengembangan',  'judul' => 'Tradisi Baret Merah (BM)',                'urutan' => 2, 'deskripsi' => 'PC IMM Sukoharjo mengembangkan tradisi kajian Baret Merah — kelompok diskusi keilmuan yang menjadi ciri khas intelektual kader IMM Sukoharjo.'],
            ['tahun' => 'Konsolidasi',   'judul' => 'Pembentukan 6 Komisariat',                'urutan' => 3, 'deskripsi' => 'Jaringan komisariat berkembang mencakup berbagai basis kampus dan pesantren di wilayah Sukoharjo untuk memperluas jangkauan kaderisasi.'],
            ['tahun' => '2026',          'judul' => 'Pelantikan Periode Baru',                 'urutan' => 4, 'deskripsi' => 'PC IMM Sukoharjo periode 2026 dilantik di Auditorium Moh. Djazman UMS dengan tema "Merajut Gerakan Kolektif, Menggema dalam Kolaboratif".'],
        ];
        foreach ($timelineData as $t) {
            Timeline::updateOrCreate(['judul' => $t['judul']], array_merge($t, ['is_active' => true]));
        }

        $this->command->info('Master data seeded: Settings, Pengurus, Komisariat, Timeline.');
    }
}
