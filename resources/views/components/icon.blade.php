@props(['name', 'class' => 'h-5 w-5'])

@php
  $paths = [
    'compass' => '<circle cx="12" cy="12" r="9" stroke-width="1.6"/><path stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" d="M15.3 8.7l-2.1 4.5-4.5 2.1 2.1-4.5 4.5-2.1z"/>',
    'users' => '<path stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" d="M17 20v-1a4 4 0 00-4-4H7a4 4 0 00-4 4v1"/><circle cx="10" cy="7.5" r="3" stroke-width="1.6"/><path stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" d="M21 20v-1a3.5 3.5 0 00-2.5-3.36M15.5 4.13a3 3 0 010 5.74"/>',
    'link' => '<path stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5l-3 3m-2.5.3l-1.3 1.3a3 3 0 004.24 4.24l1.3-1.3M10.5 13.5l3-3m2.5-.3l1.3-1.3a3 3 0 00-4.24-4.24l-1.3 1.3"/>',
    'bolt' => '<path stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" d="M13 2.5L4.5 14h6l-1 7.5 8.5-11.5h-6l1-7.5z"/>',
    'signal' => '<path stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" d="M7.8 11.8a4 4 0 018.4 0M4.9 8.5a8.5 8.5 0 0114.2 0"/><circle cx="12" cy="19" r="1.2" fill="currentColor" stroke="none"/>',
    'cart' => '<path stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" d="M3 4h2.2l2.3 11.4a2 2 0 002 1.6h6.8a2 2 0 002-1.6L20 8H6.2"/><circle cx="9.5" cy="20" r="1.1" stroke="none" fill="currentColor"/><circle cx="17.5" cy="20" r="1.1" stroke="none" fill="currentColor"/>',
    'bank' => '<path stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" d="M3 21h18M4 21V10M20 21V10M2.5 10l9.5-6 9.5 6M6.5 21v-7M11.5 21v-7M16.5 21v-7"/>',
    'office' => '<rect x="4.5" y="3" width="15" height="18" rx="1.2" stroke-width="1.6"/><path stroke-width="1.6" stroke-linecap="round" d="M8.5 7.5h1.2M14.3 7.5h1.2M8.5 11.5h1.2M14.3 11.5h1.2M8.5 15.5h1.2M14.3 15.5h1.2"/>',
    'video' => '<rect x="3" y="6.5" width="12" height="11" rx="2" stroke-width="1.6"/><path stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" d="M15 10.3l6-3.1v9.6l-6-3.1"/>',
    'star' => '<path stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" d="M12 3.5l2.5 5.4 5.9.6-4.4 4 1.3 5.8L12 16.4l-5.3 2.9 1.3-5.8-4.4-4 5.9-.6L12 3.5z"/>',
    'rocket' => '<path stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" d="M21 3L3 10.5l7.5 3L14 21l7-18z"/><path stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" d="M10.5 13.5L21 3"/>',
    'wrench' => '<path stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" d="M14.9 6.4a4 4 0 00-5.5 5.2L4 17l3 3 5.4-5.4a4 4 0 005.2-5.5l-2.6 2.6-2.3-2.3 2.6-2.6z"/>',
    'trending-up' => '<path stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" d="M3 17l6-6 4 4 8-8M15.5 7h5.5v5.5"/>',
    'clipboard' => '<rect x="6" y="4.5" width="12" height="16.5" rx="2" stroke-width="1.6"/><path stroke-width="1.6" stroke-linecap="round" d="M9.5 4.5v-1a1 1 0 011-1h3a1 1 0 011 1v1M9 11.5h6M9 15.5h6"/>',
    'map-pin' => '<path stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" d="M12 21s7-7.2 7-11.8a7 7 0 10-14 0C5 13.8 12 21 12 21z"/><circle cx="12" cy="9.2" r="2.4" stroke-width="1.6"/>',
    'check' => '<path stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>',
    'key' => '<circle cx="7.5" cy="15.5" r="3.2" stroke-width="1.6"/><path stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" d="M9.8 13.2L18 5m0 0l2 2-2.2 2.2m2.2-2.2l-2 2m-1.6 1.6l2 2"/>',
    'list' => '<path stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" d="M8.5 6.5h11M8.5 12h11M8.5 17.5h11M4.5 6.5h.01M4.5 12h.01M4.5 17.5h.01"/>',
    'message' => '<path stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" d="M4 5.5h16a1 1 0 011 1V15a1 1 0 01-1 1H9l-4.5 4V16H4a1 1 0 01-1-1V6.5a1 1 0 011-1z"/>',
    'target' => '<circle cx="12" cy="12" r="8.5" stroke-width="1.6"/><circle cx="12" cy="12" r="5" stroke-width="1.6"/><circle cx="12" cy="12" r="1.4" fill="currentColor" stroke="none"/>',
    'pulse' => '<path stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" d="M2.5 12h4l2.2-6 3 12 2.3-9 1.7 3h5.8"/>',
    'search' => '<circle cx="10.5" cy="10.5" r="6.5" stroke-width="1.6"/><path stroke-width="1.6" stroke-linecap="round" d="M15.3 15.3L20.5 20.5"/>',
  ];
@endphp

<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" class="{{ $class }}" aria-hidden="true">{!! $paths[$name] ?? $paths['check'] !!}</svg>
