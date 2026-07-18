@php $value = $value ?? null; @endphp

<div class="grid gap-4 sm:grid-cols-2">
    <div>
        <x-input-label for="title_fr" value="Titre (FR)" />
        <x-text-input id="title_fr" name="title_fr" class="mt-1 block w-full" :value="old('title_fr', $value?->title_fr)" required />
        <x-input-error :messages="$errors->get('title_fr')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="title_en" value="Titre (EN)" />
        <x-text-input id="title_en" name="title_en" class="mt-1 block w-full" :value="old('title_en', $value?->title_en)" required />
        <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="description_fr" value="Description (FR)" />
        <textarea id="description_fr" name="description_fr" rows="3" required class="mt-1 block w-full rounded-md border-ywc-border text-sm shadow-sm focus:border-ywc-blue focus:ring-ywc-blue">{{ old('description_fr', $value?->description_fr) }}</textarea>
        <x-input-error :messages="$errors->get('description_fr')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="description_en" value="Description (EN)" />
        <textarea id="description_en" name="description_en" rows="3" required class="mt-1 block w-full rounded-md border-ywc-border text-sm shadow-sm focus:border-ywc-blue focus:ring-ywc-blue">{{ old('description_en', $value?->description_en) }}</textarea>
        <x-input-error :messages="$errors->get('description_en')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="icon_key" value="Icône" />
        <select id="icon_key" name="icon_key" class="mt-1 block w-full rounded-md border-ywc-border text-sm shadow-sm focus:border-ywc-blue focus:ring-ywc-blue">
            @foreach ($icons as $key => $label)
                <option value="{{ $key }}" @selected(old('icon_key', $value?->icon_key) === $key)>{{ $label }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('icon_key')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="order_column" value="Ordre d'affichage" />
        <x-text-input id="order_column" name="order_column" type="number" class="mt-1 block w-full" :value="old('order_column', $value?->order_column ?? 0)" />
        <x-input-error :messages="$errors->get('order_column')" class="mt-2" />
    </div>
</div>
