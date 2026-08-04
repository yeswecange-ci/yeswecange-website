@php
    $officeLocation = $officeLocation ?? null;
@endphp

<div class="grid gap-4 sm:grid-cols-2">
    <div>
        <x-input-label for="slug" value="Identifiant (unique, ex. paris)" />
        <x-text-input id="slug" name="slug" class="mt-1 block w-full" :value="old('slug', $officeLocation?->slug)" required />
        <x-input-error :messages="$errors->get('slug')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="order_column" value="Ordre d'affichage" />
        <x-text-input id="order_column" name="order_column" type="number" class="mt-1 block w-full" :value="old('order_column', $officeLocation?->order_column ?? 0)" />
        <x-input-error :messages="$errors->get('order_column')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="eyebrow" value="Sur-titre (ex. Paris)" />
        <x-text-input id="eyebrow" name="eyebrow" class="mt-1 block w-full" :value="old('eyebrow', $officeLocation?->eyebrow)" required />
        <x-input-error :messages="$errors->get('eyebrow')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="phone" value="Téléphone" />
        <x-text-input id="phone" name="phone" class="mt-1 block w-full" :value="old('phone', $officeLocation?->phone)" required />
        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="title_fr" value="Titre (FR)" />
        <x-text-input id="title_fr" name="title_fr" class="mt-1 block w-full" :value="old('title_fr', $officeLocation?->title_fr)" required />
        <x-input-error :messages="$errors->get('title_fr')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="title_en" value="Titre (EN)" />
        <x-text-input id="title_en" name="title_en" class="mt-1 block w-full" :value="old('title_en', $officeLocation?->title_en)" required />
        <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
    </div>

    <div class="sm:col-span-2">
        <x-input-label for="address" value="Adresse (une ligne par retour à la ligne, non traduite)" />
        <textarea id="address" name="address" rows="3" required class="mt-1 block w-full rounded-md border-ywc-border text-sm shadow-sm focus:border-ywc-blue focus:ring-ywc-blue">{{ old('address', $officeLocation?->address) }}</textarea>
        <x-input-error :messages="$errors->get('address')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="cta_label_fr" value="Libellé du bouton (FR)" />
        <x-text-input id="cta_label_fr" name="cta_label_fr" class="mt-1 block w-full" :value="old('cta_label_fr', $officeLocation?->cta_label_fr)" required />
        <x-input-error :messages="$errors->get('cta_label_fr')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="cta_label_en" value="Libellé du bouton (EN)" />
        <x-text-input id="cta_label_en" name="cta_label_en" class="mt-1 block w-full" :value="old('cta_label_en', $officeLocation?->cta_label_en)" required />
        <x-input-error :messages="$errors->get('cta_label_en')" class="mt-2" />
    </div>

    <div class="flex items-center gap-2 pt-2">
        <input type="checkbox" id="is_dark" name="is_dark" value="1" @checked(old('is_dark', $officeLocation?->is_dark)) class="rounded border-ywc-border text-ywc-blue shadow-sm focus:ring-ywc-blue">
        <x-input-label for="is_dark" value="Carte foncée (variante de style)" class="!mb-0" />
    </div>
</div>
