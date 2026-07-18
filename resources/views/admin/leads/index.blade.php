<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-xl font-bold tracking-[-0.01em] text-ywc-ink">Leads</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form method="GET" class="flex flex-wrap items-end gap-3 rounded-2xl border border-ywc-border bg-white p-4">
                <div>
                    <x-input-label for="type" value="Type" />
                    <select id="type" name="type" class="mt-1 rounded-md border-ywc-border text-sm shadow-sm focus:border-ywc-blue focus:ring-ywc-blue">
                        <option value="">Tous</option>
                        <option value="contact" @selected(($filters['type'] ?? null) === 'contact')>Contact</option>
                        <option value="quote" @selected(($filters['type'] ?? null) === 'quote')>Devis</option>
                    </select>
                </div>
                <div>
                    <x-input-label for="status" value="Statut" />
                    <select id="status" name="status" class="mt-1 rounded-md border-ywc-border text-sm shadow-sm focus:border-ywc-blue focus:ring-ywc-blue">
                        <option value="">Tous</option>
                        @foreach (['new' => 'Nouveau', 'in_progress' => 'En cours', 'won' => 'Gagné', 'lost' => 'Perdu', 'archived' => 'Archivé'] as $value => $label)
                            <option value="{{ $value }}" @selected(($filters['status'] ?? null) === $value)>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex-1 min-w-[180px]">
                    <x-input-label for="search" value="Recherche" />
                    <x-text-input id="search" name="search" class="mt-1 block w-full text-sm" value="{{ $filters['search'] ?? '' }}" placeholder="Nom, email, société…" />
                </div>
                <x-primary-button>Filtrer</x-primary-button>
                @if (array_filter($filters))
                    <a href="{{ route('admin.leads.index') }}" class="text-sm text-ywc-text-soft no-underline hover:underline">Réinitialiser</a>
                @endif
            </form>

            <div class="overflow-x-auto rounded-2xl border border-ywc-border bg-white">
                <table class="min-w-full divide-y divide-ywc-border-soft text-sm">
                    <thead class="bg-ywc-bg-soft text-xs font-semibold uppercase tracking-[0.05em] text-ywc-text-muted">
                        <tr>
                            <th class="px-4 py-3 text-left">Contact</th>
                            <th class="px-4 py-3 text-left">Type</th>
                            <th class="px-4 py-3 text-left">Statut</th>
                            <th class="px-4 py-3 text-left">Reçu</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-ywc-border-soft">
                        @forelse ($leads as $lead)
                            <tr class="{{ $lead->read_at ? '' : 'bg-ywc-bg-soft/60 font-semibold' }}">
                                <td class="px-4 py-3">
                                    <a href="{{ route('admin.leads.show', $lead) }}" class="text-ywc-ink no-underline hover:text-ywc-blue">
                                        {{ $lead->name }}
                                    </a>
                                    <div class="text-xs font-normal text-ywc-text-muted">{{ $lead->email }}</div>
                                </td>
                                <td class="px-4 py-3">{{ $lead->type }}</td>
                                <td class="px-4 py-3">
                                    <span class="rounded-full bg-ywc-bg-soft px-2.5 py-1 text-xs font-semibold text-ywc-text-soft">{{ $lead->status }}</span>
                                </td>
                                <td class="px-4 py-3 text-ywc-text-muted">{{ $lead->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-6 text-center text-ywc-text-muted">Aucun lead ne correspond à ces filtres.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $leads->links() }}
        </div>
    </div>
</x-app-layout>
