<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('show-indicator',['process_id'=>$id])
            </div>
        </div>
    </div>
</x-app-layout>
