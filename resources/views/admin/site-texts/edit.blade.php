<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-display text-xl font-bold tracking-[-0.01em] text-ywc-ink">Textes — {{ ucfirst($group) }}</h2>
            @if ($publicUrl)
                <a href="{{ $publicUrl }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 rounded-md border border-ywc-border px-3.5 py-2 text-sm font-semibold text-ywc-text-soft no-underline transition hover:border-ywc-border-blue hover:text-ywc-blue">
                    Voir la page
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" /></svg>
                </a>
            @endif
        </div>
    </x-slot>

    <div>
        <div class="max-w-3xl mx-auto">
            <x-auth-session-status class="mb-4 rounded-lg bg-ywc-bg-soft px-4 py-2" :status="session('status') ? 'Textes enregistrés.' : null" />

            <form method="POST" action="{{ route('admin.site-texts.update', $group) }}" class="space-y-6">
                @csrf
                @method('PUT')

                @foreach ($sections as $sectionLabel => $sectionTexts)
                    <section>
                        <h3 class="mb-2.5 flex items-center gap-2 text-[13px] font-bold uppercase tracking-[0.05em] text-ywc-blue">
                            <span class="h-1.5 w-1.5 rounded-full bg-ywc-blue"></span>
                            {{ $sectionLabel }}
                        </h3>
                        <div class="space-y-3 rounded-2xl border border-ywc-border bg-white p-6">
                            @foreach ($sectionTexts as $text)
                                @php
                                    $rows = max(2, min(8, (int) ceil(max(strlen($text->value_fr), strlen($text->value_en)) / 60)));
                                @endphp
                                <div @if (! $loop->first) class="border-t border-ywc-border-soft pt-3" @endif>
                                    <p class="mb-2 text-xs font-semibold text-ywc-text-muted">{{ $text->label }}</p>
                                    <div class="grid gap-4 sm:grid-cols-2">
                                        <div>
                                            <x-input-label :for="'value_fr_'.$text->id" value="Français" />
                                            <textarea id="value_fr_{{ $text->id }}" name="texts[{{ $text->id }}][value_fr]" rows="{{ $rows }}" required class="mt-1 block w-full rounded-md border-ywc-border text-sm shadow-sm focus:border-ywc-blue focus:ring-ywc-blue">{{ old('texts.'.$text->id.'.value_fr', $text->value_fr) }}</textarea>
                                            <x-input-error :messages="$errors->get('texts.'.$text->id.'.value_fr')" class="mt-2" />
                                        </div>
                                        <div>
                                            <x-input-label :for="'value_en_'.$text->id" value="English" />
                                            <textarea id="value_en_{{ $text->id }}" name="texts[{{ $text->id }}][value_en]" rows="{{ $rows }}" required class="mt-1 block w-full rounded-md border-ywc-border text-sm shadow-sm focus:border-ywc-blue focus:ring-ywc-blue">{{ old('texts.'.$text->id.'.value_en', $text->value_en) }}</textarea>
                                            <x-input-error :messages="$errors->get('texts.'.$text->id.'.value_en')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endforeach

                <div class="sticky bottom-4 flex justify-end gap-3 rounded-2xl border border-ywc-border bg-white/90 p-4 backdrop-blur">
                    <a href="{{ route('admin.dashboard') }}" class="rounded-md border border-ywc-border px-4 py-2 text-sm font-semibold text-ywc-text-soft no-underline hover:bg-ywc-bg-soft">Annuler</a>
                    <x-primary-button>Enregistrer</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
