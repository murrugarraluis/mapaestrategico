<?php

namespace App\Http\Livewire;

use App\Models\Indicator;
use App\Models\Process;
use Livewire\Component;
use Exception;
use Livewire\WithPagination;

class ShowIndicator extends Component
{
    use WithPagination;

    public $status = 'Activos';
    public $show = 5;
    public $sort = 'id';
    public $direction = 'desc';
    public $search;
    protected $listeners = ['restore', 'destroy', 'render'];

    public $process_id;

    public function render()
    {
        try {
            $process = Process::find($this->process_id);
            if ($this->status == 'Activos') {
                $indicators = Indicator::where('process_id', 'like', $process->id)
                    ->where(function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%')
                            ->orwhere('level', 'like', '%' . $this->search . '%');
                    })
                    ->orderBy($this->sort, $this->direction)->paginate($this->show);
            } else {
                $indicators = Indicator::onlyTrashed()->where('process_id', 'like', $process->id)
                    ->where(function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%')
                            ->orwhere('level', 'like', '%' . $this->search . '%');
                    })
                    ->orderBy($this->sort, $this->direction)->paginate($this->show);
            }
            return view('livewire.show-indicator', compact('process','indicators'));
        } catch (Exception $e) {
            $this->emit('error', $e->getMessage());
        }
    }
    public function delete($id)
    {
        $this->emit('delete', 'Está Apunto de Eliminar el Indicador', $id);
    }
    public function destroy($id)
    {
        try {
            Indicator::destroy($id);
            $this->emit('alert', 'Indicador Eliminado');
        } catch (Exception $e) {
            $this->emit('error', $e->getMessage());
        }
    }
    public function renovate($id)
    {
        $this->emit('renovate', 'Este Indicador a sido Eliminado Anteriormente', $id);
    }
    public function restore($id)
    {
        try {
            $objeto = Indicator::withTrashed()->where('id', $id);
            $objeto->restore();
            $this->emit('alert', 'Indicador Restaurado');
        } catch (Exception $e) {
            $this->emit('error', $e->getMessage());
        }
    }
    public function order($sort)
    {
        if ($this->direction == 'desc') {
            $this->direction = 'asc';
        } else {
            $this->direction = 'desc';
        }
        $this->sort = $sort;
    }
}
