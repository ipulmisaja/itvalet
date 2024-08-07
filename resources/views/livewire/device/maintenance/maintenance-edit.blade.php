<div>
    <section class="px-4 pt-8 sm:px-6">
        {{-- Title --}}
        <x-pages.page-title title="Informasi Pemeliharaan Perangkat" />

        {{-- Content --}}
        <div class="mb-6 mt-10">
            <div class="w-full overflow-x-auto rounded-md bg-white dark:bg-gray-800 shadow">
                <form wire:submit="submitData">
                    <div class="flex flex-wrap p-6">
                        {{-- Penjelasan Entri Perangkat TI --}}
                        <x-forms.attributes.information title="Informasi Perangkat"
                            description="Informasi perangkat yang akan dilakukan pemeliharaan atau perbaikan." />

                        {{-- Form Entri --}}
                        <div class="w-full lg:w-2/3">
                            {{-- Perangkat --}}
                            <x-forms.inputs.text model="form.device_name" label="Nama Perangkat" option=true
                                type="text" />

                            {{-- Kondisi --}}
                            <x-forms.inputs.select model="form.condition" label="Kondisi Perangkat" :optitem="$conditionOpt"
                                placeholder="Pilih kondisi perangkat ..." :disabled="true" />

                            {{-- Deskripsi Permasalahan --}}
                            <x-forms.inputs.trix model="form.description" label="Deskripsi" />
                        </div>
                    </div>
                    <hr>
                    <div class="flex flex-wrap p-6">
                        {{-- Penjelasan Entri Perangkat TI --}}
                        <x-forms.attributes.information title="Status Pemeliharaan"
                            description="Progress pemeliharaan perangkat serta pembiayaan pemeliharaan." />

                        {{-- Form Entri --}}
                        <div class="w-full lg:w-2/3">
                            <x-forms.inputs.select model="form.maintenance" label="Status Perbaikan" :optitem="$actionOpt"
                                placeholder="Status Perbaikan ..." />

                            {{-- Deskripsi Permasalahan --}}
                            <x-forms.inputs.select model="form.repair" label="Perbaikan Diluar" :optitem="$repairOpt"
                                placeholder="Perbaikan Diluar" />
                        </div>
                    </div>
                    <div
                        class="flex place-items-center rounded-b-md border-gray-200 bg-gray-200 dark:bg-gray-700 px-6 py-4">
                        <x-forms.attributes.save-button />
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
