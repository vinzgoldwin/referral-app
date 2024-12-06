<?php

namespace App\Livewire\Admin\ReferralWebsite;

use Livewire\Component;
use App\Models\ReferralWebsite;

class AdminReferralWebsiteEdit extends Component
{
    public $websiteId;
    public $url;

    protected $rules = [
        'url' => 'required|url|max:255'
    ];

    public function mount($id)
    {
        $website = ReferralWebsite::findOrFail($id);
        $this->websiteId = $website->id;
        $this->url = $website->url;
    }

    public function updateWebsite()
    {
        $this->validate();
        $website = ReferralWebsite::findOrFail($this->websiteId);
        $website->update(['url' => $this->url]);

        session()->flash('success', 'Referral website updated successfully.');
        return redirect()->route('admin.referral-websites.index');
    }

    public function render()
    {
        return view('livewire.admin.admin-referral-website-edit')->layout('layouts.app');
    }
}
