@props(['text', 'highlightClass' => ''])

@php
    $lines = explode("\n", $text);
    $last = array_pop($lines);
@endphp

@foreach ($lines as $line)
    {{ $line }}<br>
@endforeach
<span class="{{ $highlightClass }}">{{ $last }}</span>
