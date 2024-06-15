<div class="bg-white rounded-lg mb-4 shadow-md w-full lg:w-max">
    <div class="bg-neutral-300 p-2 rounded-t-lg text-center">
        <span class="text-white text-sm font-medium tracking-wide px-4">
            Menunggu ({{ $data['menunggu'][0] ?? 0 }}) /
            Dijawab ({{ $data['dijawab'][0] ?? 0 }}) /
            Selesai ({{ $data['ditutup'][0] ?? 0 }})
        </span>
    </div>
    <div class="p-4 flex flex-nowrap place-items-center">
        <div class="bg-secondary-200 text-secondary-600 p-4 rounded-full">
            <x-icons.heroline name="clipboard-document-check" class="h-16 w-16" />
        </div>
        <div class="ml-6">
            <div class="text-base tracking-wide text-neutral-400 font-medium">Layanan TI yang Dikelola</div>
            <div class="flex flex-nowrap items-baseline">
                <span class="font-medium text-6xl mb-1 text-secondary-600">{{ $total }}</span>
                <span class="text-sm ml-1 font-medium text-neutral-500">laporan</span>
            </div>
        </div>
    </div>
</div>
