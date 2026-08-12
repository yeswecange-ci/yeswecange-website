<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="google-site-verification" content="H0o1TMh8dbL4Vc0507W_b9wBzT8RIB9dFyHYNkh4jVA" />

        <title>{{ config('app.name') }} — Back-office</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div x-data="{ sidebarOpen: false }" class="min-h-screen bg-ywc-bg text-ywc-text">
            {{-- Overlay mobile --}}
            <div
                x-show="sidebarOpen"
                x-transition.opacity
                @click="sidebarOpen = false"
                class="fixed inset-0 z-30 bg-ywc-ink/40 backdrop-blur-sm lg:hidden"
                style="display: none;"
            ></div>

            {{-- Sidebar --}}
            @include('layouts.navigation')

            {{-- Colonne principale --}}
            <div class="lg:pl-64">
                {{-- Navbar --}}
                <header class="sticky top-0 z-20 flex h-16 items-center gap-3 border-b border-ywc-border bg-white/80 px-4 backdrop-blur-md sm:px-6 lg:px-8">
                    <button
                        @click="sidebarOpen = true"
                        class="grid h-10 w-10 place-items-center rounded-xl text-ywc-text-soft transition hover:bg-ywc-bg-soft hover:text-ywc-ink lg:hidden"
                        aria-label="Ouvrir le menu"
                    >
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" /></svg>
                    </button>

                    <div class="min-w-0 flex-1">
                        @isset($header)
                            {{ $header }}
                        @else
                            <h1 class="font-display text-lg font-bold tracking-[-0.01em] text-ywc-ink">{{ config('app.name') }} Admin</h1>
                        @endisset
                    </div>

                    <a href="{{ route('home') }}" target="_blank" rel="noopener"
                       class="hidden items-center gap-1.5 rounded-xl border border-ywc-border px-3.5 py-2 text-sm font-semibold text-ywc-text-soft no-underline transition hover:border-ywc-border-blue hover:text-ywc-blue sm:inline-flex">
                        Voir le site
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" /></svg>
                    </a>

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center gap-2.5 rounded-xl py-1.5 pl-1.5 pr-3 transition hover:bg-ywc-bg-soft">
                                <span class="grid h-9 w-9 place-items-center rounded-full bg-gradient-to-br from-ywc-blue to-ywc-blue-mid text-sm font-bold text-white">
                                    {{ Str::upper(Str::substr(Auth::user()->name, 0, 1)) }}
                                </span>
                                <span class="hidden text-sm font-semibold text-ywc-ink sm:block">{{ Auth::user()->name }}</span>
                                <svg class="hidden h-4 w-4 text-ywc-text-muted sm:block" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">{{ __('Mon compte') }}</x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Se déconnecter') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </header>

                {{-- Contenu --}}
                <main class="mx-auto max-w-7xl p-4 sm:p-6 lg:p-8">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
