<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-display text-xl font-bold tracking-[-0.01em] text-ywc-ink">Modifier « {{ $article->title_fr }} »</h2>
            @if ($article->is_published)
                <a href="{{ route('blog.show', $article) }}" target="_blank" class="text-sm font-semibold text-ywc-blue no-underline hover:underline">Voir sur le site →</a>
            @endif
        </div>
    </x-slot>

    <div>
        <div class="max-w-3xl mx-auto">
            <x-auth-session-status class="mb-4 rounded-lg bg-ywc-bg-soft px-4 py-2" :status="session('status') ? 'Article enregistré.' : null" />

            <form method="POST" action="{{ route('admin.articles.update', $article) }}" enctype="multipart/form-data" class="rounded-2xl border border-ywc-border bg-white p-6 space-y-6">
                @csrf
                @method('PUT')
                @include('admin.articles._form')
                <div class="flex justify-end gap-3">
                    <a href="{{ route('admin.articles.index') }}" class="rounded-md border border-ywc-border px-4 py-2 text-sm font-semibold text-ywc-text-soft no-underline hover:bg-ywc-bg-soft">Annuler</a>
                    <x-primary-button>Enregistrer</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
