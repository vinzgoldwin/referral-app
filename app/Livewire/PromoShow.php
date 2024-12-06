<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\Promo;
use Livewire\Component;

class PromoShow extends Component
{
    public $promoId;
    public $promo;

    public function mount($id)
    {
        $this->promoId = $id;
        $this->promo = Promo::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.promo-show', [
            'promo' => $this->promo,
        ])->layout('layouts.app');
    }
}
