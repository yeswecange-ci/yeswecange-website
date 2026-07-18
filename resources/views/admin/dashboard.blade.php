<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-display text-lg font-bold tracking-[-0.01em] text-ywc-ink">Dashboard</h2>
            <p class="text-xs text-ywc-text-muted">Bonjour {{ Str::of(Auth::user()->name)->explode(' ')->first() }}, voici l'activité récente.</p>
        </div>
    </x-slot>

    @php
        $stats = [
            [
                'label' => 'Leads non lus',
                'value' => $unreadCount,
                'href' => route('admin.leads.index', ['status' => \App\Models\Lead::STATUS_NEW]),
                'accent' => 'text-ywc-blue',
                'ring' => 'bg-ywc-blue/10 text-ywc-blue',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />',
            ],
            [
                'label' => 'Nouveaux devis',
                'value' => $newQuotesCount,
                'href' => route('admin.leads.index', ['type' => \App\Models\Lead::TYPE_QUOTE, 'status' => \App\Models\Lead::STATUS_NEW]),
                'accent' => 'text-ywc-ink',
                'ring' => 'bg-ywc-green/10 text-ywc-green',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25z" />',
            ],
            [
                'label' => 'Cette semaine',
                'value' => $leadsThisWeek,
                'href' => route('admin.leads.index'),
                'accent' => 'text-ywc-ink',
                'ring' => 'bg-ywc-blue-mid/10 text-ywc-blue-mid',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.306a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />',
            ],
            [
                'label' => 'Total leads',
                'value' => $totalLeads,
                'href' => route('admin.leads.index'),
                'accent' => 'text-ywc-ink',
                'ring' => 'bg-ywc-text-muted/10 text-ywc-text-soft',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />',
            ],
        ];

        $statusStyles = [
            'new' => 'bg-ywc-blue/10 text-ywc-blue',
            'in_progress' => 'bg-amber-100 text-amber-700',
            'won' => 'bg-ywc-green/10 text-ywc-green',
            'lost' => 'bg-red-100 text-red-600',
            'archived' => 'bg-ywc-bg-soft text-ywc-text-muted',
        ];
        $statusLabels = ['new' => 'Nouveau', 'in_progress' => 'En cours', 'won' => 'Gagné', 'lost' => 'Perdu', 'archived' => 'Archivé'];
    @endphp

    <div class="space-y-6">
        {{-- Cartes statistiques --}}
        <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
            @foreach ($stats as $stat)
                <a href="{{ $stat['href'] }}" class="group rounded-2xl border border-ywc-border bg-white p-5 no-underline transition hover:-translate-y-0.5 hover:border-ywc-border-blue hover:shadow-md">
                    <div class="flex items-start justify-between">
                        <span class="grid h-11 w-11 place-items-center rounded-xl {{ $stat['ring'] }}">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">{!! $stat['icon'] !!}</svg>
                        </span>
                        <svg class="h-5 w-5 text-ywc-text-pale transition group-hover:translate-x-0.5 group-hover:text-ywc-blue" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" /></svg>
                    </div>
                    <div class="mt-4 font-display text-4xl font-bold {{ $stat['accent'] }}">{{ $stat['value'] }}</div>
                    <div class="mt-1 text-sm font-semibold text-ywc-text-muted">{{ $stat['label'] }}</div>
                </a>
            @endforeach
        </div>

        <div class="grid gap-6 lg:grid-cols-3">
            {{-- Derniers leads --}}
            <div class="rounded-2xl border border-ywc-border bg-white lg:col-span-2">
                <div class="flex items-center justify-between border-b border-ywc-border-soft px-6 py-4">
                    <h3 class="font-display text-base font-bold text-ywc-ink">Derniers leads</h3>
                    <a href="{{ route('admin.leads.index') }}" class="text-sm font-semibold text-ywc-blue no-underline hover:underline">Voir tout →</a>
                </div>
                <div class="divide-y divide-ywc-border-soft px-6">
                    @forelse ($recentLeads as $lead)
                        <a href="{{ route('admin.leads.show', $lead) }}" class="flex items-center gap-4 py-3.5 no-underline">
                            <span class="grid h-10 w-10 flex-none place-items-center rounded-full bg-ywc-bg-soft text-sm font-bold text-ywc-text-soft">
                                {{ Str::upper(Str::substr($lead->name, 0, 1)) }}
                            </span>
                            <div class="min-w-0 flex-1">
                                <div class="flex items-center gap-2">
                                    <span class="truncate font-semibold text-ywc-ink">{{ $lead->name }}</span>
                                    @unless ($lead->read_at)
                                        <span class="h-2 w-2 flex-none rounded-full bg-ywc-blue" title="Non lu"></span>
                                    @endunless
                                </div>
                                <div class="truncate text-sm text-ywc-text-muted">{{ $lead->email }} · {{ $lead->created_at->diffForHumans() }}</div>
                            </div>
                            <span class="hidden flex-none rounded-full px-2.5 py-1 text-xs font-semibold sm:inline-block {{ $statusStyles[$lead->status] ?? 'bg-ywc-bg-soft text-ywc-text-muted' }}">
                                {{ $statusLabels[$lead->status] ?? $lead->status }}
                            </span>
                            <span class="flex-none rounded-full bg-ywc-bg-soft px-2.5 py-1 text-xs font-semibold text-ywc-text-soft">
                                {{ $lead->type === \App\Models\Lead::TYPE_QUOTE ? 'Devis' : 'Contact' }}
                            </span>
                        </a>
                    @empty
                        <p class="py-8 text-center text-sm text-ywc-text-muted">Aucun lead pour le moment.</p>
                    @endforelse
                </div>
            </div>

            {{-- Prochains rendez-vous --}}
            <div class="rounded-2xl border border-ywc-border bg-white">
                <div class="flex items-center justify-between border-b border-ywc-border-soft px-6 py-4">
                    <h3 class="font-display text-base font-bold text-ywc-ink">Prochains RDV</h3>
                    <span class="rounded-full bg-ywc-bg-soft px-2.5 py-1 text-xs font-semibold text-ywc-text-soft">{{ $upcomingAppointments->count() }}</span>
                </div>
                <div class="divide-y divide-ywc-border-soft px-6">
                    @forelse ($upcomingAppointments as $lead)
                        <a href="{{ route('admin.leads.show', $lead) }}" class="flex items-center gap-3 py-3.5 no-underline">
                            <div class="flex h-12 w-12 flex-none flex-col items-center justify-center rounded-xl bg-ywc-blue/10 text-ywc-blue">
                                <span class="text-base font-bold leading-none">{{ $lead->appointment_at->format('d') }}</span>
                                <span class="text-[10px] font-semibold uppercase">{{ $lead->appointment_at->translatedFormat('M') }}</span>
                            </div>
                            <div class="min-w-0 flex-1">
                                <div class="truncate font-semibold text-ywc-ink">{{ $lead->name }}</div>
                                <div class="text-sm text-ywc-text-muted">{{ $lead->appointment_at->format('H:i') }} · {{ $lead->appointment_at->translatedFormat('D d M') }}</div>
                            </div>
                        </a>
                    @empty
                        <p class="py-8 text-center text-sm text-ywc-text-muted">Aucun rendez-vous à venir.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
