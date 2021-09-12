<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowStrategicMap extends Component
{
    public $process_id;
    public function render()
    {
        return view('livewire.show-strategic-map');
    }
}
