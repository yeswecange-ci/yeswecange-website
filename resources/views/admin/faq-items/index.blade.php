<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-display text-xl font-bold tracking-[-0.01em] text-ywc-ink">FAQ</h2>
            <a href="{{ route('admin.faq-items.create') }}" class="rounded-md bg-ywc-blue px-4 py-2 text-sm font-semibold text-white no-underline hover:bg-ywc-blue-mid">+ Ajouter</a>
        </div>
    </x-slot>

    <div>
        <div class="max-w-5xl mx-auto space-y-6">
            <x-auth-session-status class="rounded-lg bg-ywc-bg-soft px-4 py-2" :status="session('status') ? 'Question enregistrée.' : null" />

            <div class="overflow-hidden rounded-2xl border border-ywc-border bg-white divide-y divide-ywc-border-soft">
                @forelse ($faqItems as $faqItem)
                    <div class="flex items-center justify-between gap-4 p-4">
                        <div>
                            <div class="font-semibold text-ywc-ink">{{ $faqItem->question_fr }}</div>
                            <div class="text-sm text-ywc-text-muted">ordre {{ $faqItem->order_column }}</div>
                        </div>
                        <div class="flex items-center gap-3">
                            <a href="{{ route('admin.faq-items.edit', $faqItem) }}" class="text-sm font-semibold text-ywc-blue no-underline hover:underline">Modifier</a>
                            <form method="POST" action="{{ route('admin.faq-items.destroy', $faqItem) }}" onsubmit="return confirm('Supprimer cette question ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm font-semibold text-red-600 hover:underline">Supprimer</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="p-6 text-center text-ywc-text-muted">Aucune question pour le moment.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
