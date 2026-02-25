<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>POMAS</title>
  <link rel="icon" href="{{ asset('images/favicon.png') }}?v=5">
<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}?v=5">
  <meta name="description" content="Platform resmi untuk mendaftarkan diri mengikuti program magang di berbagai instansi pemerintahan Kabupaten Sragen.">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/pemohon.css') }}">
</head>
<body class="landing-body">

<header class="nav">
    <div class="nav-inner">
        <a href="{{ url('/pemohon') }}" class="brand">
            <img
                src="{{ asset('images/hero-dashboard.png') }}"
                alt="Portal Magang Sragen"
            >
            <span class="brand-text">POMAS</span>
        </a>

        <nav class="nav-links" id="navLinks">
            <a href="#alur" class="nav-link">Alur</a>
            <a href="#persyaratan" class="nav-link">Persyaratan</a>
            <a href="#faq" class="nav-link">FAQ</a>
        </nav>

        <div class="nav-right">
            <a href="{{ route('pemohon.login') }}" class="btn-outline">
                Masuk
            </a>
            <a href="{{ route('pemohon.register') }}" class="btn-primary">
                Daftar
            </a>
        </div>

        <button class="nav-hamburger" id="navHamburger" onclick="toggleMobileMenu()" aria-label="Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    <div class="nav-mobile" id="navMobile">
        <a href="#alur" class="nav-mobile-link" onclick="closeMobileMenu()">Alur Pendaftaran</a>
        <a href="#persyaratan" class="nav-mobile-link" onclick="closeMobileMenu()">Persyaratan</a>
        <a href="#faq" class="nav-mobile-link" onclick="closeMobileMenu()">FAQ</a>
        <div class="nav-mobile-actions">
            <a href="{{ route('pemohon.login') }}" class="btn-outline">Masuk</a>
            <a href="{{ route('pemohon.register') }}" class="btn-primary">Daftar</a>
        </div>
    </div>
</header>

  <!-- HERO SECTION -->
  <section class="hero">
    <div class="hero-inner">
    <img
        src="{{ asset('images/pomas.png') }}"
        alt="Portal Magang Sragen"
        class="landing-logo"
    >
      <p class="hero-desc">
        POMAS merupakan platform digital resmi yang berfungsi sebagai sistem informasi terintegrasi untuk memfasilitasi dan mengelola seluruh rangkaian program magang di lingkungan Pemerintah Kabupaten Sragen.
      </p>
      <div class="hero-actions">
        <a class="btn-primary" href="{{ route('pemohon.register') }}">Daftar Sekarang</a>
        <a class="btn-outline" href="{{ route('pemohon.login') }}">Masuk</a>
      </div>
    </div>
  </section>

  <!-- ALUR PENDAFTARAN -->
<section class="section" id="alur">
  <h2 class="section-title">Alur Pendaftaran</h2>
  <p class="section-desc">Ikuti langkah berikut agar pengajuan magang Anda diproses.</p>

  <div class="flow-wrap">

    <!-- Desktop: Timeline SVG horizontal -->
    <svg class="flow-svg flow-svg-desktop" viewBox="0 0 1000 220" role="img" aria-label="Alur pendaftaran magang">
      <line x1="90" y1="110" x2="910" y2="110" stroke="#cbd5e1" stroke-width="6" stroke-linecap="round"/>

      <circle cx="90" cy="110" r="28" fill="#FF6600"/>
      <text x="90" y="118" text-anchor="middle" font-size="18" font-family="Poppins" fill="#FFFFFF" font-weight="700">1</text>

      <circle cx="295" cy="110" r="28" fill="#FF6600"/>
      <text x="295" y="118" text-anchor="middle" font-size="18" font-family="Poppins" fill="#FFFFFF" font-weight="700">2</text>

      <circle cx="500" cy="110" r="28" fill="#FF6600"/>
      <text x="500" y="118" text-anchor="middle" font-size="18" font-family="Poppins" fill="#FFFFFF" font-weight="700">3</text>

      <circle cx="705" cy="110" r="28" fill="#FF6600"/>
      <text x="705" y="118" text-anchor="middle" font-size="18" font-family="Poppins" fill="#FFFFFF" font-weight="700">4</text>

      <circle cx="910" cy="110" r="28" fill="#FF6600"/>
      <text x="910" y="118" text-anchor="middle" font-size="18" font-family="Poppins" fill="#FFFFFF" font-weight="700">5</text>
    </svg>

    <!-- Desktop: Cards -->
    <div class="flow-grid-desktop">
      <div class="flow-item">
        <div class="flow-title">Daftar Akun</div>
        <div class="flow-text">Pilih tipe Pelajar/Mahasiswa lalu buat akun dengan email aktif. Pastikan password minimal 8 karakter.</div>
      </div>
      <div class="flow-item">
        <div class="flow-title">Lengkapi Profil</div>
        <div class="flow-text">Isi data instansi, jurusan/prodi, nomor induk (NISN/NIM), dan kontak yang dapat dihubungi.</div>
      </div>
      <div class="flow-item">
        <div class="flow-title">Ajukan Magang</div>
        <div class="flow-text">Pilih OPD tujuan dan tentukan periode magang sesuai jadwal akademik Anda.</div>
      </div>
      <div class="flow-item">
        <div class="flow-title">Upload Berkas</div>
        <div class="flow-text">Unggah surat pengantar, transkrip/rapor (wajib), serta CV dan proposal (opsional). Maks 4MB per file.</div>
      </div>
      <div class="flow-item">
        <div class="flow-title">Pantau Status</div>
        <div class="flow-text">Pantau status pengajuan Anda: Diproses, Disetujui, Ditolak, atau Selesai.</div>
      </div>
    </div>

    <!-- Mobile: Node sejajar dengan card -->
    <div class="flow-mobile">
      <div class="flow-row">
        <div class="flow-node">
          <div class="dot">1</div>
          <div class="vline"></div>
        </div>
        <div class="flow-item">
          <div class="flow-title">Daftar Akun</div>
          <div class="flow-text">Pilih tipe Pelajar/Mahasiswa lalu buat akun dengan email aktif. Pastikan password minimal 8 karakter.</div>
        </div>
      </div>

      <div class="flow-row">
        <div class="flow-node">
          <div class="dot">2</div>
          <div class="vline"></div>
        </div>
        <div class="flow-item">
          <div class="flow-title">Lengkapi Profil</div>
          <div class="flow-text">Isi data instansi, jurusan/prodi, nomor induk (NISN/NIM), dan kontak yang dapat dihubungi.</div>
        </div>
      </div>

      <div class="flow-row">
        <div class="flow-node">
          <div class="dot">3</div>
          <div class="vline"></div>
        </div>
        <div class="flow-item">
          <div class="flow-title">Ajukan Magang</div>
          <div class="flow-text">Pilih OPD tujuan dan tentukan periode magang sesuai jadwal akademik Anda.</div>
        </div>
      </div>

      <div class="flow-row">
        <div class="flow-node">
          <div class="dot">4</div>
          <div class="vline"></div>
        </div>
        <div class="flow-item">
          <div class="flow-title">Upload Berkas</div>
          <div class="flow-text">Unggah surat pengantar, transkrip/rapor (wajib), serta CV dan proposal (opsional). Maks 4MB per file.</div>
        </div>
      </div>

      <div class="flow-row">
        <div class="flow-node">
          <div class="dot">5</div>
        </div>
        <div class="flow-item">
          <div class="flow-title">Pantau Status</div>
          <div class="flow-text">Pantau status pengajuan Anda: Diproses, Disetujui, Ditolak, atau Selesai.</div>
        </div>
      </div>
    </div>
  </div>
</section>

  <!-- PERSYARATAN PENDAFTARAN -->
  <section class="section section-light" id="persyaratan">
    <h2 class="section-title">Persyaratan Pendaftaran</h2>

    <div class="req-grid">
      <div class="req-card">
        <h3>Untuk Pelajar</h3>
        <ul>
          <li>NISN yang terdaftar dan valid</li>
          <li>Surat pengantar dari sekolah (PDF, maks 4MB)</li>
          <li>Transkrip nilai/rapor (PDF/JPG/PNG, maks 4MB)</li>
          <li>CV yang terstruktur (PDF, opsional)</li>
          <li>Proposal kegiatan (PDF, opsional)</li>
        </ul>
      </div>

      <div class="req-card">
        <h3>Untuk Mahasiswa</h3>
        <ul>
          <li>NIM yang terdaftar dan valid</li>
          <li>Surat pengantar dari kampus (PDF, maks 4MB)</li>
          <li>Transkrip nilai (PDF/JPG/PNG, maks 4MB)</li>
          <li>CV yang profesional (PDF, opsional)</li>
          <li>Proposal kegiatan (PDF, opsional)</li>
        </ul>
      </div>
    </div>

    <div class="tips-section" style="margin-top: 24px;">
      <div class="tips-title">Tips Persiapan Dokumen</div>
      <ul class="tips-list">
        <li>Pastikan semua dokumen dalam format yang diminta (PDF untuk surat, PDF/JPG/PNG untuk transkrip)</li>
        <li>Ukuran file tidak melebihi 4MB per dokumen</li>
        <li>Scan dokumen dengan resolusi yang jelas dan mudah dibaca</li>
        <li>Surat pengantar harus ditandatangani dan dicap oleh pihak sekolah/kampus</li>
        <li>Periksa kembali semua data sebelum mengunggah</li>
      </ul>
    </div>
  </section>

  <!-- FAQ SECTION -->
  <section class="section" id="faq">
    <h2 class="section-title">Pertanyaan yang Sering Diajukan (FAQ)</h2>
    <p class="section-desc">Temukan jawaban untuk pertanyaan umum seputar pendaftaran magang</p>

    <div class="faq-section">
      @forelse($faqs as $faq)
      <div class="faq-item">
        <button class="faq-question" onclick="toggleFAQ(this)">
          {{ $faq->question }}
        </button>
        <div class="faq-answer">
          {!! $faq->answer !!}
        </div>
      </div>
      @empty
      <p style="text-align:center;color:#64748b;">Belum ada FAQ yang tersedia.</p>
      @endforelse
    </div>
  </section>

  <!-- CTA SECTION -->
  <section class="cta">
    <div class="cta-inner">
      <h2>Siap Memulai Magang?</h2>
      <p>Daftarkan diri Anda sekarang dan mulai perjalanan karir Anda bersama kami.</p>
      <a class="btn-primary" href="{{ route('pemohon.register') }}">Daftar Sekarang</a>
    </div>
  </section>

  <script>
    function toggleFAQ(button) {
      button.classList.toggle('active');
      const answer = button.nextElementSibling;
      answer.classList.toggle('active');
    }
  </script>

  <footer class="footer2">
    <div class="footer2-inner">

        <!-- Branding -->
        <div class="footer2-col">
            <h3 class="footer2-title">POMAS</h3>
            <p class="footer2-desc">
                Platform resmi pendaftaran magang Pemerintah Kabupaten Sragen.
                Memudahkan mahasiswa dan pelajar untuk mengajukan permohonan magang secara online.
            </p>
        </div>

        <!-- Quick Links -->
        <div class="footer2-col">
            <h4 class="footer2-heading">Menu</h4>
            <ul class="footer2-links">
                <li><a href="{{ route('pemohon.home') }}">Beranda</a></li>
                <li><a href="{{ route('pemohon.login') }}">Masuk</a></li>
                <li><a href="{{ route('pemohon.register') }}">Daftar</a></li>
            </ul>
        </div>

        <!-- Contact -->
        <div class="footer2-col">
            <h4 class="footer2-heading">Kontak</h4>
            <ul class="footer2-contact">
                <li>📍Jl. Dr. Sutomo Nomor 10 Sragen
Sragen 57213, Jateng, Indonesia</li>
                <li>📧 magang@sragen.go.id</li>
                <li>☎ +62271891297</li>
            </ul>
        </div>
    </div>

    <!-- Map Lokasi -->
    <div class="footer2-map">
        <h4 class="footer2-heading">📍 Lokasi Kami</h4>
        <div class="footer2-map-frame">
            <iframe
                src="https://maps.google.com/maps?q=-7.4242988,111.0043057&z=17&output=embed"
                width="100%"
                height="250"
                style="border:0; border-radius: 12px;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                title="Lokasi Kantor Pemerintah Kabupaten Sragen"
            ></iframe>
        </div>
    </div>

    <div class="footer2-bottom">
        <p>
            © {{ date('Y') }} Portal Magang Kabupaten Sragen. All rights reserved.
        </p>
    </div>
</footer>

  <script>
    // FAQ accordion toggle
    function toggleFAQ(button) {
      button.classList.toggle('active');
      const answer = button.nextElementSibling;
      answer.classList.toggle('active');
    }

    // Mobile menu toggle
    function toggleMobileMenu() {
      const menu = document.getElementById('navMobile');
      const hamburger = document.getElementById('navHamburger');
      menu.classList.toggle('open');
      hamburger.classList.toggle('open');
    }

    function closeMobileMenu() {
      document.getElementById('navMobile').classList.remove('open');
      document.getElementById('navHamburger').classList.remove('open');
    }

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      });
    });
  </script>

</body>
</html>
