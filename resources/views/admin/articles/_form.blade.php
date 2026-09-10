@php
    $article = $article ?? null;
@endphp

<div class="grid gap-4 sm:grid-cols-2">
    <div>
        <x-input-label for="title_fr" value="Titre (FR)" />
        <x-text-input id="title_fr" name="title_fr" class="mt-1 block w-full" :value="old('title_fr', $article?->title_fr)" required />
        <x-input-error :messages="$errors->get('title_fr')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="title_en" value="Titre (EN)" />
        <x-text-input id="title_en" name="title_en" class="mt-1 block w-full" :value="old('title_en', $article?->title_en)" required />
        <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
    </div>
</div>

<div>
    <x-input-label for="slug" value="Slug (URL)" />
    <x-text-input id="slug" name="slug" class="mt-1 block w-full" :value="old('slug', $article?->slug)" placeholder="laisser vide pour générer depuis le titre FR" />
    <p class="mt-1 text-xs text-ywc-text-muted">URL publique : {{ url('/blog') }}/<span class="font-mono">{{ old('slug', $article?->slug) ?: '...' }}</span></p>
    <x-input-error :messages="$errors->get('slug')" class="mt-2" />
</div>

<div class="grid gap-4 sm:grid-cols-2">
    <div>
        <x-input-label for="excerpt_fr" value="Extrait / chapô (FR)" />
        <x-text-input id="excerpt_fr" name="excerpt_fr" class="mt-1 block w-full" :value="old('excerpt_fr', $article?->excerpt_fr)" required />
        <p class="mt-1 text-xs text-ywc-text-muted">Utilisé sur la carte de la liste et comme meta description.</p>
        <x-input-error :messages="$errors->get('excerpt_fr')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="excerpt_en" value="Extrait / chapô (EN)" />
        <x-text-input id="excerpt_en" name="excerpt_en" class="mt-1 block w-full" :value="old('excerpt_en', $article?->excerpt_en)" required />
        <x-input-error :messages="$errors->get('excerpt_en')" class="mt-2" />
    </div>
</div>

<p class="text-xs text-ywc-text-muted">Le contenu accepte du HTML simple (&lt;h2&gt;, &lt;h3&gt;, &lt;p&gt;, &lt;ul&gt;/&lt;li&gt;, &lt;a&gt;, &lt;strong&gt;) — même mise en forme que les autres pages du site.</p>

<div>
    <x-input-label for="content_fr" value="Contenu (FR)" />
    <textarea id="content_fr" name="content_fr" rows="16" required class="mt-1 block w-full rounded-md border-ywc-border font-mono text-xs shadow-sm focus:border-ywc-blue focus:ring-ywc-blue">{{ old('content_fr', $article?->content_fr) }}</textarea>
    <x-input-error :messages="$errors->get('content_fr')" class="mt-2" />
</div>
<div>
    <x-input-label for="content_en" value="Contenu (EN)" />
    <textarea id="content_en" name="content_en" rows="16" required class="mt-1 block w-full rounded-md border-ywc-border font-mono text-xs shadow-sm focus:border-ywc-blue focus:ring-ywc-blue">{{ old('content_en', $article?->content_en) }}</textarea>
    <x-input-error :messages="$errors->get('content_en')" class="mt-2" />
</div>

<div class="grid gap-4 sm:grid-cols-2">
    <div>
        <x-input-label for="cover_image" value="Image de couverture" />
        <input id="cover_image" name="cover_image" type="file" accept="image/*" class="mt-1 block w-full text-sm text-ywc-text-soft">
        @if ($article?->cover_image)
            <img src="{{ asset('storage/' . $article->cover_image) }}" alt="" class="mt-2 h-20 w-32 rounded-lg border border-ywc-border object-cover">
        @endif
        <x-input-error :messages="$errors->get('cover_image')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="published_at" value="Date de publication" />
        <input id="published_at" name="published_at" type="datetime-local" class="mt-1 block w-full rounded-md border-ywc-border text-sm shadow-sm focus:border-ywc-blue focus:ring-ywc-blue" value="{{ old('published_at', $article?->published_at?->format('Y-m-d\TH:i')) }}">
        <p class="mt-1 text-xs text-ywc-text-muted">Laisser vide pour publier immédiatement dès que « Publié » est coché.</p>
        <x-input-error :messages="$errors->get('published_at')" class="mt-2" />
    </div>
</div>

<label class="flex items-center gap-2.5 text-sm font-semibold text-ywc-ink">
    <input type="hidden" name="is_published" value="0">
    <input type="checkbox" id="is_published" name="is_published" value="1" class="rounded border-ywc-border text-ywc-blue focus:ring-ywc-blue" @checked(old('is_published', $article?->is_published))>
    Publié (visible sur le site)
</label>
