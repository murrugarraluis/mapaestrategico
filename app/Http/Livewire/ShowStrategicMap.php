<?php

namespace App\Http\Livewire;

use App\Models\Indicator;
use App\Models\Process;
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
        $process = Process::find($this->process_id);
        return view('livewire.show-strategic-map',compact('process'));
    }
    public function store($data){
        try{
//            Extraer Seccion de Links de la Data
            $link_data = json_decode($data);
            $link_json = json_encode($link_data->linkDataArray);
//            Quitar corchetes de link_json
            $link = substr($link_json, 1, -1);

            $strategic_map = StrategicMap::where('process_id',$this->process_id);
            $strategic_map->update([
                'data' => $data,
                'link' => $link,
            ]);
            $this->emit('alert','Cambios Guardados');
            $this->redirect('/procesos');
        } catch (Exception $e) {
            $this->emit('error',$e->getMessage());
        }
    }
}
