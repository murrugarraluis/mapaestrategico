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
    public $name, $level, $formula, $objective, $frequency, $goal, $bad_range, $regular_range, $good_range, $iniciatives, $responsable;
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
                'formula' => trim(ucfirst($this->formula)),
                'objective' => trim(ucfirst($this->objective)),
                'frequency' => trim(ucfirst($this->frequency)),
                'goal' => trim(ucfirst($this->goal)),
                'bad_range' => trim(ucfirst($this->bad_range)),
                'regular_range' => trim(ucfirst($this->regular_range)),
                'good_range' => trim(ucfirst($this->good_range)),
                'iniciatives' => trim(ucfirst($this->iniciatives)),
                'responsable' => trim(ucfirst($this->responsable)),
            ]);
            if (StrategicMap::where('process_id', $this->process_id)->count()>0) {
//           Almacenar Indicador en Mapa Estrategico
//              Agregar Indicador a grupo de nodos
                $indicator = ',{"group":"' . trim(ucfirst($this->level)) . '","key":"' . trim(ucfirst($this->name)) . '","loc":"50 100"}';
                $link = StrategicMap::where('process_id', $this->process_id)->first()->link;
                $node = StrategicMap::where('process_id', $this->process_id)->first()->node;
                $node .= $indicator;
//            Agrupar indicador a DATA en formato JSON
                $data = '{ "class": "GraphLinksModel", "nodeDataArray": [' . $node . '],"linkDataArray": [' . $link . ']}';

//            Actualizar Campo Data
                $strategic_map = StrategicMap::where('process_id', $this->process_id)->first();
                $strategic_map->update([
                    'data' => $data,
                    'node' => $node,
                ]);
            }
            else{
                $process = Process::find($this->process_id);
                $data ='{ "class": "GraphLinksModel",
                  "nodeDataArray": [
                        {"key":"Pool1","text":"Mapa Estrategico","isGroup":true,"category":"Pool","loc":"26.59644317626953 0.5"},
                        {"key":"Financiera","text":"Financiera","isGroup":true,"group":"Pool1","color":"lightblue","loc":"53.11929067457747 0.5","size":"807 123","expanded":true,"savedBreadth":123},
                        {"key":"Clientes","text":"Clientes","isGroup":true,"group":"Pool1","color":"lightgreen","loc":"53.11929067457747 122.5","size":"807 103","expanded":true,"savedBreadth":103},
                        {"key":"Procesos Internos","text":"Procesos Internos","isGroup":true,"group":"Pool1","color":"yellow","loc":"53.11929067457747 224.5","size":"807 187","expanded":true,"savedBreadth":187},
                        {"key":"Aprendizaje y Crecimiento","text":"Aprendizaje y Crecimiento","isGroup":true,"group":"Pool1","color":"orange","loc":"53.119290674577485 410.5","size":"807 254","expanded":true,"savedBreadth":254},
                        ],
                        "linkDataArray": []}'
                ;
                $node = '{"key":"Pool1","text":"Mapa Estrategico","isGroup":true,"category":"Pool","loc":"26.59644317626953 0.5"},
                        {"key":"Financiera","text":"Financiera","isGroup":true,"group":"Pool1","color":"lightblue","loc":"53.11929067457747 0.5","size":"807 123","expanded":true,"savedBreadth":123},
                        {"key":"Clientes","text":"Clientes","isGroup":true,"group":"Pool1","color":"lightgreen","loc":"53.11929067457747 122.5","size":"807 103","expanded":true,"savedBreadth":103},
                        {"key":"Procesos Internos","text":"Procesos Internos","isGroup":true,"group":"Pool1","color":"yellow","loc":"53.11929067457747 224.5","size":"807 187","expanded":true,"savedBreadth":187},
                        {"key":"Aprendizaje y Crecimiento","text":"Aprendizaje y Crecimiento","isGroup":true,"group":"Pool1","color":"orange","loc":"53.119290674577485 410.5","size":"807 254","expanded":true,"savedBreadth":254}';

                $strategic_map = $process->strategicmap()->create([
                    'data'=>$data,
                    'node'=>$node,
                ]);

//           Almacenar Indicador en Mapa Estrategico
//              Agregar Indicador a grupo de nodos
                $indicator = ',{"group":"' . trim(ucfirst($this->level)) . '","key":"' . trim(ucfirst($this->name)) . '","loc":"50 100"}';
                $node = StrategicMap::where('process_id', $this->process_id)->first()->node;
                $node .= $indicator;
//            Agrupar indicador a DATA en formato JSON
                $data = '{ "class": "GraphLinksModel", "nodeDataArray": [' . $node . '],"linkDataArray": []}';

//            Actualizar Campo Data
                $strategic_map = StrategicMap::where('process_id', $this->process_id)->first();
                $strategic_map->update([
                    'data' => $data,
                    'node' => $node,
                ]);
            }

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
