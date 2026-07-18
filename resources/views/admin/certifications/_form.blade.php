@php $certification = $certification ?? null; @endphp

<div class="grid gap-4 sm:grid-cols-2">
    <div>
        <x-input-label for="name_fr" value="Nom (FR)" />
        <x-text-input id="name_fr" name="name_fr" class="mt-1 block w-full" :value="old('name_fr', $certification?->name_fr)" required />
        <x-input-error :messages="$errors->get('name_fr')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="name_en" value="Nom (EN)" />
        <x-text-input id="name_en" name="name_en" class="mt-1 block w-full" :value="old('name_en', $certification?->name_en)" required />
        <x-input-error :messages="$errors->get('name_en')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="issuer_fr" value="Organisme émetteur (FR)" />
        <x-text-input id="issuer_fr" name="issuer_fr" class="mt-1 block w-full" :value="old('issuer_fr', $certification?->issuer_fr)" required />
        <x-input-error :messages="$errors->get('issuer_fr')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="issuer_en" value="Organisme émetteur (EN)" />
        <x-text-input id="issuer_en" name="issuer_en" class="mt-1 block w-full" :value="old('issuer_en', $certification?->issuer_en)" required />
        <x-input-error :messages="$errors->get('issuer_en')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="order_column" value="Ordre d'affichage" />
        <x-text-input id="order_column" name="order_column" type="number" class="mt-1 block w-full" :value="old('order_column', $certification?->order_column ?? 0)" />
        <x-input-error :messages="$errors->get('order_column')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="logo" :value="'Logo' . ($certification ? ' (laisser vide pour garder l\'actuel)' : '')" />
        <input id="logo" name="logo" type="file" accept="image/*" {{ $certification ? '' : 'required' }} class="mt-1 block w-full text-sm text-ywc-text-soft">
        @if ($certification?->logo)
            <img src="{{ asset('storage/' . $certification->logo) }}" alt="" class="mt-2 h-12 rounded border border-ywc-border object-contain bg-white p-1">
        @endif
        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
    </div>
</div>
