<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-ywc-blue border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-ywc-blue-mid focus:bg-ywc-blue-mid active:bg-ywc-blue-mid focus:outline-none focus:ring-2 focus:ring-ywc-blue focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
