@php
    // Éléments de navigation du back-office. Les icônes sont des SVG inline (statiques).
    $navItems = [
        [
            'route' => 'admin.dashboard',
            'pattern' => 'admin.dashboard',
            'label' => 'Dashboard',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />',
        ],
        [
            'route' => 'admin.leads.index',
            'pattern' => 'admin.leads.*',
            'label' => 'Leads',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />',
            'badge' => \App\Models\Lead::unread()->count(),
        ],
        [
            'route' => 'admin.services.index',
            'pattern' => 'admin.services.*',
            'label' => 'Services',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />',
        ],
        [
            'route' => 'admin.certifications.index',
            'pattern' => 'admin.certifications.*',
            'label' => 'Certifications',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />',
        ],
        [
            'route' => 'admin.values.index',
            'pattern' => 'admin.values.*',
            'label' => 'Valeurs',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />',
        ],
        [
            'route' => 'admin.legal.index',
            'pattern' => 'admin.legal.*',
            'label' => 'Pages légales',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />',
        ],
    ];

    // Contenu éditable de la page d'accueil (phase 1 du chantier "tous les textes modifiables").
    $homeNavItems = [
        [
            'route' => 'admin.site-texts.edit',
            'params' => ['home'],
            'pattern' => 'admin.site-texts.*',
            'label' => 'Textes',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m3-6h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5" />',
        ],
        [
            'route' => 'admin.testimonials.index',
            'pattern' => 'admin.testimonials.*',
            'label' => 'Témoignages',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />',
        ],
        [
            'route' => 'admin.office-locations.index',
            'pattern' => 'admin.office-locations.*',
            'label' => 'Agences',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21" />',
        ],
        [
            'route' => 'admin.stats.index',
            'pattern' => 'admin.stats.*',
            'label' => 'Chiffres clés',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />',
        ],
        [
            'route' => 'admin.trust-chips.index',
            'pattern' => 'admin.trust-chips.*',
            'label' => 'Expertises',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122a3 3 0 00-5.78 1.128 2.25 2.25 0 01-2.4 2.245 4.5 4.5 0 008.4-2.245c0-.399-.078-.78-.22-1.128zm0 0a15.998 15.998 0 003.388-1.62m-5.043-.025a15.994 15.994 0 011.622-3.395m3.42 3.42a15.995 15.995 0 004.764-4.648l3.876-5.814a1.151 1.151 0 00-1.597-1.597L14.146 6.32a15.996 15.996 0 00-4.649 4.763m3.42 3.42a6.776 6.776 0 00-3.42-3.42" />',
        ],
        [
            'route' => 'admin.chatbot-channels.index',
            'pattern' => 'admin.chatbot-channels.*',
            'label' => 'Canaux chatbot',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25-1.31 0-2.55-.257-3.673-.72L3 21l1.653-4.955A8.966 8.966 0 013 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />',
        ],
    ];

    // Contenu éditable des autres pages publiques (phase 2 du chantier "tous les textes modifiables").
    $otherPagesNavItems = [
        [
            'route' => 'admin.site-texts.edit',
            'params' => ['services'],
            'pattern' => 'admin.site-texts.edit',
            'label' => 'Textes — Services',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m3-6h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5" />',
        ],
        [
            'route' => 'admin.site-texts.edit',
            'params' => ['certifications'],
            'pattern' => 'admin.site-texts.edit',
            'label' => 'Textes — Certifications',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m3-6h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5" />',
        ],
        [
            'route' => 'admin.site-texts.edit',
            'params' => ['about'],
            'pattern' => 'admin.site-texts.edit',
            'label' => 'Textes — À propos',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m3-6h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5" />',
        ],
        [
            'route' => 'admin.site-texts.edit',
            'params' => ['faq'],
            'pattern' => 'admin.site-texts.edit',
            'label' => 'Textes — FAQ',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m3-6h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5" />',
        ],
        [
            'route' => 'admin.faq-items.index',
            'pattern' => 'admin.faq-items.*',
            'label' => 'FAQ — Questions',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />',
        ],
        [
            'route' => 'admin.site-texts.edit',
            'params' => ['quote'],
            'pattern' => 'admin.site-texts.edit',
            'label' => 'Textes — Devis',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m3-6h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5" />',
        ],
        [
            'route' => 'admin.site-texts.edit',
            'params' => ['contact'],
            'pattern' => 'admin.site-texts.edit',
            'label' => 'Textes — Contact',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m3-6h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5" />',
        ],
        [
            'route' => 'admin.site-texts.edit',
            'params' => ['realisations'],
            'pattern' => 'admin.site-texts.edit',
            'label' => 'Textes — Réalisations',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m3-6h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5" />',
        ],
        [
            'route' => 'admin.portfolio-items.index',
            'pattern' => 'admin.portfolio-items.*',
            'label' => 'Réalisations — Portfolio',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3.75l9.72 9.72a2.25 2.25 0 013.182 0l4.318-4.318M19.5 3.75l-4.318 4.318M19.5 20.25v-6h-6" /><path stroke-linecap="round" stroke-linejoin="round" d="M3 6.75V19.5a2.25 2.25 0 002.25 2.25h13.5A2.25 2.25 0 0021 19.5V6.75" />',
        ],
    ];
@endphp

<aside
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 z-40 flex w-64 -translate-x-full transform flex-col border-r border-ywc-border bg-white transition-transform duration-200 ease-out lg:translate-x-0"
>
    {{-- Logo --}}
    <div class="flex h-16 flex-none items-center justify-between border-b border-ywc-border px-5">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 no-underline">
            <img src="{{ asset('images/logo_ywc.png') }}" alt="YesWeCange" class="h-8 w-auto">
            <span class="font-display text-base font-bold tracking-[-0.02em] text-ywc-ink">Admin</span>
        </a>
        <button
            @click="sidebarOpen = false"
            class="grid h-9 w-9 place-items-center rounded-lg text-ywc-text-muted transition hover:bg-ywc-bg-soft hover:text-ywc-ink lg:hidden"
            aria-label="Fermer le menu"
        >
            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 space-y-1 overflow-y-auto px-3 py-4">
        <p class="px-3 pb-2 text-[11px] font-bold uppercase tracking-[0.08em] text-ywc-text-pale">Pilotage</p>
        @foreach ($navItems as $item)
            @php
                $active = request()->routeIs($item['pattern'])
                    && (! isset($item['params']) || request()->route('group') === $item['params'][0]);
            @endphp
            <a
                href="{{ route($item['route'], $item['params'] ?? []) }}"
                @click="sidebarOpen = false"
                class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-semibold no-underline transition
                    {{ $active
                        ? 'bg-ywc-blue text-white shadow-sm'
                        : 'text-ywc-text-soft hover:bg-ywc-bg-soft hover:text-ywc-ink' }}"
                @if ($active) aria-current="page" @endif
            >
                <svg class="h-5 w-5 flex-none {{ $active ? 'text-white' : 'text-ywc-text-muted group-hover:text-ywc-blue' }}"
                     fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
                    {!! $item['icon'] !!}
                </svg>
                <span class="flex-1">{{ $item['label'] }}</span>
                @if (! empty($item['badge']))
                    <span class="min-w-[20px] rounded-full px-1.5 py-0.5 text-center text-[11px] font-bold
                        {{ $active ? 'bg-white/25 text-white' : 'bg-ywc-blue text-white' }}">
                        {{ $item['badge'] }}
                    </span>
                @endif
            </a>
        @endforeach

        <p class="px-3 pb-2 pt-4 text-[11px] font-bold uppercase tracking-[0.08em] text-ywc-text-pale">Page d'accueil</p>
        @foreach ($homeNavItems as $item)
            @php
                $active = request()->routeIs($item['pattern'])
                    && (! isset($item['params']) || request()->route('group') === $item['params'][0]);
            @endphp
            <a
                href="{{ route($item['route'], $item['params'] ?? []) }}"
                @click="sidebarOpen = false"
                class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-semibold no-underline transition
                    {{ $active
                        ? 'bg-ywc-blue text-white shadow-sm'
                        : 'text-ywc-text-soft hover:bg-ywc-bg-soft hover:text-ywc-ink' }}"
                @if ($active) aria-current="page" @endif
            >
                <svg class="h-5 w-5 flex-none {{ $active ? 'text-white' : 'text-ywc-text-muted group-hover:text-ywc-blue' }}"
                     fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
                    {!! $item['icon'] !!}
                </svg>
                <span class="flex-1">{{ $item['label'] }}</span>
            </a>
        @endforeach

        <p class="px-3 pb-2 pt-4 text-[11px] font-bold uppercase tracking-[0.08em] text-ywc-text-pale">Autres pages</p>
        @foreach ($otherPagesNavItems as $item)
            @php
                $active = request()->routeIs($item['pattern'])
                    && (! isset($item['params']) || request()->route('group') === $item['params'][0]);
            @endphp
            <a
                href="{{ route($item['route'], $item['params'] ?? []) }}"
                @click="sidebarOpen = false"
                class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-semibold no-underline transition
                    {{ $active
                        ? 'bg-ywc-blue text-white shadow-sm'
                        : 'text-ywc-text-soft hover:bg-ywc-bg-soft hover:text-ywc-ink' }}"
                @if ($active) aria-current="page" @endif
            >
                <svg class="h-5 w-5 flex-none {{ $active ? 'text-white' : 'text-ywc-text-muted group-hover:text-ywc-blue' }}"
                     fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
                    {!! $item['icon'] !!}
                </svg>
                <span class="flex-1">{{ $item['label'] }}</span>
            </a>
        @endforeach
    </nav>

    {{-- Pied : utilisateur --}}
    <div class="flex-none border-t border-ywc-border p-3">
        <div class="flex items-center gap-3 rounded-xl px-3 py-2">
            <span class="grid h-9 w-9 flex-none place-items-center rounded-full bg-gradient-to-br from-ywc-blue to-ywc-blue-mid text-sm font-bold text-white">
                {{ Str::upper(Str::substr(Auth::user()->name, 0, 1)) }}
            </span>
            <div class="min-w-0 flex-1">
                <div class="truncate text-sm font-semibold text-ywc-ink">{{ Auth::user()->name }}</div>
                <div class="truncate text-xs text-ywc-text-muted">{{ Auth::user()->email }}</div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="grid h-9 w-9 place-items-center rounded-lg text-ywc-text-muted transition hover:bg-ywc-bg-soft hover:text-ywc-blue" title="Se déconnecter" aria-label="Se déconnecter">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" /></svg>
                </button>
            </form>
        </div>
    </div>
</aside>
