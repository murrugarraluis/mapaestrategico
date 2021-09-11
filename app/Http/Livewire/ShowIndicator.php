<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowIndicator extends Component
{
    public $process;
    public function render()
    {
        return view('livewire.show-indicator');
    }
}
