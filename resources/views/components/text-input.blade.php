@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-ywc-border focus:border-ywc-blue focus:ring-ywc-blue rounded-md shadow-sm']) }}>
