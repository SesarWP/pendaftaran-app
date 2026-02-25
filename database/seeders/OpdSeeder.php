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
                'nama' => 'Dinas Komunikasi dan Informatika (DISKOMINFO) Kabupaten Sragen',
                'kode' => '2.16',
                'aktif' => true,
                'kontak' => 'Phone: +62-0271-894001, Fax: +62-0271-891297, E-mail: kominfo@sragenkab.go.id',
                'alamat' => 'Jl. Dr. Sutomo Nomor 10 Sragen 57211, Jateng, Indonesia',
                'keterangan' => 'Perangkat daerah yang bertugas menyelenggarakan urusan pemerintahan di bidang komunikasi, informatika, dan teknologi informasi.',
            ]
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
