<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-display text-xl font-bold tracking-[-0.01em] text-ywc-ink">Agences (page d'accueil)</h2>
            <a href="{{ route('admin.office-locations.create') }}" class="rounded-md bg-ywc-blue px-4 py-2 text-sm font-semibold text-white no-underline hover:bg-ywc-blue-mid">+ Ajouter</a>
        </div>
    </x-slot>

    <div>
        <div class="max-w-5xl mx-auto space-y-6">
            <x-auth-session-status class="rounded-lg bg-ywc-bg-soft px-4 py-2" :status="session('status') ? 'Agence enregistrée.' : null" />

            <div class="overflow-hidden rounded-2xl border border-ywc-border bg-white divide-y divide-ywc-border-soft">
                @forelse ($officeLocations as $officeLocation)
                    <div class="flex items-center justify-between gap-4 p-4">
                        <div>
                            <div class="font-semibold text-ywc-ink">{{ $officeLocation->title_fr }}{{ $officeLocation->is_dark ? ' · style foncé' : '' }}</div>
                            <div class="text-sm text-ywc-text-muted">{{ $officeLocation->title_en }} · {{ $officeLocation->slug }} · ordre {{ $officeLocation->order_column }}</div>
                        </div>
                        <div class="flex items-center gap-3">
                            <a href="{{ route('admin.office-locations.edit', $officeLocation) }}" class="text-sm font-semibold text-ywc-blue no-underline hover:underline">Modifier</a>
                            <form method="POST" action="{{ route('admin.office-locations.destroy', $officeLocation) }}" onsubmit="return confirm('Supprimer cette agence ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm font-semibold text-red-600 hover:underline">Supprimer</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="p-6 text-center text-ywc-text-muted">Aucune agence pour le moment.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
