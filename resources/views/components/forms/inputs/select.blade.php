<div class="mb-6 w-full">
    {{-- Label --}}
    <x-forms.attributes.label :label="$label ?? null" :labelinfo="$labelinfo ?? null" />

    {{-- Form --}}
    <select
        id="{{ $model }}"
        wire:model.{{ $method ?? null }}="{{ $model }}"
        placeholder="{{ $placeholder }}"
        @isset($disabled) disabled @endisset
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            <option hidden selected>{{ $placeholder ?? '...'}}</option>
            {!! $optitem !!}
    </select>

    {{-- Error Notification --}}
    @include('components.forms.attributes.error', ['model' => $model])
</div>
