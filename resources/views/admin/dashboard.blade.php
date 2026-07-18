<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-xl font-bold tracking-[-0.01em] text-ywc-ink">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="grid gap-4 sm:grid-cols-2">
                <a href="{{ route('admin.leads.index', ['status' => \App\Models\Lead::STATUS_NEW]) }}" class="block rounded-2xl border border-ywc-border bg-white p-6 no-underline transition hover:-translate-y-0.5 hover:shadow-md">
                    <div class="text-sm font-semibold uppercase tracking-[0.06em] text-ywc-text-muted">Leads non lus</div>
                    <div class="mt-2 font-display text-4xl font-bold text-ywc-blue">{{ $unreadCount }}</div>
                </a>
                <a href="{{ route('admin.leads.index', ['type' => \App\Models\Lead::TYPE_QUOTE, 'status' => \App\Models\Lead::STATUS_NEW]) }}" class="block rounded-2xl border border-ywc-border bg-white p-6 no-underline transition hover:-translate-y-0.5 hover:shadow-md">
                    <div class="text-sm font-semibold uppercase tracking-[0.06em] text-ywc-text-muted">Nouveaux devis</div>
                    <div class="mt-2 font-display text-4xl font-bold text-ywc-ink">{{ $newQuotesCount }}</div>
                </a>
            </div>

            <div class="rounded-2xl border border-ywc-border bg-white p-6">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="font-display text-base font-bold text-ywc-ink">Derniers leads</h3>
                    <a href="{{ route('admin.leads.index') }}" class="text-sm font-semibold text-ywc-blue no-underline hover:underline">Voir tout →</a>
                </div>
                <div class="divide-y divide-ywc-border-soft">
                    @forelse ($recentLeads as $lead)
                        <a href="{{ route('admin.leads.show', $lead) }}" class="flex items-center justify-between gap-4 py-3 no-underline">
                            <div>
                                <div class="font-semibold text-ywc-ink">{{ $lead->name }}</div>
                                <div class="text-sm text-ywc-text-muted">{{ $lead->email }} · {{ $lead->created_at->diffForHumans() }}</div>
                            </div>
                            <span class="rounded-full bg-ywc-bg-soft px-3 py-1 text-xs font-semibold text-ywc-text-soft">{{ $lead->type }}</span>
                        </a>
                    @empty
                        <p class="py-3 text-sm text-ywc-text-muted">Aucun lead pour le moment.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
