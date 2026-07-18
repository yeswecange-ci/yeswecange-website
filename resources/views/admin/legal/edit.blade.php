<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-xl font-bold tracking-[-0.01em] text-ywc-ink">Modifier « {{ $page->title_fr }} »</h2>
    </x-slot>

    <div>
        <div class="max-w-3xl mx-auto">
            <x-auth-session-status class="mb-4 rounded-lg bg-ywc-bg-soft px-4 py-2" :status="session('status') ? 'Page enregistrée.' : null" />

            <form method="POST" action="{{ route('admin.legal.update', $page) }}" class="rounded-2xl border border-ywc-border bg-white p-6 space-y-6">
                @csrf
                @method('PUT')

                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <x-input-label for="title_fr" value="Titre (FR)" />
                        <x-text-input id="title_fr" name="title_fr" class="mt-1 block w-full" :value="old('title_fr', $page->title_fr)" required />
                        <x-input-error :messages="$errors->get('title_fr')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="title_en" value="Titre (EN)" />
                        <x-text-input id="title_en" name="title_en" class="mt-1 block w-full" :value="old('title_en', $page->title_en)" required />
                        <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
                    </div>
                </div>

                <p class="text-xs text-ywc-text-muted">Le contenu accepte du HTML simple (&lt;h2&gt;, &lt;p&gt;, &lt;ul&gt;/&lt;li&gt;, &lt;a&gt;, &lt;strong&gt;) — même mise en forme que le reste du site.</p>

                <div>
                    <x-input-label for="body_fr" value="Contenu (FR)" />
                    <textarea id="body_fr" name="body_fr" rows="16" required class="mt-1 block w-full rounded-md border-ywc-border font-mono text-xs shadow-sm focus:border-ywc-blue focus:ring-ywc-blue">{{ old('body_fr', $page->body_fr) }}</textarea>
                    <x-input-error :messages="$errors->get('body_fr')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="body_en" value="Contenu (EN)" />
                    <textarea id="body_en" name="body_en" rows="16" required class="mt-1 block w-full rounded-md border-ywc-border font-mono text-xs shadow-sm focus:border-ywc-blue focus:ring-ywc-blue">{{ old('body_en', $page->body_en) }}</textarea>
                    <x-input-error :messages="$errors->get('body_en')" class="mt-2" />
                </div>

                <div class="flex justify-end gap-3">
                    <a href="{{ route('admin.legal.index') }}" class="rounded-md border border-ywc-border px-4 py-2 text-sm font-semibold text-ywc-text-soft no-underline hover:bg-ywc-bg-soft">Annuler</a>
                    <x-primary-button>Enregistrer</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
