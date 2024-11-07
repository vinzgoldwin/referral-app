<?php

namespace App\Livewire\Admin;

use App\Models\Currency;
use Livewire\Component;
use App\Models\User;
use App\Models\Commission;
use Carbon\Carbon;

class AdminEditUser extends Component
{
    public $userId;
    public $name;
    public $email;
    public $weeklyCommission;
    public $totalReferees;
    public $totalWithdrawal;
    public $accumulatedCommission;
    public $currencyId;
    public $currencies;


    public function mount($userId)
    {
        $this->userId = $userId;

        $user = User::findOrFail($userId);

        $this->name = $user->name;
        $this->email = $user->email;
        $this->totalReferees = $user->total_referees;
        $this->totalWithdrawal = $user->total_withdrawal;
        $this->accumulatedCommission = $user->accumulated_commission;
        $this->currencyId = $user->currency_id;

        $this->currencies = Currency::all();
    }

    public function updateUser()
    {
        $this->validate([
            'currencyId' => 'required|exists:currencies,id',
            'totalReferees' => 'required|integer|min:0',
            'totalWithdrawal' => 'required|numeric|min:0',
            'accumulatedCommission' => 'required|numeric|min:0',
        ]);

        $user = User::findOrFail($this->userId);

        $user->update([
            'total_referees' => $this->totalReferees,
            'total_withdrawal' => $this->totalWithdrawal,
            'accumulated_commission' => $this->accumulatedCommission,
            'currency_id' => $this->currencyId,
        ]);

        session()->flash('success', 'User information updated successfully.');

        return redirect()->route('admin.users.index');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-user')->layout('layouts.app');
    }
}
