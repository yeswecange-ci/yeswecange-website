@php
    $trustChip = $trustChip ?? null;
@endphp

<div class="grid gap-4 sm:grid-cols-2">
    <div>
        <x-input-label for="key" value="Clé interne (unique, ex. chatbots)" />
        <x-text-input id="key" name="key" class="mt-1 block w-full" :value="old('key', $trustChip?->key)" required />
        <x-input-error :messages="$errors->get('key')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="order_column" value="Ordre d'affichage" />
        <x-text-input id="order_column" name="order_column" type="number" class="mt-1 block w-full" :value="old('order_column', $trustChip?->order_column ?? 0)" />
        <x-input-error :messages="$errors->get('order_column')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="label_fr" value="Libellé du bouton (FR)" />
        <x-text-input id="label_fr" name="label_fr" class="mt-1 block w-full" :value="old('label_fr', $trustChip?->label_fr)" required />
        <x-input-error :messages="$errors->get('label_fr')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="label_en" value="Libellé du bouton (EN)" />
        <x-text-input id="label_en" name="label_en" class="mt-1 block w-full" :value="old('label_en', $trustChip?->label_en)" required />
        <x-input-error :messages="$errors->get('label_en')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="text_fr" value="Texte affiché (FR)" />
        <textarea id="text_fr" name="text_fr" rows="3" required class="mt-1 block w-full rounded-md border-ywc-border text-sm shadow-sm focus:border-ywc-blue focus:ring-ywc-blue">{{ old('text_fr', $trustChip?->text_fr) }}</textarea>
        <x-input-error :messages="$errors->get('text_fr')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="text_en" value="Texte affiché (EN)" />
        <textarea id="text_en" name="text_en" rows="3" required class="mt-1 block w-full rounded-md border-ywc-border text-sm shadow-sm focus:border-ywc-blue focus:ring-ywc-blue">{{ old('text_en', $trustChip?->text_en) }}</textarea>
        <x-input-error :messages="$errors->get('text_en')" class="mt-2" />
    </div>

    <div class="flex items-center gap-2 pt-2">
        <input type="checkbox" id="is_default" name="is_default" value="1" @checked(old('is_default', $trustChip?->is_default)) class="rounded border-ywc-border text-ywc-blue shadow-sm focus:ring-ywc-blue">
        <x-input-label for="is_default" value="Actif par défaut à l'affichage" class="!mb-0" />
    </div>
</div>
