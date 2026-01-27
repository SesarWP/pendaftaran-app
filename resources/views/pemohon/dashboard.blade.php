<!doctype html>
<html lang="id">
<head>
<link rel="stylesheet" href="/pemohon.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Pemohon</title>
</head>
<body style="font-family:Poppins, Arial, sans-serif;">
  <div style="padding:20px;">
    <h2>Dashboard Pemohon</h2>
    <p>Halo, <b>{{ auth()->user()->name }}</b></p>

    <form method="POST" action="{{ route('pemohon.logout') }}">
      @csrf
      <button type="submit">Logout</button>
    </form>
  </div>
</body>
</html>
