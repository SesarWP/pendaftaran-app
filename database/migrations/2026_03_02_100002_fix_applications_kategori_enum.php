<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Step 1: Temporarily add 'pelajar' to enum alongside 'smk'
        DB::statement("ALTER TABLE applications MODIFY COLUMN kategori ENUM('mahasiswa', 'smk', 'pelajar') NOT NULL");

        // Step 2: Update existing 'smk' rows to 'pelajar'
        DB::table('applications')->where('kategori', 'smk')->update(['kategori' => 'pelajar']);

        // Step 3: Remove 'smk' from enum
        DB::statement("ALTER TABLE applications MODIFY COLUMN kategori ENUM('mahasiswa', 'pelajar') NOT NULL");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE applications MODIFY COLUMN kategori ENUM('mahasiswa', 'smk', 'pelajar') NOT NULL");
        DB::table('applications')->where('kategori', 'pelajar')->update(['kategori' => 'smk']);
        DB::statement("ALTER TABLE applications MODIFY COLUMN kategori ENUM('mahasiswa', 'smk') NOT NULL");
    }
};
