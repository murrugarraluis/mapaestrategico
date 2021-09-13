<?php

namespace App\Http\Livewire;

use App\Models\Process;
use App\Models\StrategicMap;
use Livewire\Component;
use Exception;
class CreateIndicator extends Component
{
    public $open = false;
    public $process_id;
    public $name,$level,$formula,$objective,$frequency,$goal,$bad_range,$regular_range,$good_range,$iniciatives,$responsable;
    protected $rules = [
        'name' => 'required',
        'level' => 'required',
        'formula' => 'required',
        'objective' => 'required',
        'frequency' => 'required',
        'goal' => 'required',
        'bad_range' => 'required',
        'regular_range' => 'required',
        'good_range' => 'required',
        'iniciatives' => 'required',
        'responsable' => 'required',
    ];
    public function render()
    {
        return view('livewire.create-indicator');
    }
    public function store()
    {
        try {
            $this->validate();
            $process = Process::find($this->process_id);
            $indicator = $process->indicators()->create([
                'name' => trim(ucfirst($this->name)),
                'level' => trim(ucfirst($this->level)),
            ]);
            $indicator->controlpanel()->create([
                'formula'=>trim(ucfirst($this->formula)),
                'objective'=>trim(ucfirst($this->objective)),
                'frequency'=>trim(ucfirst($this->frequency)),
                'goal'=>trim(ucfirst($this->goal)),
                'bad_range'=>trim(ucfirst($this->bad_range)),
                'regular_range'=>trim(ucfirst($this->regular_range)),
                'good_range'=>trim(ucfirst($this->good_range)),
                'iniciatives'=>trim(ucfirst($this->iniciatives)),
                'responsable'=>trim(ucfirst($this->responsable)),
            ]);
//           Almacenar Indicador en Mapa Estrategico
//              Agregar Indicador a grupo de nodos
            $indicator = ',{"group":"'.trim(ucfirst($this->level)).'","key":"'.trim(ucfirst($this->name)).'","loc":"50 100"}';
            $node = StrategicMap::where('process_id',$this->process_id)->first()->node;
            $node.= $indicator;
//            Agrupar indicador a DATA en formato JSON
            $data = '{ "class": "GraphLinksModel", "nodeDataArray": ['.$node.'],"linkDataArray": []}';

//            Actualizar Campo Data
            $strategic_map = StrategicMap::where('process_id',$this->process_id)->first();
            $strategic_map->update([
               'data'=>$data,
                'node'=>$node,
            ]);

            $this->default();
            $this->emitTo('show-indicator', 'render');
            $this->emit('alert', 'Indicador Agregado');
        } catch (Exception $e) {
            $this->emit('error', $e->getMessage());
        }
    }
    public function open()
    {
        $this->default();
        $this->open = true;
    }
    public function default()
    {
        $this->reset(['open', 'name']);
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
