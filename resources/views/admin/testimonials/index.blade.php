<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-display text-xl font-bold tracking-[-0.01em] text-ywc-ink">Témoignages (page d'accueil)</h2>
            <a href="{{ route('admin.testimonials.create') }}" class="rounded-md bg-ywc-blue px-4 py-2 text-sm font-semibold text-white no-underline hover:bg-ywc-blue-mid">+ Ajouter</a>
        </div>
    </x-slot>

    <div>
        <div class="max-w-5xl mx-auto space-y-6">
            <x-auth-session-status class="rounded-lg bg-ywc-bg-soft px-4 py-2" :status="session('status') ? 'Témoignage enregistré.' : null" />

            <div class="overflow-hidden rounded-2xl border border-ywc-border bg-white divide-y divide-ywc-border-soft">
                @forelse ($testimonials as $testimonial)
                    <div class="flex items-center justify-between gap-4 p-4">
                        <div>
                            <div class="font-semibold text-ywc-ink">{{ $testimonial->author_name }} — {{ $testimonial->role_fr }}</div>
                            <div class="text-sm text-ywc-text-muted truncate max-w-xl">{{ $testimonial->quote_fr }} · ordre {{ $testimonial->order_column }}</div>
                        </div>
                        <div class="flex items-center gap-3">
                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="text-sm font-semibold text-ywc-blue no-underline hover:underline">Modifier</a>
                            <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial) }}" onsubmit="return confirm('Supprimer ce témoignage ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm font-semibold text-red-600 hover:underline">Supprimer</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="p-6 text-center text-ywc-text-muted">Aucun témoignage pour le moment.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
