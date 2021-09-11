<?php

namespace App\Http\Livewire;

use App\Models\Process;
use Livewire\Component;
use Exception;
class EditProcess extends Component
{
    public $open = false;
    public $process;
    protected $rules = [
        'process.name' => 'required',
    ];
    public function render()
    {
        return view('livewire.edit-process');
    }
    public function mount(Process $process)
    {
        $this->process = $process;
    }
    public function update(){
        $this->validate();
        try {
            $this->process->save();
            $this->default();
            $this->emitTo('show-process','render');
            $this->emit('alert','Proceso Editado');

        } catch (Exception $e) {
            $this->emit('error',$e->getMessage());
        }
    }
    public function default()
    {
        $this->reset(['open']);
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
