<?php

namespace App\Http\Livewire;

use App\Models\Indicator;
use Livewire\Component;

class InfoIndicator extends Component
{
    public $open = false;
    public $indicator;
    public function render()
    {
        return view('livewire.info-indicator');
    }
    public function mount(Indicator $indicator)
    {
        $this->indicator = $indicator;
    }
}
