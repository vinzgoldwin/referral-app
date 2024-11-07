<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AffiliateLandingPage extends Component
{
    public $isLoggedIn;

    public function mount()
    {
        $this->isLoggedIn = Auth::check();
    }

    public function render()
    {
        return view('livewire.affiliate-landing-page')->layout('layouts.app');
    }
}
