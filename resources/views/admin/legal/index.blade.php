<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-xl font-bold tracking-[-0.01em] text-ywc-ink">Pages légales</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-2xl border border-ywc-border bg-white divide-y divide-ywc-border-soft">
                @foreach ($pages as $page)
                    <div class="flex items-center justify-between gap-4 p-4">
                        <div>
                            <div class="font-semibold text-ywc-ink">{{ $page->title_fr }}</div>
                            <div class="text-sm text-ywc-text-muted">Mis à jour {{ $page->updated_at->diffForHumans() }}</div>
                        </div>
                        <a href="{{ route('admin.legal.edit', $page) }}" class="text-sm font-semibold text-ywc-blue no-underline hover:underline">Modifier</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
