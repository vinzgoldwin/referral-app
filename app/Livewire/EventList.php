<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Event;

class EventList extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $events = Event::where('title', 'like', "%{$this->search}%")
            ->orderBy('updated_at', 'desc')
            ->paginate(9);

        return view('livewire.event-list', [
            'events' => $events,
        ])->layout('layouts.app');
    }
}
