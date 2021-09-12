<?php

namespace App\Http\Livewire;

use App\Models\Process;
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
