<?php

namespace App\Http\Livewire;

use App\Models\Indicator;
use Livewire\Component;

class ShowStrategicMap extends Component
{
    public $process_id;
    public $indicators = null;

    public function render()
    {
//        $this->indicatorsA = Indicator::where('process_id', $this->process_id)->where('level', 'Financiera')->get();
//        $this->indicatorsB = Indicator::where('process_id', $this->process_id)->where('level', 'Clientes')->get();
//        $this->indicatorsC = Indicator::where('process_id', $this->process_id)->where('level', 'Procesos Internos')->get();
//        $this->indicatorsD = Indicator::where('process_id', $this->process_id)->where('level', 'Aprendizaje y Crecimiento')->get();
        $indicators = Indicator::where('process_id', $this->process_id)->get();
        $this->indicators = compact('indicators');
        return view('livewire.show-strategic-map');
    }
}
