<?php

namespace App\Http\Livewire;

use App\Models\Indicator;
use App\Models\StrategicMap;
use Dflydev\DotAccessData\Data;
use Livewire\Component;

class ShowStrategicMap extends Component
{
    public $process_id;
    public $indicators = null;

    public function render()
    {
        $strategic_map = StrategicMap::where('process_id',$this->process_id);
        if ($strategic_map->count()>0){
            $this->indicators = $strategic_map->first()->data;
        }
        return view('livewire.show-strategic-map');
    }
}
