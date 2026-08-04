@php
    $testimonial = $testimonial ?? null;
@endphp

<div class="grid gap-4 sm:grid-cols-2">
    <div>
        <x-input-label for="author_name" value="Nom de l'auteur" />
        <x-text-input id="author_name" name="author_name" class="mt-1 block w-full" :value="old('author_name', $testimonial?->author_name)" required />
        <x-input-error :messages="$errors->get('author_name')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="initials" value="Initiales (avatar, ex. AK)" />
        <x-text-input id="initials" name="initials" class="mt-1 block w-full" :value="old('initials', $testimonial?->initials)" maxlength="4" required />
        <x-input-error :messages="$errors->get('initials')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="role_fr" value="Fonction (FR)" />
        <x-text-input id="role_fr" name="role_fr" class="mt-1 block w-full" :value="old('role_fr', $testimonial?->role_fr)" required />
        <x-input-error :messages="$errors->get('role_fr')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="role_en" value="Fonction (EN)" />
        <x-text-input id="role_en" name="role_en" class="mt-1 block w-full" :value="old('role_en', $testimonial?->role_en)" required />
        <x-input-error :messages="$errors->get('role_en')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="quote_fr" value="Témoignage (FR)" />
        <textarea id="quote_fr" name="quote_fr" rows="4" required class="mt-1 block w-full rounded-md border-ywc-border text-sm shadow-sm focus:border-ywc-blue focus:ring-ywc-blue">{{ old('quote_fr', $testimonial?->quote_fr) }}</textarea>
        <x-input-error :messages="$errors->get('quote_fr')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="quote_en" value="Témoignage (EN)" />
        <textarea id="quote_en" name="quote_en" rows="4" required class="mt-1 block w-full rounded-md border-ywc-border text-sm shadow-sm focus:border-ywc-blue focus:ring-ywc-blue">{{ old('quote_en', $testimonial?->quote_en) }}</textarea>
        <x-input-error :messages="$errors->get('quote_en')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="order_column" value="Ordre d'affichage" />
        <x-text-input id="order_column" name="order_column" type="number" class="mt-1 block w-full" :value="old('order_column', $testimonial?->order_column ?? 0)" />
        <x-input-error :messages="$errors->get('order_column')" class="mt-2" />
    </div>
</div>
