<?php

namespace Database\Seeders;

use App\Models\RegistrationStep;
use Illuminate\Database\Seeder;

class RegistrationStepSeeder extends Seeder
{
    public function run(): void
    {
        $steps = [
            [
                'step_number' => 1,
                'title' => 'Daftar Akun',
                'description' => 'Pilih tipe Pelajar/Mahasiswa lalu buat akun dengan email aktif.',
            ],
            [
                'step_number' => 2,
                'title' => 'Lengkapi Profil',
                'description' => 'Isi data instansi, jurusan/prodi, nomor induk, dan kontak.',
            ],
            [
                'step_number' => 3,
                'title' => 'Ajukan Magang',
                'description' => 'Tentukan periode magang sesuai jadwal akademik Anda.',
            ],
            [
                'step_number' => 4,
                'title' => 'Upload Berkas',
                'description' => 'Unggah surat pengantar, transkrip/rapor, CV, dan proposal.',
            ],
            [
                'step_number' => 5,
                'title' => 'Pantau Status',
                'description' => 'Pantau status: Diproses, Disetujui, Ditolak, atau Selesai.',
            ],
        ];

        foreach ($steps as $step) {
            RegistrationStep::updateOrCreate(
                ['step_number' => $step['step_number']],
                [
                    'title' => $step['title'],
                    'description' => $step['description'],
                    'is_active' => true,
                ]
            );
        }
    }
}
