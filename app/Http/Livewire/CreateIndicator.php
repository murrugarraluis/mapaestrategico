<?php

namespace App\Http\Livewire;

use App\Models\Process;
use Livewire\Component;
use Exception;
class CreateIndicator extends Component
{
    public $open = false;
    public $process_id;
    public $name,$level;
    protected $rules = [
        'name' => 'required',
        'level' => 'required',
    ];
    public function render()
    {
        return view('livewire.create-indicator');
    }
    public function store()
    {
        $this->validate();
        try {
            $process = Process::find($this->process_id);
            $process->indicators()->create([
                'name' => trim(ucfirst($this->name)),
                'level' => trim(ucfirst($this->level)),
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
