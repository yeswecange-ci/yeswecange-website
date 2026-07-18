@php
    $service = $service ?? null;
    $tagsFr = old('tags_fr', $service ? implode(', ', $service->tags_fr ?? []) : '');
    $tagsEn = old('tags_en', $service ? implode(', ', $service->tags_en ?? []) : '');
@endphp

<div class="grid gap-4 sm:grid-cols-2">
    <div>
        <x-input-label for="title_fr" value="Titre (FR)" />
        <x-text-input id="title_fr" name="title_fr" class="mt-1 block w-full" :value="old('title_fr', $service?->title_fr)" required />
        <x-input-error :messages="$errors->get('title_fr')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="title_en" value="Titre (EN)" />
        <x-text-input id="title_en" name="title_en" class="mt-1 block w-full" :value="old('title_en', $service?->title_en)" required />
        <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="description_fr" value="Description (FR)" />
        <textarea id="description_fr" name="description_fr" rows="4" required class="mt-1 block w-full rounded-md border-ywc-border text-sm shadow-sm focus:border-ywc-blue focus:ring-ywc-blue">{{ old('description_fr', $service?->description_fr) }}</textarea>
        <x-input-error :messages="$errors->get('description_fr')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="description_en" value="Description (EN)" />
        <textarea id="description_en" name="description_en" rows="4" required class="mt-1 block w-full rounded-md border-ywc-border text-sm shadow-sm focus:border-ywc-blue focus:ring-ywc-blue">{{ old('description_en', $service?->description_en) }}</textarea>
        <x-input-error :messages="$errors->get('description_en')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="tags_fr" value="Tags (FR, séparés par des virgules)" />
        <x-text-input id="tags_fr" name="tags_fr" class="mt-1 block w-full" :value="$tagsFr" />
        <x-input-error :messages="$errors->get('tags_fr')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="tags_en" value="Tags (EN, séparés par des virgules)" />
        <x-text-input id="tags_en" name="tags_en" class="mt-1 block w-full" :value="$tagsEn" />
        <x-input-error :messages="$errors->get('tags_en')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="icon" value="Icône (emoji, optionnel)" />
        <x-text-input id="icon" name="icon" class="mt-1 block w-full" :value="old('icon', $service?->icon)" maxlength="10" />
        <x-input-error :messages="$errors->get('icon')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="order_column" value="Ordre d'affichage" />
        <x-text-input id="order_column" name="order_column" type="number" class="mt-1 block w-full" :value="old('order_column', $service?->order_column ?? 0)" />
        <x-input-error :messages="$errors->get('order_column')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="image" value="Image (optionnelle, remplace l'icône sur la carte)" />
        <input id="image" name="image" type="file" accept="image/*" class="mt-1 block w-full text-sm text-ywc-text-soft" />
        @if ($service?->image)
            <img src="{{ asset('storage/' . $service->image) }}" alt="" class="mt-2 h-16 rounded-lg border border-ywc-border object-cover">
        @endif
        <x-input-error :messages="$errors->get('image')" class="mt-2" />
    </div>
    <div class="flex items-center gap-2 pt-6">
        <input type="checkbox" id="feature" name="feature" value="1" @checked(old('feature', $service?->feature)) class="rounded border-ywc-border text-ywc-blue shadow-sm focus:ring-ywc-blue">
        <x-input-label for="feature" value="Carte mise en avant (plus large)" class="!mb-0" />
    </div>
</div>
