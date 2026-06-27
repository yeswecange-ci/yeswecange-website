<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex">
<title>@yield('code') — YesWeCange</title>
<link rel="icon" type="image/png" href="{{ asset('images/logo_ywc.png') }}">
<style>
  *{box-sizing:border-box;margin:0;padding:0}
  body{font-family:'Manrope',system-ui,-apple-system,sans-serif;background:#eef1f6;color:#0a0a0f;min-height:100vh;display:flex;align-items:center;justify-content:center;padding:24px;-webkit-font-smoothing:antialiased}
  .card{max-width:520px;width:100%;text-align:center}
  .logo{height:64px;width:auto;margin:0 auto 32px}
  .code{font-size:clamp(72px,16vw,128px);font-weight:800;line-height:1;letter-spacing:-0.04em;background:linear-gradient(135deg,#2b4dff,#7e8fff);-webkit-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent}
  h1{font-size:clamp(22px,4vw,30px);font-weight:700;letter-spacing:-0.02em;margin:12px 0 10px}
  p{font-size:16px;line-height:1.6;color:#5a6373;margin-bottom:28px}
  .btn{display:inline-flex;align-items:center;gap:8px;background:#2b4dff;color:#fff;text-decoration:none;font-weight:700;font-size:15px;padding:14px 26px;border-radius:12px;transition:background .2s}
  .btn:hover{background:#5b73ff}
</style>
</head>
<body>
  <div class="card">
    <img src="{{ asset('images/logo_ywc.png') }}" alt="YesWeCange" class="logo">
    <div class="code">@yield('code')</div>
    <h1>@yield('title')</h1>
    <p>@yield('message')</p>
    <a href="{{ url('/') }}" class="btn">@yield('cta', app()->getLocale() === 'en' ? 'Back to home' : "Retour à l'accueil") →</a>
  </div>
</body>
</html>
