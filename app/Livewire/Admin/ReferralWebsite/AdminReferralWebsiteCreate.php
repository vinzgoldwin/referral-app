<?php

namespace App\Livewire\Admin\ReferralWebsite;

use Livewire\Component;
use App\Models\ReferralWebsite;

class AdminReferralWebsiteCreate extends Component
{
    public $url;

    protected $rules = [
        'url' => 'required|url|max:255'
    ];

    public function createWebsite()
    {
        $this->validate();
        ReferralWebsite::create(['url' => $this->url]);

        session()->flash('success', 'Referral website created successfully.');
        return redirect()->route('admin.referral-websites.index');
    }

    public function render()
    {
        return view('livewire.admin.admin-referral-website-create')->layout('layouts.app');
    }
}
