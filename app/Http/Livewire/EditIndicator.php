<?php

namespace App\Http\Livewire;

use App\Models\Indicator;
use Dflydev\DotAccessData\Data;
use Livewire\Component;
use Exception;
class EditIndicator extends Component
{
    public $open = false;
    public $indicator;
    public $name,$level,$formula,$objective,$frequency,$goal,$bad_range,$regular_range,$good_range,$iniciatives,$responsable;
    protected $rules = [
        'indicator.name' => 'required',
        'indicator.level' => 'required',
        'indicator.controlpanel.formula' => 'required',
        'indicator.controlpanel.objective' => 'required',
        'indicator.controlpanel.frequency' => 'required',
        'indicator.controlpanel.goal' => 'required',
        'indicator.controlpanel.bad_range' => 'required',
        'indicator.controlpanel.regular_range' => 'required',
        'indicator.controlpanel.good_range' => 'required',
        'indicator.controlpanel.iniciatives' => 'required',
        'indicator.controlpanel.responsable' => 'required',
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
        try {
            $this->validate();
            $indicator = Indicator::find($this->indicator->id);
            $indicator->update([
                'name' => trim(ucfirst($this->indicator->name)),
                'level' => trim(ucfirst($this->indicator->level)),
            ]);
            $indicator->controlpanel()->update([
                'formula' => trim(ucfirst($this->indicator->controlpanel['formula'])),
                'objective' => trim(ucfirst($this->indicator->controlpanel['objective'])),
                'frequency' => trim(ucfirst($this->indicator->controlpanel['frequency'])),
                'goal' => trim(ucfirst($this->indicator->controlpanel['goal'])),
                'bad_range' => trim(ucfirst($this->indicator->controlpanel['bad_range'])),
                'regular_range' => trim(ucfirst($this->indicator->controlpanel['regular_range'])),
                'good_range' => trim(ucfirst($this->indicator->controlpanel['good_range'])),
                'iniciatives' => trim(ucfirst($this->indicator->controlpanel['iniciatives'])),
                'responsable' => trim(ucfirst($this->indicator->controlpanel['responsable'])),
            ]);
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
