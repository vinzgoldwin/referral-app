<?php

namespace App\Livewire\Admin\Event;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class AdminEventList extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function deleteEvent($eventId)
    {
        $event = Event::findOrFail($eventId);
        if ($event->banner_path && \Storage::exists($event->banner_path)) {
            \Storage::delete($event->banner_path);
        }
        $event->delete();
        session()->flash('success', 'Event deleted successfully.');
    }

    public function render()
    {
        $events = Event::where('title', 'like', "%{$this->search}%")
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.admin.admin-event-list', [
            'events' => $events,
        ])->layout('layouts.app');
    }
}
