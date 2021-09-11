<?php

namespace App\Http\Livewire;

use App\Models\Process;
use Livewire\Component;
use Livewire\WithPagination;
use Exception;

class ShowProcess extends Component
{
    use WithPagination;

    public $status = 'Activos';
    public $show = 5;
    public $sort = 'id';
    public $direction = 'desc';
    public $search;
    protected $listeners = ['restore', 'destroy', 'render'];

    public function render()
    {
        try {
            if ($this->status == 'Activos') {
                $processes = Process::where('name', 'like', '%' . $this->search . '%')
                    ->orderBy($this->sort, $this->direction)->paginate($this->show);
            } else {
                $processes = Process::onlyTrashed()->where('name', 'like', '%' . $this->search . '%')
                    ->orderBy($this->sort, $this->direction)->paginate($this->show);
            }
            return view('livewire.show-process', compact('processes'));
        } catch (Exception $e) {
            $this->emit('error', $e->getMessage());
        }
    }
    public function delete($id)
    {
        $this->emit('delete', 'Está Apunto de Eliminar el Proceso', $id);
    }
    public function destroy($id)
    {
        try {
            Process::destroy($id);
            $this->emit('alert', 'Proceso Eliminado');
        } catch (Exception $e) {
            $this->emit('error', $e->getMessage());
        }
    }
    public function renovate($id)
    {
        $this->emit('renovate', 'Este Proceso a sido Eliminado Anteriormente', $id);
    }
    public function restore($id)
    {
        try {
            $objeto = Process::withTrashed()->where('id', $id);
            $objeto->restore();
            $this->emit('alert', 'Proceso Restaurado');
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
