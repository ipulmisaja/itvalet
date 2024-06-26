<aside id="sidebar" aria-label="Sidebar"
    class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 hidden w-64 h-full pt-16 font-normal lg:flex duration-100 ease-linear">
    <div
        class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white lg:bg-gray-100 border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700 lg:dark:bg-gray-900">
        <div
            class="flex flex-col flex-1 pt-5 pb-28 overflow-y-auto scrollbar scrollbar-w-2 scrollbar-thumb-rounded-[0.1667rem] scrollbar-thumb-slate-200 scrollbar-track-gray-400 dark:scrollbar-thumb-slate-900 dark:scrollbar-track-gray-800">
            <div class="flex-1 px-3 space-y-1 bg-white lg:bg-gray-100 divide-y divide-gray-200 dark:bg-gray-800 lg:dark:bg-gray-900 dark:divide-gray-700"
                x-data="{ selected: $persist('Dashboard') }">
                {{-- Menu List --}}
                <div class="mt-5 px-4">
                    {{-- Menu Utama --}}
                    <div>
                        <h3 class="mb-4 font-medium text-base text-gray-900 dark:text-white">MENU</h3>

                        {{-- Dashboard --}}
                        <x-pages.navigation.menu :route="route('dashboard')" :path="request()->routeIs('dashboard')
                            ? 'font-extrabold text-gray-900 dark:text-white'
                            : 'font-normal text-gray-500 dark:text-gray-400'" class="mb-4" icon="squares-2x2"
                            page="Dashboard" title="Dashboard" />

                        {{-- Layanan TI --}}
                        <x-pages.navigation.menu :route="route('request')" :path="request()->routeIs('request') || request()->routeIs('request.*')
                            ? 'font-extrabold text-gray-900 dark:text-white'
                            : 'font-normal text-gray-500 dark:text-gray-400'" class="mb-4" icon="ticket"
                            page="Request" title="Layanan" />

                        {{-- Perangkat Lunak --}}
                        <x-pages.navigation.menu :route="route('software')" :path="request()->routeIs('software') || request()->routeIs('software.*')
                            ? 'font-extrabold text-gray-900 dark:text-white'
                            : 'font-normal text-gray-500 dark:text-gray-400'" class="mb-4"
                            icon="code-bracket-square" page="Software" title="Perangkat Lunak" />

                        @role('admin|umum')
                            {{-- Perangkat --}}
                            <x-pages.navigation.menu :route="route('device')" :path="request()->routeIs('device') || request()->routeIs('device.*')
                                ? 'font-extrabold text-gray-900 dark:text-white'
                                : 'font-normal text-gray-500 dark:text-gray-400'" class="mb-4" icon="server-stack"
                                page="Hardware" title="Perangkat Keras" />

                            {{-- Alokasi --}}
                            <x-pages.navigation.menu :route="route('device-state')" :path="request()->routeIs('device-state') || request()->routeIs('device-state.*')
                                ? 'font-extrabold text-gray-900 dark:text-white'
                                : 'font-normal text-gray-500 dark:text-gray-400'" class="mb-4" icon="swatch"
                                page="State" title="Alokasi" />
                        @endrole

                        @canany(['read-device-maintenance', 'create-device-maintenance', 'update-device-maintenance'])
                            {{-- Pemeliharaan --}}
                            <x-pages.navigation.menu :route="route('device-maintenance')" :path="request()->routeIs('device-maintenance') ||
                            request()->routeIs('device-maintenance.*')
                                ? 'font-extrabold text-gray-900 dark:text-white'
                                : 'font-normal text-gray-500 dark:text-gray-400'" class="mb-4"
                                icon="wrench-screwdriver" page="Maintenance" title="Pemeliharaan" />
                        @endcanany

                        {{-- Jaringan --}}

                        {{-- Knowledge Managemen --}}

                        {{-- Perangkat TI --}}
                        {{-- <x-pages.navigation.collapse-menu page="Device" icon="server-stack" label="Perangkat Keras"
                            :class="request()->is('perangkat-ti/*') ? 'text-gray-900 dark:text-white' : 'text-gray-500 dark:text-gray-400'"
                            :verticalborder="request()->is('perangkat-ti/*') ? '' : 'opacity-50'">
                            <x-pages.navigation.submenu :route="route('device')" title="Daftar"
                                :path="request()->routeIs('device') || request()->routeIs('device.*') ? 'text-gray-900 dark:text-white' : 'text-gray-500 dark:text-gray-400'" />

                            <x-pages.navigation.submenu :route="route('device-state')" title="Status Perangkat"
                                :path="request()->routeIs('device-state') || request()->routeIs('device-state.*') ? 'text-gray-900 dark:text-white' : 'text-gray-500 dark:text-gray-400'" />

                            <x-pages.navigation.submenu :route="route('device-maintenance')" title="Pemeliharaan"
                                :path="request()->routeIs('device-maintenance') || request()->routeIs('device-maintenance.*') ? 'text-gray-900 dark:text-white' : 'text-gray-500 dark:text-gray-400'" />
                        </x-pages.navigation.collapse-menu>
                    </div> --}}

                        @role('admin')
                            {{-- Pengaturan --}}
                            <div class="mt-10">
                                <h3 class="mb-4 font-medium text-base text-gray-900 dark:text-white">PENGATURAN</h3>

                                {{-- User --}}
                                <x-pages.navigation.menu :route="route('user')" :path="request()->routeIs('user') || request()->routeIs('user.*')
                                    ? 'font-extrabold text-gray-900 dark:text-white'
                                    : 'font-normal text-gray-500 dark:text-gray-400'" class="mb-4"
                                    icon="user-circle" page="User" title="Pengguna" />

                                {{-- Role --}}
                                <x-pages.navigation.menu :route="route('role-permission')" :path="request()->routeIs('role-permission') ||
                                request()->routeIs('role-permission.*')
                                    ? 'font-extrabold text-gray-900 dark:text-white'
                                    : 'font-normal text-gray-500 dark:text-gray-400'" class="mb-4" icon="key"
                                    page="rolepermission" title="Hak Akses" />

                                <x-pages.navigation.menu :route="route('webhook')" :path="request()->routeIs('webhook') || request()->routeIs('webhook.*')
                                    ? 'font-extrabold text-gray-900 dark:text-white'
                                    : 'font-normal text-gray-500 dark:text-gray-400'" class="mb-4"
                                    icon="rocket-launch" page="webhook" title="Webhook" />

                                <x-pages.navigation.menu :route="env('APP_URL') . '/log-viewer'" :path="request()->is('log-viewer')
                                    ? 'font-extrabold text-gray-900 dark:text-white'
                                    : 'font-normal text-gray-500 dark:text-gray-400'" class="mb-4"
                                    icon="document-magnifying-glass" page="log" title="Log" />
                            </div>
                        @endrole
                    </div>
                </div>
            </div>
        </div>
</aside>

<div class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>
