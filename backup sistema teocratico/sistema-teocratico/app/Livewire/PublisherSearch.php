<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Publisher;
use App\Models\Group;
use App\Models\Circuit;
use App\Models\Congregation;

class PublisherSearch extends Component
{
    public $search = '';
    public $group_id = '';
    public $circuit_id = '';
    public $congregation_id = '';
    public $status = '';
    public $condition = '';

    public function render()
    {
        $query = Publisher::with(['circuit', 'congregation', 'group'])
            ->join('groups', 'publishers.group_id', '=', 'groups.id')
            ->orderBy('groups.name')
            ->select('publishers.*');

        if ($this->search) {
            $query->where(function($q) {
                $q->where('publishers.first_name', 'like', '%'.$this->search.'%')
                  ->orWhere('publishers.last_name', 'like', '%'.$this->search.'%');
            });
        }

        if ($this->group_id) {
            $query->where('publishers.group_id', $this->group_id);
        }

        if ($this->circuit_id) {
            $query->where('publishers.circuit_id', $this->circuit_id);
        }

        if ($this->congregation_id) {
            $query->where('publishers.congregation_id', $this->congregation_id);
        }

        if ($this->status) {
            $query->where('publishers.status', $this->status);
        }

        if ($this->condition) {
            $query->where('publishers.condition', $this->condition);
        }

        $publishers = $query->get();

        $grupos = Group::all();
        $circuitos = Circuit::all();
        $congregaciones = Congregation::all();
        $estados = ['bautizado', 'no bautizado'];
        $condiciones = ['ejemplar', 'no ejemplar'];

        return view('livewire.publisher-search', [
            'publishers' => $publishers,
            'grupos' => $grupos,
            'circuitos' => $circuitos,
            'congregaciones' => $congregaciones,
            'estados' => $estados,
            'condiciones' => $condiciones,
        ]);
    }
}