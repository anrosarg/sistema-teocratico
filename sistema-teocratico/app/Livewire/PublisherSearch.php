<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Publisher;

class PublisherSearch extends Component
{
    public $search = '';

    public function render()
    {
        $publishers = Publisher::with(['circuit', 'congregation', 'group'])
            ->where(function($query) {
                $query->where('first_name', 'like', '%'.$this->search.'%')
                      ->orWhere('last_name', 'like', '%'.$this->search.'%');
            })
            ->orderBy('last_name')
            ->get();

        return view('livewire.publisher-search', [
            'publishers' => $publishers
        ]);
    }
}