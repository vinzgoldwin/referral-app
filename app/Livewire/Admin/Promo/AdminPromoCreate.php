<?php

namespace App\Livewire\Admin\Promo;

use App\Models\Promo;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminPromoCreate extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $banner;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'banner' => 'nullable|image|max:2048',
    ];

    public function createPromo()
    {
        $this->validate();

        $bannerPath = $this->banner ? $this->banner->store('banners', 'public') : null;

        Promo::create([
            'title' => $this->title,
            'description' => $this->description,
            'banner_path' => $bannerPath,
        ]);

        session()->flash('success', 'Promo created successfully.');
        return redirect()->route('admin.promos.index');
    }

    public function render()
    {
        return view('livewire.admin.admin-promo-create')->layout('layouts.app');
    }
}
