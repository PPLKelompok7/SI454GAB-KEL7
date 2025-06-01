<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Konselor;
use Illuminate\Support\Facades\Hash;

class KonselorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data konselor yang akan di-seed
        $konselorData = [
            [
                'name' => 'Dr. Sari Puspita, M.Psi',
                'email' => 'sari.puspita@university.ac.id',
                'nip' => '198501152010122001',
                'no_telepon' => '081234567890',
                'gambar' => 'konselor1.jpg',
                'deskripsi' => 'Psikolog klinis dengan spesialisasi konseling mahasiswa dan manajemen stres. Berpengalaman 15 tahun dalam bidang psikologi pendidikan.'
            ],
            [
                'name' => 'Prof. Dr. Ahmad Wijaya, M.Psi',
                'email' => 'ahmad.wijaya@university.ac.id',
                'nip' => '197803201998031002',
                'no_telepon' => '081234567891',
                'gambar' => 'konselor2.jpg',
                'deskripsi' => 'Konselor berpengalaman dalam menangani masalah akademik, adaptasi kampus, dan pengembangan karir mahasiswa.'
            ],
            [
                'name' => 'Dr. Maya Sari Dewi, S.Psi, M.Psi',
                'email' => 'maya.dewi@university.ac.id',
                'nip' => '198907142015042001',
                'no_telepon' => '081234567892',
                'gambar' => 'konselor3.jpg',
                'deskripsi' => 'Spesialis konseling individual dan kelompok untuk mahasiswa dengan fokus pada kesehatan mental dan wellbeing.'
            ],
            [
                'name' => 'Drs. Bambang Sutrisno, M.Pd',
                'email' => 'bambang.sutrisno@university.ac.id',
                'nip' => '196512101992031001',
                'no_telepon' => '081234567893',
                'gambar' => 'konselor4.jpg',
                'deskripsi' => 'Konselor senior dengan expertise dalam bimbingan akademik, motivasi belajar, dan pengembangan soft skills mahasiswa.'
            ],
            [
                'name' => 'Dr. Rina Hartati, S.Psi, M.Psi',
                'email' => 'rina.hartati@university.ac.id',
                'nip' => '199001282018032001',
                'no_telepon' => '081234567894',
                'gambar' => 'konselor5.jpg',
                'deskripsi' => 'Psikolog muda yang fokus pada konseling remaja dan dewasa muda, khususnya dalam hal penyesuaian diri dan hubungan interpersonal.'
            ]
        ];

        foreach ($konselorData as $data) {
            // Buat user dengan role Konselor
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'is_role' => 'Konselor',
                'password' => Hash::make('password123'), // Default password
                'email_verified_at' => now(),
            ]);

            // Buat detail konselor
            Konselor::create([
                'user_id' => $user->id,
                'nip' => $data['nip'],
                'no_telepon' => $data['no_telepon'],
                'gambar' => $data['gambar'],
                'deskripsi' => $data['deskripsi'],
            ]);
        }

        // Buat 1 user admin
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@university.ac.id',
            'is_role' => 'Admin',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now(),
        ]);

        // Buat beberapa user mahasiswa untuk testing
        $mahasiswaData = [
            [
                'name' => 'John Doe',
                'email' => 'john.doe@student.university.ac.id',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@student.university.ac.id',
            ],
            [
                'name' => 'Ahmad Rizki',
                'email' => 'ahmad.rizki@student.university.ac.id',
            ]
        ];

        foreach ($mahasiswaData as $data) {
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'is_role' => 'Mahasiswa',
                'password' => Hash::make('mahasiswa123'),
                'email_verified_at' => now(),
            ]);
        }
    }
}
