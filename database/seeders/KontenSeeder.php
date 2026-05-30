<?php

namespace Database\Seeders;

use App\Models\Bidang;
use App\Models\Konten;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KontenSeeder extends Seeder
{
    public function run(): void
    {
        $bidangs = Bidang::all();
        $admins  = User::where('role', 'admin_bidang')->get()->keyBy('bidang_id');

        $jenisData = [
            'berita' => [
                [
                    'judul'     => 'PC IMM Sukoharjo Gelar Rapat Koordinasi Semester Ganjil',
                    'ringkasan' => 'Pimpinan Cabang IMM Sukoharjo mengadakan rapat koordinasi untuk membahas program kerja semester ganjil tahun ini.',
                    'isi'       => '<p>Pimpinan Cabang Ikatan Mahasiswa Muhammadiyah (PC IMM) Sukoharjo menggelar rapat koordinasi besar dalam rangka mempersiapkan program kerja untuk semester ganjil tahun akademik ini. Kegiatan yang berlangsung di Aula Universitas Muhammadiyah Sukoharjo ini dihadiri oleh seluruh pengurus bidang dan perwakilan komisariat.</p><p>Ketua PC IMM Sukoharjo dalam sambutannya menekankan pentingnya sinergi antar bidang dalam mewujudkan visi organisasi. "Kita harus bersama-sama membangun IMM yang lebih kuat, lebih solid, dan lebih bermanfaat bagi masyarakat," tegasnya.</p><p>Rapat koordinasi ini menghasilkan beberapa keputusan strategis terkait program kerja prioritas yang akan dijalankan dalam semester mendatang, termasuk peningkatan kualitas pengkaderan, pengembangan kajian keilmuan, dan penguatan gerakan sosial kemasyarakatan.</p>',
                    'lokasi'    => 'Aula UMS Sukoharjo',
                    'status'    => 'published',
                    'is_featured' => true,
                ],
                [
                    'judul'     => 'IMM Sukoharjo Berhasil Raih Penghargaan Organisasi Terbaik',
                    'ringkasan' => 'Pada Musyawarah Daerah IMM Jawa Tengah, PC IMM Sukoharjo berhasil meraih penghargaan sebagai organisasi terbaik tingkat cabang.',
                    'isi'       => '<p>Pimpinan Cabang Ikatan Mahasiswa Muhammadiyah (PC IMM) Sukoharjo berhasil menorehkan prestasi membanggakan dengan meraih penghargaan sebagai Organisasi Terbaik Tingkat Cabang dalam ajang Musyawarah Daerah IMM Jawa Tengah yang baru saja berlangsung.</p><p>Penghargaan ini merupakan bukti nyata dari kerja keras seluruh kader dan pengurus IMM Sukoharjo yang telah berdedikasi tinggi dalam menjalankan program-program organisasi. Berbagai kegiatan produktif yang telah dilaksanakan menjadi pertimbangan utama dalam penilaian.</p>',
                    'lokasi'    => 'Semarang',
                    'status'    => 'published',
                    'is_featured' => true,
                ],
            ],
            'kegiatan' => [
                [
                    'judul'        => 'Pelatihan Kepemimpinan Dasar (DAD) IMM Sukoharjo',
                    'ringkasan'    => 'Kegiatan pengkaderan formal tingkat dasar untuk mencetak kader IMM yang berkualitas dan berkarakter.',
                    'isi'          => '<p>Pimpinan Cabang IMM Sukoharjo menyelenggarakan Darul Arqam Dasar (DAD) sebagai jenjang pengkaderan formal pertama di lingkungan IMM. Kegiatan ini diikuti oleh puluhan calon kader dari berbagai komisariat di bawah naungan PC IMM Sukoharjo.</p><p>DAD berlangsung selama tiga hari dua malam dengan mengusung tema "Membentuk Kader Militan yang Berilmu, Berakhlak, dan Berdaya". Berbagai materi disampaikan oleh instruktur berpengalaman, meliputi: ke-Islaman, ke-Muhammadiyahan, ke-IMM-an, kepemimpinan, dan gerakan sosial.</p>',
                    'tanggal_mulai'  => now()->addDays(7)->format('Y-m-d'),
                    'tanggal_selesai'=> now()->addDays(9)->format('Y-m-d'),
                    'lokasi'       => 'Bumi Perkemahan Tawangmangu',
                    'status'       => 'published',
                    'is_featured'  => true,
                ],
                [
                    'judul'        => 'Bakti Sosial dan Santunan Anak Yatim',
                    'ringkasan'    => 'Rangkaian kegiatan bakti sosial IMM Sukoharjo berupa pemberian santunan, sembako, dan pelayanan kesehatan gratis.',
                    'isi'          => '<p>Dalam rangka memperingati Hari Anak Nasional, Pimpinan Cabang IMM Sukoharjo menyelenggarakan kegiatan Bakti Sosial dan Santunan Anak Yatim. Kegiatan ini merupakan wujud nyata kepedulian IMM terhadap kondisi sosial masyarakat di sekitar wilayah Sukoharjo.</p><p>Kegiatan bakti sosial ini meliputi: pemberian santunan kepada 100 anak yatim, pembagian paket sembako kepada keluarga kurang mampu, pelayanan kesehatan gratis bagi warga, dan bazaar murah berbagai kebutuhan pokok.</p>',
                    'tanggal_mulai'  => now()->addDays(14)->format('Y-m-d'),
                    'tanggal_selesai'=> now()->addDays(14)->format('Y-m-d'),
                    'lokasi'       => 'Desa Tanjunganom, Sukoharjo',
                    'status'       => 'published',
                    'is_featured'  => false,
                ],
            ],
            'program_kerja' => [
                [
                    'judul'     => 'Program Peningkatan Kualitas Kader IMM 2024',
                    'ringkasan' => 'Program komprehensif untuk meningkatkan kualitas SDM kader IMM melalui serangkaian pelatihan dan pendidikan.',
                    'isi'       => '<h3>Latar Belakang</h3><p>Program ini dirancang untuk menjawab tantangan era modern yang menuntut kader IMM memiliki kompetensi ganda: kompetensi keagamaan yang kuat dan kompetensi profesional yang mumpuni.</p><h3>Tujuan Program</h3><ul><li>Meningkatkan pemahaman kader tentang nilai-nilai Islam Berkemajuan</li><li>Mengembangkan kemampuan kepemimpinan dan manajerial kader</li><li>Mempersiapkan kader untuk berkontribusi nyata di masyarakat</li></ul><h3>Sasaran</h3><p>Seluruh kader aktif IMM di wilayah Sukoharjo, dengan prioritas kader baru hasil pengkaderan tahun ini.</p>',
                    'tanggal_mulai'  => now()->format('Y-m-d'),
                    'tanggal_selesai'=> now()->addMonths(6)->format('Y-m-d'),
                    'status'    => 'published',
                    'is_featured' => false,
                ],
            ],
        ];

        foreach ($bidangs as $bidang) {
            $admin = $admins[$bidang->id] ?? $admins->first();
            if (!$admin) continue;

            foreach ($jenisData as $jenis => $items) {
                foreach ($items as $item) {
                    Konten::create(array_merge($item, [
                        'bidang_id' => $bidang->id,
                        'user_id'   => $admin->id,
                        'jenis'     => $jenis,
                        'slug'      => Str::slug($item['judul']) . '-' . $bidang->id . '-' . uniqid(),
                        'tanggal_mulai'   => $item['tanggal_mulai'] ?? null,
                        'tanggal_selesai' => $item['tanggal_selesai'] ?? null,
                    ]));
                }
            }
        }

        $this->command->info('Konten seeded successfully.');
    }
}
