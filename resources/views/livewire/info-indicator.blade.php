<div>
    <div class="flex">
        <a wire:click="$set('open',true)"
           class="cursor-pointer border border-blue-400 bg-blue-400 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-blue-600 focus:outline-none focus:shadow-outline">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </a>
    </div>
    <x-jet-dialog-modal wire:model="open" maxWidth="6xl">
        <x-slot name='title'>
            <p class="font-bold">
                Tablero de Control
            </p>
        </x-slot>
        <x-slot name='content'>
            <div class="grid grid-cols-4 grid-rows-2 gap-4">
                <div class="">
                    <p class="text-center my-2">Objetivo</p>
                    <div class="rounded-full h-44 w-52 border-2 border-green-400 mx-auto flex justify-center items-center text-center px-2">
                        {{$indicator->controlpanel->objective}}
                    </div>
                </div>
                <div class="">
                    <p class="text-center my-2">Indicador</p>
                    <div class="rounded-lg h-44 w-60 border-2 border-green-400 bg-green-100 mx-auto flex justify-center items-center text-center px-2">
                        {{$indicator->name}}
                    </div>
                </div>
                <div class="">
                    <p class="text-center my-2">Meta</p>
                    <div class="rounded-full h-44 w-52 border-2 border-green-400 mx-auto flex justify-center items-center text-center px-2">
                        {{$indicator->controlpanel->goal}}
                    </div>
                </div>
                <div class="">
                    <p class="text-center my-2">Semaforo</p>
                    <div class="rounded-lg h-44 w-60 border-2 border-green-400 mx-auto flex justify-center items-center px-2">
                        <ul>
                            <li class="flex">
                                <div class="rounded-full bg-red-600 h-4 w-4 mr-2"></div>
                                {{$indicator->controlpanel->bad_range}}
                            </li>
                            <li class="flex">
                                <div class="rounded-full bg-yellow-400 h-4 w-4 mr-2"></div>
                                {{$indicator->controlpanel->regular_range}}
                            </li>
                            <li class="flex">
                                <div class="rounded-full bg-green-400 h-4 w-4 mr-2"></div>
                                {{$indicator->controlpanel->good_range}}
                            </li>
                        </ul>
                    </div>
                </div>
                <div></div>
                <div class="col-span-2 px-2">
                    <p class="text-center my-2">Iniciativas</p>
                    <div class="rounded-lg h-44 w-full border-2 border-green-400 mx-auto flex justify-center items-center text-center px-2">
                        {{$indicator->controlpanel->iniciatives}}
                    </div>
                </div>
                <div class="">
                    <p class="text-center my-2">Responsable</p>
                    <div class="rounded-lg h-44 w-60 border-2 border-green-400 mx-auto flex justify-center items-center text-center px-2">
                        {{$indicator->controlpanel->responsable}}
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name='footer'>
{{--            <x-jet-button form="FormUpdateIndicator{{$indicator->id}}" wire:loading.attr='disabled' wire:target="update">Guardar</x-jet-button>--}}
            <x-jet-secondary-button wire:click="$set('open',false)">Cancelar</x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
