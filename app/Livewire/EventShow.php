<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Event;

class EventShow extends Component
{
    public $eventId;
    public $event;

    public function mount($id)
    {
        $this->eventId = $id;
        $this->event = Event::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.event-show', [
            'event' => $this->event,
        ])->layout('layouts.app');
    }
}
