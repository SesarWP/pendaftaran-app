<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>POMAS</title>
  <link rel="icon" href="{{ asset('images/favicon.png') }}?v=5">
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}?v=5">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pemohon.css') }}">
</head>

<body style="margin:0; padding:0;">
  <div class="auth-wrapper">
    <!-- Kiri - Form Login -->
    <div class="auth-left">
      <div class="auth-left-inner">
        <div class="auth-logo">
          <img src="{{ asset('images/favicon.png') }}" alt="Logo POMAS">
        </div>

        <h1 class="auth-heading">Selamat datang di POMAS</h1>
        <p class="auth-sub">Pemerintah Kabupaten Sragen</p>

        @if ($errors->any())
          <div class="alert" style="background:#fef2f2; border:1px solid #fca5a5; border-radius:8px; padding:12px; margin-bottom:20px; font-size:13px; color:#dc2626;">
            <ul style="margin:0; padding-left:18px;">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="{{ route('pemohon.login.store') }}">
          @csrf

          <div class="auth-field">
            <label class="auth-label" for="email">Email</label>
            <input
              class="auth-input"
              type="email"
              id="email"
              name="email"
              value="{{ old('email') }}"
              placeholder="Masukkan email anda"
              autocomplete="email"
              required
            >
          </div>

          <div class="auth-field">
            <label class="auth-label" for="password">Password</label>
            <div class="auth-password-wrapper">
              <input
                class="auth-input"
                type="password"
                id="password"
                name="password"
                placeholder="Masukkan password anda"
                autocomplete="current-password"
                required
              >
              <button type="button" class="auth-password-toggle" onclick="togglePassword()" aria-label="Tampilkan password">
                <svg id="icon-eye" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                  <circle cx="12" cy="12" r="3"/>
                </svg>
                <svg id="icon-eye-off" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none;">
                  <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/>
                  <line x1="1" y1="1" x2="23" y2="23"/>
                </svg>
              </button>
            </div>
          </div>

          <div class="auth-options">
            <label class="auth-remember">
              <input type="checkbox" name="remember" id="remember">
              <span>Ingat saya</span>
            </label>
            <a href="{{ route('pemohon.password.request') }}" class="auth-forgot">Lupa password?</a>
          </div>

          <button type="submit" class="auth-btn">Login</button>
        </form>

        <div class="auth-links">
          Belum punya akun?
          <a href="{{ route('pemohon.register') }}">Daftar di sini</a>
        </div>
      </div>
    </div>

    <!-- Kanan - Branding -->
    <div class="auth-right">
      <!-- Logo Sragen kiri atas -->
      <div class="auth-right-logo-top">
        <img src="{{ asset('images/logo_gold.png') }}" alt="Logo Sragen">
      </div>

      <!-- Logo POMAS tengah -->
      <div class="auth-brand-center">
        <img src="{{ asset('images/pomas.png') }}" alt="Logo POMAS" class="logo-pomas">
        <p class="auth-brand-text">
          POMAS merupakan platform digital resmi yang berfungsi sebagai sistem informasi terintegrasi untuk memfasilitasi dan mengelola seluruh rangkaian program magang di lingkungan Pemerintah Kabupaten Sragen.
        </p>
      </div>


      <div class="auth-brand-footer">
        Sragen, {{ date('d F Y') }}
      </div>
    </div>
  </div>

  <script>
    function togglePassword() {
      const input = document.getElementById('password');
      const eyeOn = document.getElementById('icon-eye');
      const eyeOff = document.getElementById('icon-eye-off');

      if (input.type === 'password') {
        input.type = 'text';
        eyeOn.style.display = 'none';
        eyeOff.style.display = 'block';
      } else {
        input.type = 'password';
        eyeOn.style.display = 'block';
        eyeOff.style.display = 'none';
      }
    }
  </script>
</body>
</html>
