<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-display text-xl font-bold tracking-[-0.01em] text-ywc-ink">Certifications</h2>
            <a href="{{ route('admin.certifications.create') }}" class="rounded-md bg-ywc-blue px-4 py-2 text-sm font-semibold text-white no-underline hover:bg-ywc-blue-mid">+ Ajouter une certification</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-auth-session-status class="rounded-lg bg-ywc-bg-soft px-4 py-2" :status="session('status') ? 'Certification enregistrée.' : null" />

            <div class="overflow-hidden rounded-2xl border border-ywc-border bg-white divide-y divide-ywc-border-soft">
                @forelse ($certifications as $certification)
                    <div class="flex items-center justify-between gap-4 p-4">
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('storage/' . $certification->logo) }}" alt="" class="h-10 w-16 rounded border border-ywc-border object-contain bg-white p-1">
                            <div>
                                <div class="font-semibold text-ywc-ink">{{ $certification->name_fr }}</div>
                                <div class="text-sm text-ywc-text-muted">{{ $certification->name_en }} · ordre {{ $certification->order_column }}</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <a href="{{ route('admin.certifications.edit', $certification) }}" class="text-sm font-semibold text-ywc-blue no-underline hover:underline">Modifier</a>
                            <form method="POST" action="{{ route('admin.certifications.destroy', $certification) }}" onsubmit="return confirm('Supprimer cette certification ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm font-semibold text-red-600 hover:underline">Supprimer</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="p-6 text-center text-ywc-text-muted">Aucune certification pour le moment.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
