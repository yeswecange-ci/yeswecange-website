<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-xl font-bold tracking-[-0.01em] text-ywc-ink">Modifier « {{ $testimonial->author_name }} »</h2>
    </x-slot>

    <div>
        <div class="max-w-3xl mx-auto">
            <form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}" class="rounded-2xl border border-ywc-border bg-white p-6 space-y-6">
                @csrf
                @method('PUT')
                @include('admin.testimonials._form')
                <div class="flex justify-end gap-3">
                    <a href="{{ route('admin.testimonials.index') }}" class="rounded-md border border-ywc-border px-4 py-2 text-sm font-semibold text-ywc-text-soft no-underline hover:bg-ywc-bg-soft">Annuler</a>
                    <x-primary-button>Enregistrer</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
