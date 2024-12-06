<?php

namespace App\Livewire;

use Livewire\Component;

class PromoList extends Component
{
    public function render()
    {
        return view('livewire.promo-list')->layout('layouts.app');
    }
}
