<?php

namespace App\Livewire;

use App\Models\Promo;
use Livewire\Component;
use Livewire\WithPagination;

class PromoList extends Component
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
        $promos = Promo::where('title', 'like', "%{$this->search}%")
            ->orderBy('updated_at', 'desc')
            ->paginate(9);

        return view('livewire.promo-list', [
            'promos' => $promos,
        ])->layout('layouts.app');
    }
}
