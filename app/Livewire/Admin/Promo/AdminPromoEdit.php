<?php

namespace App\Livewire\Admin\Promo;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Promo;
use Illuminate\Support\Facades\Storage;

class AdminPromoEdit extends Component
{
    use WithFileUploads;

    public $promoId;
    public $title;
    public $description;
    public $banner;
    public $existingBannerPath;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'banner' => 'nullable|image|max:2048',
    ];

    public function mount($promoId)
    {
        $promo = Promo::findOrFail($promoId);
        $this->promoId = $promo->id;
        $this->title = $promo->title;
        $this->description = $promo->description;
        $this->existingBannerPath = $promo->banner_path;
    }

    public function updatePromo()
    {
        $this->validate();

        $promo = Promo::findOrFail($this->promoId);

        if ($this->banner) {
            if ($promo->banner_path && Storage::exists($promo->banner_path)) {
                Storage::delete($promo->banner_path);
            }
            $promo->banner_path = $this->banner->store('banners', 'public');
        }

        $promo->title = $this->title;
        $promo->description = $this->description;
        $promo->save();

        session()->flash('success', 'Promo updated successfully.');
        return redirect()->route('admin.promos.index');
    }

    public function removeBanner()
    {
        $promo = Promo::findOrFail($this->promoId);
        if ($promo->banner_path && Storage::exists($promo->banner_path)) {
            Storage::delete($promo->banner_path);
        }
        $promo->update(['banner_path' => null]);
        $this->existingBannerPath = null;
        session()->flash('success', 'Banner removed successfully.');
    }

    public function render()
    {
        return view('livewire.admin.admin-promo-edit')->layout('layouts.app');
    }
}
