@php
    $portfolioItem = $portfolioItem ?? null;
    $categories = \App\Models\PortfolioItem::CATEGORIES;
    $sizes = \App\Models\PortfolioItem::SIZES;
@endphp

<div class="grid gap-4 sm:grid-cols-2">
    <div>
        <x-input-label for="title_fr" value="Titre (FR)" />
        <x-text-input id="title_fr" name="title_fr" class="mt-1 block w-full" :value="old('title_fr', $portfolioItem?->title_fr)" required />
        <x-input-error :messages="$errors->get('title_fr')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="title_en" value="Titre (EN)" />
        <x-text-input id="title_en" name="title_en" class="mt-1 block w-full" :value="old('title_en', $portfolioItem?->title_en)" required />
        <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="description_fr" value="Description courte (FR)" />
        <x-text-input id="description_fr" name="description_fr" class="mt-1 block w-full" :value="old('description_fr', $portfolioItem?->description_fr)" required />
        <x-input-error :messages="$errors->get('description_fr')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="description_en" value="Description courte (EN)" />
        <x-text-input id="description_en" name="description_en" class="mt-1 block w-full" :value="old('description_en', $portfolioItem?->description_en)" required />
        <x-input-error :messages="$errors->get('description_en')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="category" value="Catégorie (filtre)" />
        <select id="category" name="category" required class="mt-1 block w-full rounded-md border-ywc-border text-sm shadow-sm focus:border-ywc-blue focus:ring-ywc-blue">
            @foreach ($categories as $category)
                <option value="{{ $category }}" @selected(old('category', $portfolioItem?->category) === $category)>{{ $category }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('category')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="size" value="Taille dans la grille" />
        <select id="size" name="size" required class="mt-1 block w-full rounded-md border-ywc-border text-sm shadow-sm focus:border-ywc-blue focus:ring-ywc-blue">
            @foreach ($sizes as $size)
                <option value="{{ $size }}" @selected(old('size', $portfolioItem?->size ?? 'normal') === $size)>{{ $size }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('size')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="order_column" value="Ordre d'affichage" />
        <x-text-input id="order_column" name="order_column" type="number" class="mt-1 block w-full" :value="old('order_column', $portfolioItem?->order_column ?? 0)" />
        <x-input-error :messages="$errors->get('order_column')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="image" value="Image" />
        <input id="image" name="image" type="file" accept="image/*" class="mt-1 block w-full text-sm text-ywc-text-soft" @required(! $portfolioItem) />
        @if ($portfolioItem?->image)
            <img src="{{ asset('storage/' . $portfolioItem->image) }}" alt="" class="mt-2 h-16 rounded-lg border border-ywc-border object-cover">
        @endif
        <x-input-error :messages="$errors->get('image')" class="mt-2" />
    </div>
</div>
