<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-xl font-bold tracking-[-0.01em] text-ywc-ink">Ajouter une question</h2>
    </x-slot>

    <div>
        <div class="max-w-3xl mx-auto">
            <form method="POST" action="{{ route('admin.faq-items.store') }}" class="rounded-2xl border border-ywc-border bg-white p-6 space-y-6">
                @csrf
                @include('admin.faq-items._form', ['faqItem' => null])
                <div class="flex justify-end gap-3">
                    <a href="{{ route('admin.faq-items.index') }}" class="rounded-md border border-ywc-border px-4 py-2 text-sm font-semibold text-ywc-text-soft no-underline hover:bg-ywc-bg-soft">Annuler</a>
                    <x-primary-button>Créer</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
