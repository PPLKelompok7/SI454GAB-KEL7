<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Konselor;
use App\Models\SesiKonseling;
use App\Models\PendaftaranKonseling;

class PendaftaranKonselingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ambil beberapa konselor dan mahasiswa
        $konselor1 = Konselor::whereHas('user', function($query) {
            $query->where('email', 'sari.puspita@university.ac.id');
        })->first();
        
        $konselor2 = Konselor::whereHas('user', function($query) {
            $query->where('email', 'ahmad.wijaya@university.ac.id');
        })->first();

        $mahasiswa1 = User::where('email', 'john.doe@student.university.ac.id')->first();
        $mahasiswa2 = User::where('email', 'jane.smith@student.university.ac.id')->first();
        $mahasiswa3 = User::where('email', 'ahmad.rizki@student.university.ac.id')->first();

        // Buat sesi konseling terlebih dahulu
        $sesiKonseling = [
            [
                'konselor_id' => $konselor1->id,
                'hari' => 'Senin',
                'sesi' => '09:00 - 10:00',
                'status' => 'Tidak Tersedia' // Karena sudah ada yang daftar
            ],
            [
                'konselor_id' => $konselor1->id,
                'hari' => 'Selasa',
                'sesi' => '13:00 - 14:00',
                'status' => 'Tersedia'
            ],
            [
                'konselor_id' => $konselor2->id,
                'hari' => 'Rabu',
                'sesi' => '10:00 - 11:00',
                'status' => 'Tidak Tersedia'
            ],
            [
                'konselor_id' => $konselor2->id,
                'hari' => 'Kamis',
                'sesi' => '14:00 - 15:00',
                'status' => 'Tersedia'
            ]
        ];

        $createdSesi = [];
        foreach ($sesiKonseling as $sesi) {
            $createdSesi[] = SesiKonseling::create($sesi);
        }

        // Buat pendaftaran konseling
        $pendaftaranData = [
            [
                'sesi_konseling_id' => $createdSesi[0]->id,
                'mahasiswa_id' => $mahasiswa1->id,
                'nim' => '202001001',
                'jurusan' => 'Teknik Informatika',
                'fakulitas' => 'Fakultas Teknik',
                'tempat_tanggal_lahir' => '2002-05-15',
                'phone' => '081234567890',
                'keluhan' => 'Saya mengalami kesulitan dalam mengatur waktu belajar dan merasa overwhelmed dengan tugas-tugas kuliah. Sering merasa cemas menjelang ujian dan sulit berkonsentrasi saat belajar.',
                'status' => 'Terverifikasi',
                'link' => 'https://meet.google.com/xyz-abc-123'
            ],
            [
                'sesi_konseling_id' => $createdSesi[2]->id,
                'mahasiswa_id' => $mahasiswa2->id,
                'nim' => '202001002',
                'jurusan' => 'Psikologi',
                'fakulitas' => 'Fakultas Psikologi',
                'tempat_tanggal_lahir' => '2001-08-22',
                'phone' => '081234567891',
                'keluhan' => 'Saya merasa sulit beradaptasi dengan lingkungan kampus yang baru. Merasa kesepian dan sulit untuk membuat teman. Kadang merasa tidak percaya diri untuk berinteraksi dengan teman-teman.',
                'status' => 'Menunggu'
            ],
            [
                'sesi_konseling_id' => $createdSesi[0]->id,
                'mahasiswa_id' => $mahasiswa3->id,
                'nim' => '202001003',
                'jurusan' => 'Manajemen',
                'fakultas' => 'Fakultas Ekonomi',
                'tempat_tanggal_lahir' => '2002-01-10',
                'phone' => '081234567892',
                'keluhan' => 'Saya bingung dalam menentukan pilihan karir setelah lulus. Ada banyak pilihan tapi tidak yakin mana yang sesuai dengan minat dan kemampuan saya. Ingin mendapat bimbingan untuk eksplorasi karir.',
                'status' => 'Selesai',
                'link' => 'https://meet.google.com/def-ghi-456',
                'kesimpulan' => 'Mahasiswa telah mendapat pemahaman yang lebih baik tentang pilihan karir. Disarankan untuk mengikuti program magang dan konsultasi lanjutan bulan depan.'
            ]
        ];

        foreach ($pendaftaranData as $data) {
            PendaftaranKonseling::create($data);
        }
    }
}
