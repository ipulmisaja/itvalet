@persist('notification_persist')
    <div
        class="z-10 pointer-events-none fixed inset-0 flex place-items-end justify-center px-4 py-6 sm:items-start sm:justify-end sm:p-6">
        <div wire:ignore x-cloak x-data="{ show: false, message: '' }"
            x-on:notify.window="show = true; message = $event.detail; setTimeout(() => { show = false }, 5000)" x-show="show"
            x-transition:enter="transform ease-out duration-300 transition"
            x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
            x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
            x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="pointer-events-auto mt-16 w-full max-w-sm rounded-lg bg-gray-50 dark:bg-gray-700 shadow">
            <div class="p-4">
                <div class="flex place-items-center">
                    <div class="flex-shrink-0 text-primary-600 dark:text-white">
                        <x-icons.herosolid name="information-circle" class="h-6 w-6" />
                    </div>
                    <div class="ml-3 w-0 flex-1 pt-0.5">
                        <p x-text="message" class="text-sm font-medium leading-5 text-gray-700 dark:text-white"></p>
                    </div>
                    <div class="ml-4 flex flex-shrink-0">
                        <button @click="show = false"
                            class="inline-flex text-gray-400 transition duration-150 ease-in-out focus:text-gray-500 focus:outline-none">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpersist
