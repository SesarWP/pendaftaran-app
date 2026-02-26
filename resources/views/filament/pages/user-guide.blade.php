<x-filament-panels::page>

<link rel="stylesheet" href="{{ asset('css/user-guide.css') }}">

<div class="guide-container">

    {{-- INTRO --}}
    <div class="guide-intro">
        <h2>Selamat Datang di Panduan Admin POMAS</h2>
        <p>
            Panduan ini akan membantu Anda memahami setiap fitur di panel admin.
            Klik pada setiap bagian di bawah untuk melihat langkah-langkahnya.
        </p>
    </div>

    {{-- 1. DASHBOARD --}}
    <div class="accordion-item" x-data="{ open: false }">
        <div class="accordion-header" @click="open = !open">
            <div class="accordion-title">
                <h3>Dashboard</h3>
                <p>Ringkasan statistik dan grafik permohonan magang</p>
            </div>
            <svg class="accordion-chevron" :class="{ 'open': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
        </div>
        <div class="accordion-body" x-show="open" x-collapse x-cloak>
            <ul class="step-list">
                <li>
                    <span class="step-content">
                        <strong>Kartu Statistik</strong> — di bagian atas menampilkan jumlah total permohonan, permohonan baru (diproses), yang disetujui, dan yang ditolak secara real-time.
                    </span>
                </li>
                <li>
                    <span class="step-content">
                        <strong>Grafik Kategori Pemohon</strong> — menunjukkan perbandingan jumlah pemohon berdasarkan kategori (Mahasiswa atau Pelajar). Arahkan kursor ke bar chart untuk melihat jumlah pastinya.
                    </span>
                </li>
                <li>
                    <span class="step-content">
                        <strong>Grafik Status Permohonan</strong> — menampilkan distribusi permohonan berdasarkan status (Diproses, Disetujui, Ditolak, Selesai) untuk OPD Dinas Komunikasi dan Informatika (DISKOMINFO) Kabupaten Sragen.
                    </span>
                </li>
                <li>
                    <span class="step-content">
                        <strong>Tabel Permohonan Terbaru</strong> — menampilkan 5 permohonan terakhir yang masuk. Klik baris untuk melihat detail permohonan.
                    </span>
                </li>
            </ul>
            <div class="tip-box">
                Dashboard diperbarui secara otomatis setiap kali ada permohonan baru masuk atau status berubah.
            </div>
        </div>
    </div>

    {{-- 2. KELOLA PERMOHONAN --}}
    <div class="accordion-item" x-data="{ open: false }">
        <div class="accordion-header" @click="open = !open">
            <div class="accordion-title">
                <h3>Kelola Permohonan</h3>
                <p>Melihat, memfilter, menyetujui/menolak permohonan magang</p>
            </div>
            <svg class="accordion-chevron" :class="{ 'open': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
        </div>
        <div class="accordion-body" x-show="open" x-collapse x-cloak>

            <p style="color:#6b7280; margin-bottom: 12px;">Alur status permohonan:</p>
            <div class="status-flow">
                <span class="sf-item diproses">Diproses</span>
                <span class="sf-arrow">→</span>
                <span class="sf-item disetujui">Disetujui</span>
                <span class="sf-arrow">→</span>
                <span class="sf-item selesai">Selesai</span>
            </div>
            <div class="status-flow" style="margin-top: 4px;">
                <span class="sf-item diproses">Diproses</span>
                <span class="sf-arrow">→</span>
                <span class="sf-item ditolak">Ditolak</span>
            </div>

            <ul class="step-list" style="margin-top: 16px;">
                <li>
                    <span class="step-content">
                        <strong>Daftar Permohonan</strong> — Klik menu <strong>"Permohonan"</strong> di sidebar. Anda akan melihat tabel seluruh permohonan beserta tombol filter status di bagian atas (Semua, Diproses, Ditolak, Disetujui, Selesai).
                    </span>
                </li>
                <li>
                    <span class="step-content">
                        <strong>Cari &amp; Filter</strong> — Gunakan kolom pencarian di atas tabel untuk mencari berdasarkan nama pemohon. Klik tombol status untuk memfilter permohonan berdasarkan statusnya.
                    </span>
                </li>
                <li>
                    <span class="step-content">
                        <strong>Lihat Detail</strong> — Klik ikon <span class="guide-badge tip">View</span> pada baris permohonan untuk membuka halaman detail. Di sini, Anda bisa melihat data lengkap pemohon, institusi, periode, bidang, dan file dokumen yang diunggah.
                    </span>
                </li>
                <li>
                    <span class="step-content">
                        <strong>Setujui Permohonan</strong> — Di halaman detail, klik tombol <span class="guide-badge tip">✅ Setujui</span> untuk menyetujui. Anda akan diminta konfirmasi sebelum status berubah.
                    </span>
                </li>
                <li>
                    <span class="step-content">
                        <strong>Tolak Permohonan</strong> — Klik tombol <span class="guide-badge" style="background:#fee2e2;color:#991b1b;">❌ Tolak</span>. Anda <em>wajib</em> mengisi alasan penolakan agar pemohon mengetahui penyebabnya.
                    </span>
                </li>
                <li>
                    <span class="step-content">
                        <strong>Upload Surat Jawaban</strong> — Setelah permohonan disetujui atau ditolak, tombol <strong>"Upload Surat Jawaban"</strong> akan muncul. Klik tombol tersebut, pilih file PDF (maksimal 4 MB), lalu simpan. <span class="guide-badge warn">PDF Only</span>
                    </span>
                </li>
                <li>
                    <span class="step-content">
                        <strong>Upload Surat Selesai</strong> — Untuk permohonan yang disetujui, Anda dapat mengunggah surat keterangan selesai magang melalui tombol <strong>"Upload Surat Selesai"</strong>.
                    </span>
                </li>
                <li>
                    <span class="step-content">
                        <strong>Tandai Selesai</strong> — Setelah surat selesai diunggah, tombol <strong>"Tandai Selesai"</strong> akan muncul. Klik untuk mengubah status permohonan menjadi Selesai.
                    </span>
                </li>
            </ul>

            <div class="tip-box">
                Selalu isi alasan penolakan dengan jelas agar pemohon dapat memperbaiki usulannya. File yang diupload otomatis dinamai sesuai format standar.
            </div>
        </div>
    </div>


    {{-- 4. LAPORAN MAGANG --}}
    <div class="accordion-item" x-data="{ open: false }">
        <div class="accordion-header" @click="open = !open">
            <div class="accordion-title">
                <h3>Laporan Magang</h3>
                <p>Filter, lihat rekapitulasi, dan unduh data magang dalam format CSV</p>
            </div>
            <svg class="accordion-chevron" :class="{ 'open': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
        </div>
        <div class="accordion-body" x-show="open" x-collapse x-cloak>
            <ul class="step-list">
                <li>
                    <span class="step-content">
                        <strong>Buka Laporan</strong> — Klik menu <strong>"Laporan Magang"</strong> di sidebar. Anda akan melihat tabel semua data magang beserta filter di bagian atas.
                    </span>
                </li>
                <li>
                    <span class="step-content">
                        <strong>Filter Periode</strong> — Gunakan filter <strong>"Dari"</strong> dan <strong>"Sampai"</strong> untuk menampilkan data magang pada rentang tanggal tertentu. Secara default, laporan menampilkan bulan berjalan.
                    </span>
                </li>
                <li>
                    <span class="step-content">
                        <strong>Filter Durasi</strong> — Pilih durasi magang (dalam bulan) untuk menyaring berdasarkan lama periode magang, misalnya 1 bulan, 2 bulan, dst.
                    </span>
                </li>
                <li>
                    <span class="step-content">
                        <strong>Filter Kategori</strong> — Pilih <strong>"Mahasiswa"</strong> atau <strong>"Pelajar"</strong> untuk menyaring berdasarkan jenis pemohon, atau <strong>"Semua"</strong> untuk menampilkan keduanya.
                    </span>
                </li>
                <li>
                    <span class="step-content">
                        <strong>Download CSV</strong> — Klik tombol <span class="guide-badge info">⬇ Download CSV</span> di atas tabel untuk mengunduh data yang sudah difilter ke format CSV. File ini bisa dibuka di Microsoft Excel atau Google Sheets.
                    </span>
                </li>
            </ul>
            <div class="tip-box">
                Gunakan kombinasi filter untuk mendapatkan data yang lebih spesifik. File CSV menggunakan delimiter titik koma (;) agar kompatibel dengan Excel di Indonesia.
            </div>
        </div>
    </div>

    {{-- 5. FAQ --}}
    <div class="accordion-item" x-data="{ open: false }">
        <div class="accordion-header" @click="open = !open">
            <div class="accordion-title">
                <h3>Pertanyaan Umum (FAQ)</h3>
                <p>Jawaban untuk pertanyaan yang sering diajukan</p>
            </div>
            <svg class="accordion-chevron" :class="{ 'open': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
        </div>
        <div class="accordion-body" x-show="open" x-collapse x-cloak>
            <div class="faq-item">
                <div class="faq-q">Bagaimana cara login ke panel admin?</div>
                <div class="faq-a">Buka halaman <strong>/admin/login</strong>, lalu masukkan email dan password admin Anda. Jika lupa password, hubungi administrator sistem.</div>
            </div>
            <div class="faq-item">
                <div class="faq-q">Apa perbedaan status "Disetujui" dan "Selesai"?</div>
                <div class="faq-a">
                    <strong>Disetujui</strong> berarti permohonan magang telah diterima dan pemohon boleh mulai magang.
                    <strong>Selesai</strong> berarti masa magang sudah berakhir dan surat keterangan selesai sudah diunggah. Untuk mengubah status menjadi Selesai, Anda harus mengupload surat selesai terlebih dahulu.
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-q">Bisakah pemohon mengajukan ulang setelah ditolak?</div>
                <div class="faq-a">Ya, pemohon dapat mengajukan permohonan baru setelah status permohonan sebelumnya "Ditolak" atau "Selesai".</div>
            </div>
            <div class="faq-item">
                <div class="faq-q">Format file apa yang diterima untuk upload surat?</div>
                <div class="faq-a">Hanya file <strong>PDF</strong> yang diterima, dengan ukuran maksimal <strong>4 MB</strong>. Nama file akan diubah secara otomatis sesuai standar sistem.</div>
            </div>
            <div class="faq-item">
                <div class="faq-q">Bagaimana cara melihat dokumen yang diupload pemohon?</div>
                <div class="faq-a">Buka halaman detail permohonan, lalu scroll ke bagian <strong>Dokumen Pemohon</strong>. Anda dapat mengklik nama file untuk mengunduh atau melihat dokumen.</div>
            </div>
            <div class="faq-item">
                <div class="faq-q">Apakah data bisa di-export untuk laporan?</div>
                <div class="faq-a">Ya, gunakan halaman <strong>"Laporan Magang"</strong> untuk memfilter data sesuai kebutuhan, lalu klik tombol <strong>"Download CSV"</strong> untuk mengunduh data dalam format yang bisa dibuka di Excel.</div>
            </div>
        </div>
    </div>

</div>

</x-filament-panels::page>
