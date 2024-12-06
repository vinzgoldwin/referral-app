<?php

namespace App\Livewire\Admin\Event;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Event;

class AdminEventEdit extends Component
{
    use WithFileUploads;

    public $eventId;
    public $title;
    public $description;
    public $banner;
    public $existingBannerPath;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'banner' => 'nullable|image|max:4096',
    ];

    public function mount($eventId)
    {
        $event = Event::findOrFail($eventId);
        $this->eventId = $event->id;
        $this->title = $event->title;
        $this->description = $event->description;
        $this->existingBannerPath = $event->banner_path;
    }

    public function updateEvent()
    {
        $this->validate();

        $event = Event::findOrFail($this->eventId);

        if ($this->banner) {
            // Delete old banner if exists
            if ($event->banner_path && \Storage::exists($event->banner_path)) {
                \Storage::delete($event->banner_path);
            }
            $event->banner_path = $this->banner->store('banners', 'public');
        }

        $event->title = $this->title;
        $event->description = $this->description;
        $event->save();

        session()->flash('success', 'Event updated successfully.');
        return redirect()->route('admin.events.index');
    }

    public function removeBanner()
    {
        $event = Event::findOrFail($this->eventId);
        if ($event->banner_path && \Storage::exists($event->banner_path)) {
            \Storage::delete($event->banner_path);
        }
        $event->update(['banner_path' => null]);
        $this->existingBannerPath = null;
        session()->flash('success', 'Banner removed successfully.');
    }

    public function render()
    {
        return view('livewire.admin.admin-event-edit')->layout('layouts.app');
    }
}
