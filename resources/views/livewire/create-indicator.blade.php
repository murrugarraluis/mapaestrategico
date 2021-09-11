<div>
    <div class="relative">
        <button type="button" wire:click="open"
                class=" flex border border-green-400 bg-green-400 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">
            <p class="pr-2">Agregar</p>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </button>
    </div>
    <x-jet-dialog-modal wire:model="open" maxWidth="2xl">
        <x-slot name='title'>
            <p class="font-bold">
                Nuevo Indicador
            </p>
        </x-slot>
        <x-slot name='content'>
            <form id="myForm" wire:submit.prevent="store">
                <div class="">
                    <x-jet-label value="Nombre" class="mb-2"></x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model.defer="name" required></x-jet-input>
                </div>
                <div>
                    <x-jet-label value="Nivel" class="mb-2"></x-jet-label>
                    <select wire:model.defer="level"
                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm'" required>
                        <option value="" hidden>Seleccione</option>
                        <option>Financiera</option>
                        <option>Clientes</option>
                        <option>Procesos Internos</option>
                        <option>Aprendizaje y Crecimiento</option>
                    </select>
                </div>
            </form>
        </x-slot>
        <x-slot name='footer'>
            <x-jet-button form="myForm" wire:loading.attr='disabled' wire:target="store">Guardar</x-jet-button>
            <x-jet-secondary-button wire:click="$set('open',false)">Cancelar</x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
