<div wire:ignore id="{{ $drawer }}"
    class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-80 dark:bg-gray-800"
    tabindex="-1" aria-labelledby="drawer-right-label">
    {{-- Header --}}
    <h5 id="drawer-right-label"
        class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
        <x-icons.herosolid name="{{ $icon }}" class="h-4 w-4 me-2.5" />
        {{ $title }}
    </h5>
    <button type="button" data-drawer-hide="{{ $drawer }}" aria-controls="{{ $drawer }}"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
        <x-icons.flowbite-solid name="close-modal" class="h-3 w-3" />
        <span class="sr-only">Close menu</span>
    </button>

    {{-- Content --}}
    {{ $slot }}
</div>
