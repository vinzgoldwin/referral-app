<?php

namespace App\Livewire\Admin\ReferralWebsite;

use App\Models\ReferralWebsite;
use Livewire\Component;
use Livewire\WithPagination;

class AdminReferralWebsiteList extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function deleteWebsite($websiteId)
    {
        $site = ReferralWebsite::findOrFail($websiteId);
        $site->delete();

        session()->flash('success', 'Referral website deleted successfully.');
    }

    public function render()
    {
        $websites = ReferralWebsite::where('url', 'like', "%{$this->search}%")
            ->orderBy('url')
            ->paginate(10);

        return view('livewire.admin.admin-referral-website-list', [
            'websites' => $websites,
        ])->layout('layouts.app');
    }
}
