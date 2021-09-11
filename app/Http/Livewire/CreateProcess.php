<?php

namespace App\Http\Livewire;

use App\Models\Process;
use Livewire\Component;
use Exception;

class CreateProcess extends Component
{
    public $open = false;
    public $name;
    protected $rules = [
        'name' => 'required'
    ];

    public function render()
    {
        return view('livewire.create-process');
    }

    public function store()
    {
        $this->validate();
        try {
            $process = Process::create([
                'name' => trim(ucfirst($this->name)),
            ]);
            $this->default();
            $this->emitTo('show-process', 'render');
            $this->emit('alert', 'Proceso Agregado');
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
