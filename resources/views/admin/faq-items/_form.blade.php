@php
    $faqItem = $faqItem ?? null;
@endphp

<div class="grid gap-4 sm:grid-cols-2">
    <div>
        <x-input-label for="question_fr" value="Question (FR)" />
        <x-text-input id="question_fr" name="question_fr" class="mt-1 block w-full" :value="old('question_fr', $faqItem?->question_fr)" required />
        <x-input-error :messages="$errors->get('question_fr')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="question_en" value="Question (EN)" />
        <x-text-input id="question_en" name="question_en" class="mt-1 block w-full" :value="old('question_en', $faqItem?->question_en)" required />
        <x-input-error :messages="$errors->get('question_en')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="answer_fr" value="Réponse (FR)" />
        <textarea id="answer_fr" name="answer_fr" rows="4" required class="mt-1 block w-full rounded-md border-ywc-border text-sm shadow-sm focus:border-ywc-blue focus:ring-ywc-blue">{{ old('answer_fr', $faqItem?->answer_fr) }}</textarea>
        <x-input-error :messages="$errors->get('answer_fr')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="answer_en" value="Réponse (EN)" />
        <textarea id="answer_en" name="answer_en" rows="4" required class="mt-1 block w-full rounded-md border-ywc-border text-sm shadow-sm focus:border-ywc-blue focus:ring-ywc-blue">{{ old('answer_en', $faqItem?->answer_en) }}</textarea>
        <x-input-error :messages="$errors->get('answer_en')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="order_column" value="Ordre d'affichage" />
        <x-text-input id="order_column" name="order_column" type="number" class="mt-1 block w-full" :value="old('order_column', $faqItem?->order_column ?? 0)" />
        <x-input-error :messages="$errors->get('order_column')" class="mt-2" />
    </div>
</div>
