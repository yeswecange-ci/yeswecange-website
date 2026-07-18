<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }} — Back-office</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-ywc-ink antialiased">
        <div class="min-h-screen flex flex-col items-center justify-center bg-ywc-bg px-5 py-10">
            <a href="/" class="mb-8 flex flex-col items-center gap-3 no-underline">
                <img src="{{ asset('images/logo_ywc.png') }}" alt="YesWeCange" width="225" height="225" class="h-16 w-auto">
                <span class="font-display text-sm font-bold uppercase tracking-[0.12em] text-ywc-text-muted">Back-office</span>
            </a>

            <div class="w-full sm:max-w-md overflow-hidden rounded-[20px] border border-ywc-border bg-white px-6 py-8 shadow-[0_30px_60px_-30px_rgba(10,10,15,0.28)] sm:px-8">
                {{ $slot }}
            </div>

            <a href="/" class="mt-6 text-sm text-ywc-text-soft no-underline hover:text-ywc-blue">← Retour au site</a>
        </div>
    </body>
</html>
