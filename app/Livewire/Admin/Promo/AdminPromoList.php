<?php

namespace App\Livewire\Admin\Promo;

use App\Models\Promo;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class AdminPromoList extends Component
{
    use WithPagination;

    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function deletePromo($promoId)
    {
        $promo = Promo::findOrFail($promoId);
        if ($promo->banner_path && Storage::exists($promo->banner_path)) {
            Storage::delete($promo->banner_path);
        }
        $promo->delete();
        session()->flash('success', 'Promo deleted successfully.');
    }

    public function render()
    {
        $promos = Promo::where('title', 'like', "%{$this->search}%")
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.admin.admin-promo-list', [
            'promos' => $promos,
        ])->layout('layouts.app');
    }
}
