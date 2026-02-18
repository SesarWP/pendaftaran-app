<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Opd;

class OpdSeeder extends Seeder
{
    /**
     * Jalankan seeder database.
     */
    public function run(): void
    {
        $opds = [
            [
                'nama' => 'Dinas Arsip dan Perpustakaan (DISARPUS) Kabupaten Sragen',
                'kode' => '1',
                'aktif' => true,
                'kontak' => 'Telp: (0271) 892721',
                'alamat' => 'Jl. Solo - Sragen No.80, Sine, Kec. Sragen, Kabupaten Sragen, Jawa Tengah 57213',
                'keterangan' => 'Dinas Arsip dan Perpustakaan Kabupaten Sragen adalah perangkat daerah di lingkungan Pemerintah Kabupaten Sragen yang berfungsi sebagai pelaksana urusan pemerintahan di bidang perpustakaan dan kearsipan.',
            ],
            [
                'nama' => 'Badan Perencanaan Pembangunan Riset dan Inovasi Daerah (BAPPERIDA) Kabupaten Sragen',
                'kode' => '2',
                'aktif' => true,
                'kontak' => 'Telp: 0271-891173, Fax: 0271-890981, Email: bapperida@sragenkab.go.id',
                'alamat' => 'Jl. Dr. Sutomo No. 10 Sragen Jawa Tengah',
                'keterangan' => 'Badan Perencanaan Pembangunan, Riset dan Inovasi Daerah Kabupaten Sragen (Bapperida) bertugas membantu Bupati dalam menyusun perencanaan pembangunan daerah.',
            ],
            [
                'nama' => 'Badan Amil Zakat Nasional (BAZNAS) Kabupaten Sragen',
                'kode' => '3',
                'aktif' => true,
                'kontak' => '(0271) 8825250 / 0821 3851 1100',
                'alamat' => 'Komplek Masjid Bazis, Kebayanan Jetis, Pilangsari, Kec. Sragen, Kabupaten Sragen, Jawa Tengah 57252',
                'keterangan' => 'Lembaga zakat resmi di Kabupaten Sragen yang bertugas mengelola dan menyalurkan dana zakat, infak, dan sedekah (ZIS).',
            ],
            [
                'nama' => 'Badan Pengelolaan Keuangan dan Pendapatan Daerah (BPKPD) Kabupaten Sragen',
                'kode' => '4',
                'aktif' => true,
                'kontak' => 'Phone: (0271)890983, Email: bpkpd@sragenkab.go.id',
                'alamat' => 'Jl. Raya Sukowati 255 Sragen',
                'keterangan' => 'Perangkat daerah yang bertugas mengelola keuangan dan pendapatan daerah Kabupaten Sragen.',
            ],
            [
                'nama' => 'Badan Pusat Statistik (BPS) Kabupaten Sragen',
                'kode' => '5',
                'aktif' => true,
                'kontak' => 'Telp: (0271) 891151, Email: bps3314@bps.go.id',
                'alamat' => 'Jl. Letjen Suprapto 48 Sragen Jawa Tengah',
                'keterangan' => 'Perwakilan lembaga statistik nasional di Kabupaten Sragen yang bertugas mengumpulkan, mengolah, dan menyajikan data statistik wilayah.',
            ],
            [
                'nama' => 'Dinas Komunikasi dan Informatika (DISKOMINFO) Kabupaten Sragen',
                'kode' => '6',
                'aktif' => true,
                'kontak' => 'Phone: +62-0271-894001, Fax: +62-0271-891297, E-mail: kominfo@sragenkab.go.id',
                'alamat' => 'Jl. Dr. Sutomo Nomor 10 Sragen 57211, Jateng, Indonesia',
                'keterangan' => 'Perangkat daerah yang bertugas menyelenggarakan urusan pemerintahan di bidang komunikasi, informatika, dan teknologi informasi.',
            ],
            [
                'nama' => 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu (DPMPTSP) Kabupaten Sragen',
                'kode' => '7',
                'aktif' => true,
                'kontak' => 'Telp: (0271)892348, Fax: (0271) 894433',
                'alamat' => 'Jl. Dr. Sutomo No. 5, Sine, Kec. Sragen, Kabupaten Sragen, Jawa Tengah 57213',
                'keterangan' => 'Perangkat daerah yang bertugas memfasilitasi dan mengatur perizinan investasi serta pelayanan terpadu satu pintu.',
            ],
            [
                'nama' => 'Inspektorat Daerah Kabupaten Sragen',
                'kode' => '8',
                'aktif' => true,
                'kontak' => 'Telp: +62 853 3470 7007, Email: inspektorat@sragenkab.go.id',
                'alamat' => 'Komplek Kantor Terpadu Sragen Jl. Dr. Sutomo No 10, Kec. Sragen Kabupaten Sragen 57213',
                'keterangan' => 'Perangkat daerah yang bertugas melakukan pengawasan, pemeriksaan, dan pengendalian internal penyelenggaraan pemerintahan.',
            ],
            [
                'nama' => 'UPT Penanggulangan Kemiskinan Kabupaten Sragen',
                'kode' => '9',
                'aktif' => true,
                'kontak' => '(0271) 8823700',
                'alamat' => 'Pemda Kab. Sragen, Jl. Sukowati No.255, Karang Duwo, Sragen Tengah, Kec. Sragen, Kabupaten Sragen, Jawa Tengah 57211',
                'keterangan' => 'Unit Pelaksana Teknis yang bertugas melaksanakan program dan kegiatan untuk mengurangi kemiskinan.',
            ],
            [
                'nama' => 'Dinas Pendidikan dan Kebudayaan (DISDIKBUD) Kabupaten Sragen',
                'kode' => '10',
                'aktif' => true,
                'kontak' => 'No. Telp: 08991891052, Email: disdikbud@sragenkab.go.id',
                'alamat' => 'Jl. Dr. Sutomo No.2a Beloran, Sragen, Kabupaten Sragen, Provinsi Jawa Tengah',
                'keterangan' => 'Perangkat daerah yang bertugas menyelenggarakan urusan pemerintahan di bidang pendidikan dan kebudayaan.',
            ],
            [
                'nama' => 'RSUD Dr. Soehadi Prijonegoro Kabupaten Sragen',
                'kode' => '11',
                'aktif' => true,
                'kontak' => '(0271) 891068',
                'alamat' => 'Jl. Sukowati No.534, Ngrandu, Nglorog, Kec. Sragen, Kabupaten Sragen, Jawa Tengah 57215',
                'keterangan' => 'Rumah sakit umum daerah yang dikelola oleh Pemerintah Kabupaten Sragen.',
            ],
            [
                'nama' => 'Dinas Pemberdayaan Masyarakat dan Desa (DPMD) Kabupaten Sragen',
                'kode' => '12',
                'aktif' => true,
                'kontak' => 'Telp: 0271 891010, Email: dpmd@sragenkab.go.id',
                'alamat' => 'Kantor Terpadu Pemda Sragen Jalan Dr. Sutomo No 10 Sragen',
                'keterangan' => 'Perangkat daerah yang bertugas menyelenggarakan urusan pemerintahan di bidang pemberdayaan masyarakat dan pembangunan desa.',
            ],
            [
                'nama' => 'Dinas Sosial (DINSOS) Kabupaten Sragen',
                'kode' => '13',
                'aktif' => true,
                'kontak' => 'Telp: 0813-2358-9514, Email: dinsos@dinsossragen.com',
                'alamat' => 'Jl. Mayjen T. Hamzah Bendahara Kabupaten Sragen',
                'keterangan' => 'Dinas Sosial bertugas membantu Bupati dalam melaksanakan urusan pemerintahan di bidang sosial.',
            ],
            [
                'nama' => 'Badan Penanggulangan Bencana Daerah (BPBD) Kabupaten Sragen',
                'kode' => '14',
                'aktif' => true,
                'kontak' => 'Telp: 0271-891433, WhatsApp: 082133124007, Email: bpbd@sragenkab.go.id',
                'alamat' => 'Jl. Veteran No.23, Magero, Sragen Tengah, Kec. Sragen, Kabupaten Sragen, Jawa Tengah 57211',
                'keterangan' => 'Perangkat daerah yang bertugas menyelenggarakan urusan pemerintahan di bidang penanggulangan bencana.',
            ],
            [
                'nama' => 'Dinas Kesehatan Kabupaten Sragen',
                'kode' => '15',
                'aktif' => true,
                'kontak' => 'Telp: (0271) 891078',
                'alamat' => 'Jl. Sukowati No.599, Kebayan 1, Sragen Kulon, Kec. Sragen, Kabupaten Sragen, Jawa Tengah 57212',
                'keterangan' => 'Dinas Kesehatan Kabupaten Sragen berperan dalam meningkatkan kualitas kesehatan masyarakat.',
            ],
        ];

        // Nonaktifkan foreign key, kosongkan tabel, lalu isi ulang
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Opd::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        foreach ($opds as $index => $opd) {
            Opd::create(array_merge(['id' => $index + 1], $opd));
        }
    }
}
