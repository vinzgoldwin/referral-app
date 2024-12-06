<?php

namespace App\Livewire\Admin\Event;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Event;

class AdminEventCreate extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $banner;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'banner' => 'nullable|image|max:4096',
    ];

    public function createEvent()
    {
        $this->validate();

        $bannerPath = null;
        if ($this->banner) {
            $bannerPath = $this->banner->store('banners', 'public');
        }

        Event::create([
            'title' => $this->title,
            'description' => $this->description,
            'banner_path' => $bannerPath,
        ]);

        session()->flash('success', 'Event created successfully.');
        return redirect()->route('admin.events.index');
    }

    public function render()
    {
        return view('livewire.admin.admin-event-create')->layout('layouts.app');
    }
}
