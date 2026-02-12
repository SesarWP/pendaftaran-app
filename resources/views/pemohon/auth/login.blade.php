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
  <style>
    /* Layout Split-Screen Full */
    .auth-wrapper {
      display: flex;
      min-height: 100vh;
      width: 100%;
    }

    /* Kiri - Form */
    .auth-left {
      flex: 0 0 40%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 60px 50px;
      background: #FFFFFF;
    }

    .auth-left-inner {
      width: 100%;
      max-width: 380px;
    }

    .auth-logo {
      text-align: center;
      margin-bottom: 28px;
    }

    .auth-logo img {
      height: 100px;
      width: auto;
    }

    .auth-heading {
      font-size: 26px;
      font-weight: 700;
      color: #162D50;
      text-align: center;
      margin-bottom: 6px;
      white-space: nowrap;
    }

    .auth-sub {
      font-size: 13px;
      font-weight: 500;
      color: #FF6600;
      text-align: center;
      margin-bottom: 32px;
    }

    .auth-label {
      display: block;
      font-size: 12px;
      font-weight: 700;
      color: #162D50;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 6px;
    }

    .auth-input {
      width: 100%;
      padding: 12px 14px;
      border: 1px solid #e2e8f0;
      border-radius: 8px;
      font-family: 'Poppins', sans-serif;
      font-size: 14px;
      color: #334155;
      background: #FFFFFF;
      transition: border-color 0.2s ease;
      box-sizing: border-box;
    }

    .auth-input:focus {
      outline: none;
      border-color: #FF6600;
      box-shadow: 0 0 0 3px rgba(255, 102, 0, 0.1);
    }

    .auth-input::placeholder {
      color: #94a3b8;
    }

    .auth-field {
      margin-bottom: 20px;
    }

    .auth-btn {
      width: 100%;
      padding: 13px;
      background: #FF6600;
      color: #FFFFFF;
      border: none;
      border-radius: 10px;
      font-family: 'Poppins', sans-serif;
      font-size: 15px;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.2s ease;
      margin-top: 8px;
    }

    .auth-btn:hover {
      background: #e55a00;
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(255, 102, 0, 0.3);
    }

    .auth-links {
      margin-top: 24px;
      text-align: center;
      font-size: 13px;
      color: #64748b;
    }

    .auth-links a {
      color: #FF6600;
      text-decoration: none;
      font-weight: 600;
    }

    .auth-links a:hover {
      text-decoration: underline;
      color: #162D50;
    }

    /* Kanan - Branding */
    .auth-right {
      flex: 0 0 60%;
      background:
        linear-gradient(180deg, rgba(22, 45, 80, 0.75) 0%, rgba(22, 45, 80, 0.85) 100%),
        url('{{ asset("images/pemda-building.jpg") }}') center center / cover no-repeat;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 40px;
      position: relative;
    }

    .auth-right-logo-top {
      position: absolute;
      top: 24px;
      left: 28px;
    }

    .auth-right-logo-top img {
      height: 100px;
      width: auto;
      filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.3));
    }

    .auth-brand-center {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
    }

    .auth-brand-center .logo-pomas {
      height: 180px;
      width: auto;
      filter: drop-shadow(0 4px 16px rgba(0, 0, 0, 0.3));
      margin-bottom: 24px;
    }

    .auth-brand-text {
      max-width: 680px;
      font-size: 14px;
      color: rgba(255, 255, 255, 0.85);
      line-height: 1.7;
      text-align: center;
    }

    .auth-brand-title {
      font-size: 48px;
      font-weight: 700;
      color: #FFFFFF;
      text-align: center;
      margin-bottom: 10px;
      text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
      letter-spacing: 3px;
    }

    .auth-brand-desc {
      font-size: 16px;
      color: #e0f2fe;
      text-align: center;
      font-weight: 500;
      line-height: 1.6;
    }

    .auth-brand-footer {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      text-align: center;
      color: #cbd5e1;
      font-size: 13px;
      padding: 14px 20px;
      background: rgba(0, 0, 0, 0.25);
      backdrop-filter: blur(4px);
    }

    /* Responsive */
    @media (max-width: 900px) {
      .auth-wrapper {
        flex-direction: column;
      }
      .auth-left {
        flex: 1;
        min-height: 100vh;
        padding: 40px 24px;
      }
      .auth-right {
        display: none;
      }
    }
  </style>
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
            <label class="auth-label" for="email">Username</label>
            <input
              class="auth-input"
              type="email"
              id="email"
              name="email"
              value="{{ old('email') }}"
              placeholder="Masukkan email anda"
              required
            >
          </div>

          <div class="auth-field">
            <label class="auth-label" for="password">Password</label>
            <input
              class="auth-input"
              type="password"
              id="password"
              name="password"
              placeholder="Masukkan password anda"
              required
            >
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
</body>
</html>
