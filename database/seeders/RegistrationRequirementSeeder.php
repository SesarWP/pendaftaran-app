<?php

namespace Database\Seeders;

use App\Models\RegistrationRequirement;
use Illuminate\Database\Seeder;

class RegistrationRequirementSeeder extends Seeder
{
    public function run(): void
    {
        $requirements = [
            [
                'category' => 'Pelajar',
                'title' => 'Untuk Pelajar',
                'content' => '<ul><li>NISN yang terdaftar dan valid</li><li>Surat pengantar dari sekolah (PDF, maks 4MB)</li><li>Transkrip nilai/rapor (PDF/JPG/PNG, maks 4MB)</li><li>CV yang terstruktur (PDF, opsional)</li><li>Proposal kegiatan (PDF, opsional)</li></ul>',
                'sort_order' => 1,
            ],
            [
                'category' => 'Mahasiswa',
                'title' => 'Untuk Mahasiswa',
                'content' => '<ul><li>NIM yang terdaftar dan valid</li><li>Surat pengantar dari universitas (PDF, maks 4MB)</li><li>Transkrip nilai (PDF/JPG/PNG, maks 4MB)</li><li>CV yang profesional (PDF, opsional)</li><li>Proposal kegiatan (PDF, opsional)</li></ul>',
                'sort_order' => 2,
            ],
            [
                'category' => 'Tips',
                'title' => 'Tips Persiapan Dokumen',
                'content' => '<ul><li>Pastikan semua dokumen dalam format yang diminta (PDF untuk surat, PDF/JPG/PNG untuk transkrip)</li><li>Ukuran file tidak melebihi 4MB per dokumen</li><li>Scan dokumen dengan resolusi yang jelas dan mudah dibaca</li><li>Surat pengantar harus ditandatangani dan dicap oleh pihak sekolah/universitas</li><li>Periksa kembali semua data sebelum mengunggah</li></ul>',
                'sort_order' => 3,
            ],
        ];

        foreach ($requirements as $req) {
            RegistrationRequirement::updateOrCreate(
                ['category' => $req['category'], 'title' => $req['title']],
                [
                    'content' => $req['content'],
                    'sort_order' => $req['sort_order'],
                    'is_active' => true,
                ]
            );
        }
    }
}
