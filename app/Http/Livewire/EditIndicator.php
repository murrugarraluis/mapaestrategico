<?php

namespace App\Http\Livewire;

use App\Models\Indicator;
use Livewire\Component;
use Exception;
class EditIndicator extends Component
{
    public $open = false;
    public $indicator;
    protected $rules = [
        'indicator.name' => 'required',
        'indicator.level' => 'required',
    ];
    public function render()
    {
        return view('livewire.edit-indicator');
    }
    public function mount(Indicator $indicator)
    {
        $this->indicator = $indicator;
    }
    public function update(){
        $this->validate();
        try {
            $this->indicator->save();
            $this->default();
            $this->emitTo('show-indicator','render');
            $this->emit('alert','Indicador Editado');

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
