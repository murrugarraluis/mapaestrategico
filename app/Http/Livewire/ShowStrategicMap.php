<?php

namespace App\Http\Livewire;

use App\Models\Indicator;
use App\Models\StrategicMap;
use Dflydev\DotAccessData\Data;
use Livewire\Component;
use Exception;
class ShowStrategicMap extends Component
{
    public $process_id;
    public $indicators = null;
    protected $listeners = ['store'];
    public function render()
    {
        $strategic_map = StrategicMap::where('process_id',$this->process_id);
        if ($strategic_map->count()>0){
            $this->indicators = $strategic_map->first()->data;
        }
        return view('livewire.show-strategic-map');
    }
    public function store($data){
        try {
            $strategic_map = StrategicMap::where('process_id',$this->process_id);
            $strategic_map->update([
                'data' => $data,
            ]);
            $this->emit('alert','Cambios Guardados');
            $this->redirect('/procesos');
        } catch (Exception $e) {
            $this->emit('error',$e->getMessage());
        }
    }
}
