@section('title','Registrar dispositivo')
<div class="">

    <x-modal wire:model='viewQr'>
        <div class="flex flex-col">
            <div class="p-3 px-5 flex justify-between">
                <h4 class="text-xl font-semibold">Codigo QR</h4>
                <div class="">
                    <button class="text-xl font-semibold">X</button>
                </div>
            </div>
            <div class="flex flex-col items-center justify-center p-6">
                <img src="{{$qrCode}}" class="w-72 h-72 border-4 border-gray-200" alt="">
                <div class="text-left  w-full">
                    <span>{{$uuid}}</span>
                </div>

            </div>
        </div>
    </x-modal>
    <div class="flex flex-col justify-center items-center mt-5">
        <div class="bg-white w-4/5 p-12 flex flex-col gap-12">
            @session('message')
            <div x-data="{ alertIsVisible: $wire.succesAlert}" x-show="alertIsVisible"
                class=" relative w-full overflow-hidden rounded-xl border border-green-600 bg-white text-slate-700 dark:bg-slate-900 dark:text-slate-300"
                role="alert" x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                <div class="flex w-full items-center gap-2 bg-green-600/10 p-4">
                    <div class="bg-green-600/15 text-green-600 rounded-full p-1" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-6"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-2">
                        <h3 class="text-sm font-semibold text-green-600">Creación exitosa</h3>
                        <p class="text-xs font-medium sm:text-sm">Recuerde que puede recorar el UUID
                            cuando desee</p>
                    </div>
                </div>
            </div>
            @endsession

            <div class="grid grid-cols-2 gap-4">
                <div class="">
                    <div class="">
                        <h4 class="text-2xl">Nombre del dispositivo</h4>
                        <span>nombre con el cual se identificara el dispositivo</span>
                    </div>
                </div>
                <div class="w-full">
                    <div class="w-full">
                        <label for="deviceName"></label>
                        <input class="w-full rounded-lg" type="text" wire:model.live='name' name="deviceName"
                            placeholder="Casa de verano">
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <h4 class="text-2xl">identificador del dispositivo</h4>
                        <span>numero permanenete con el que se identifica en el sistema</span>

                    </div>
                </div>
                <div class="w-full">
                    <div class="w-full">
                        <label for="deviceName"></label>
                        <input class="w-full rounded-lg" type="text" disabled wire:model.live='uuid' name="deviceName"
                            placeholder="UUID">
                    </div>

                </div>
                <div class="">
                    <div class="">
                        <h4 class="text-2xl">fecha de creacion del dispositivo</h4>
                        <span>fecha de vinculacion al sistema</span>
                    </div>
                </div>
                <div class="w-full">
                    <div class="w-full">
                        <label for="deviceName"></label>
                        <input class="w-full rounded-lg" type="date" disabled wire:model.live='createDate'
                            name="deviceName">
                    </div>
                </div>
            </div>
            <div class="flex gap-2 justify-end">
                <button wire:click='store'
                    class="bg-green-400 py-2 px-2 text-white rounded-lg hover:bg-green-500">Guardar</button>
                <a href="{{route('home')}}"
                    class="bg-red-500 py-2 px-2 block text-white rounded-lg hover:bg-red-600">Cancelar</a>
                @if ($uuid)

                <button wire:click='viewQrCode'
                    class="bg-sky-500 py-2 px-2 text-white rounded-lg hover:bg-sky-600">Copiar UUID</button>
                @endif
            </div>



        </div>
    </div>
</div>