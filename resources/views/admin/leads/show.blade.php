<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-xl font-bold tracking-[-0.01em] text-ywc-ink">{{ $lead->name }}</h2>
    </x-slot>

    <div>
        <div class="max-w-3xl mx-auto space-y-6">
            <x-auth-session-status class="rounded-lg bg-ywc-bg-soft px-4 py-2" :status="session('status') === 'lead-updated' ? 'Statut mis à jour.' : null" />

            <div class="rounded-2xl border border-ywc-border bg-white p-6 space-y-4">
                <dl class="grid gap-4 sm:grid-cols-2 text-sm">
                    <div>
                        <dt class="text-ywc-text-muted">Email</dt>
                        <dd class="font-semibold text-ywc-ink"><a href="mailto:{{ $lead->email }}" class="text-ywc-blue no-underline hover:underline">{{ $lead->email }}</a></dd>
                    </div>
                    <div>
                        <dt class="text-ywc-text-muted">Téléphone</dt>
                        <dd class="font-semibold text-ywc-ink">{{ $lead->phone ?: '—' }}</dd>
                    </div>
                    <div>
                        <dt class="text-ywc-text-muted">Société</dt>
                        <dd class="font-semibold text-ywc-ink">{{ $lead->company ?: '—' }}</dd>
                    </div>
                    <div>
                        <dt class="text-ywc-text-muted">Type</dt>
                        <dd class="font-semibold text-ywc-ink">{{ $lead->type }}</dd>
                    </div>
                    <div>
                        <dt class="text-ywc-text-muted">Budget</dt>
                        <dd class="font-semibold text-ywc-ink">{{ $lead->budget ?: '—' }}</dd>
                    </div>
                    <div>
                        <dt class="text-ywc-text-muted">Rendez-vous</dt>
                        <dd class="font-semibold text-ywc-ink">{{ $lead->appointment_at?->format('d/m/Y H:i') ?? '—' }}</dd>
                    </div>
                    @if ($lead->services)
                        <div class="sm:col-span-2">
                            <dt class="text-ywc-text-muted">Services demandés</dt>
                            <dd class="mt-1 flex flex-wrap gap-1.5">
                                @foreach ($lead->services as $service)
                                    <span class="rounded-full bg-ywc-bg-soft px-2.5 py-1 text-xs font-semibold text-ywc-text-soft">{{ $service }}</span>
                                @endforeach
                            </dd>
                        </div>
                    @endif
                </dl>

                <div>
                    <dt class="text-sm text-ywc-text-muted">Message</dt>
                    <dd class="mt-1 whitespace-pre-line rounded-lg bg-ywc-bg-soft p-4 text-sm text-ywc-ink">{{ $lead->message }}</dd>
                </div>

                <div class="text-xs text-ywc-text-muted">
                    Reçu le {{ $lead->created_at->format('d/m/Y à H:i') }} · Langue : {{ $lead->locale }}
                </div>
            </div>

            <div class="rounded-2xl border border-ywc-border bg-white p-6">
                <form method="POST" action="{{ route('admin.leads.update', $lead) }}" class="flex flex-wrap items-end gap-3">
                    @csrf
                    @method('PATCH')
                    <div>
                        <x-input-label for="status" value="Statut" />
                        <select id="status" name="status" class="mt-1 rounded-md border-ywc-border text-sm shadow-sm focus:border-ywc-blue focus:ring-ywc-blue">
                            @foreach (['new' => 'Nouveau', 'in_progress' => 'En cours', 'won' => 'Gagné', 'lost' => 'Perdu', 'archived' => 'Archivé'] as $value => $label)
                                <option value="{{ $value }}" @selected($lead->status === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <x-primary-button>Mettre à jour</x-primary-button>
                </form>
            </div>

            <a href="{{ route('admin.leads.index') }}" class="text-sm text-ywc-text-soft no-underline hover:underline">← Retour à la liste</a>
        </div>
    </div>
</x-app-layout>
