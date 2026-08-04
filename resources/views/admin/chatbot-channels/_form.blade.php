@php
    $chatbotChannel = $chatbotChannel ?? null;
@endphp

<div class="grid gap-4 sm:grid-cols-2">
    <div>
        <x-input-label for="label_fr" value="Libellé (FR)" />
        <x-text-input id="label_fr" name="label_fr" class="mt-1 block w-full" :value="old('label_fr', $chatbotChannel?->label_fr)" required />
        <x-input-error :messages="$errors->get('label_fr')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="label_en" value="Libellé (EN)" />
        <x-text-input id="label_en" name="label_en" class="mt-1 block w-full" :value="old('label_en', $chatbotChannel?->label_en)" required />
        <x-input-error :messages="$errors->get('label_en')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="order_column" value="Ordre d'affichage" />
        <x-text-input id="order_column" name="order_column" type="number" class="mt-1 block w-full" :value="old('order_column', $chatbotChannel?->order_column ?? 0)" />
        <x-input-error :messages="$errors->get('order_column')" class="mt-2" />
    </div>
</div>
