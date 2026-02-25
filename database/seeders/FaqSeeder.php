<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'Berapa lama proses verifikasi pengajuan magang?',
                'answer' => 'Proses verifikasi biasanya memakan waktu <strong>1-3 hari kerja</strong> setelah Anda mengirimkan pengajuan lengkap. Anda dapat memantau status pengajuan melalui dashboard akun Anda.',
            ],
            [
                'question' => 'Apakah saya bisa mengajukan ke lebih dari satu OPD?',
                'answer' => 'Tidak, Anda <strong>hanya dapat memiliki 1 pengajuan aktif</strong> dalam satu waktu. Jika pengajuan Anda ditolak atau selesai, Anda dapat mengajukan kembali ke OPD yang sama atau berbeda.',
            ],
            [
                'question' => 'Apa yang harus saya lakukan jika pengajuan ditolak?',
                'answer' => 'Jika pengajuan ditolak, Anda akan menerima <strong>alasan penolakan</strong> di dashboard. Anda dapat:<ul><li>Memperbaiki dokumen atau data yang kurang sesuai</li><li>Mengajukan kembali ke OPD yang sama setelah perbaikan</li><li>Mencoba mengajukan ke OPD lain yang sesuai dengan minat Anda</li></ul>',
            ],
            [
                'question' => 'Format file apa saja yang diterima untuk dokumen?',
                'answer' => '<ul><li><strong>Surat Pengantar:</strong> PDF (maks 4MB)</li><li><strong>Transkrip/Rapor:</strong> PDF, JPG, atau PNG (maks 4MB)</li><li><strong>CV:</strong> PDF (maks 4MB, opsional)</li><li><strong>Proposal:</strong> PDF (maks 4MB, opsional)</li></ul>',
            ],
            [
                'question' => 'Bagaimana cara menghubungi OPD jika ada pertanyaan?',
                'answer' => 'Setelah pengajuan Anda disetujui, informasi kontak OPD akan tersedia di halaman detail pengajuan Anda. Anda dapat menghubungi OPD melalui nomor telepon atau email yang tertera.',
            ],
            [
                'question' => 'Apakah ada biaya untuk mendaftar?',
                'answer' => '<strong>Tidak ada biaya</strong> untuk mendaftar dan mengajukan magang melalui POMAS. Seluruh proses pendaftaran adalah gratis.',
            ],
            [
                'question' => 'Berapa lama durasi magang yang ideal?',
                'answer' => 'Durasi magang disesuaikan dengan <strong>kebutuhan akademik</strong> Anda. Pastikan periode yang Anda pilih sesuai dengan jadwal dari sekolah/kampus Anda. Umumnya berkisar antara 1-3 bulan.',
            ],
        ];

        foreach ($faqs as $i => $faq) {
            Faq::updateOrCreate(
                ['question' => $faq['question']],
                [
                    'answer' => $faq['answer'],
                    'sort_order' => $i + 1,
                    'is_active' => true,
                ]
            );
        }
    }
}
