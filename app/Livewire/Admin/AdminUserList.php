<?php
namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class AdminUserList extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    protected $paginationTheme = 'bootstrap';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users =  User::where('is_admin', 0)
            ->whereNotNull('email_verified_at')
            ->where(function($query) {
                $query->where('name', 'like', "%{$this->search}%")
                    ->orWhere('email', 'like', "%{$this->search}%");
            })
            ->with(['currency', 'referralCode'])
            ->orderBy('name')
            ->paginate($this->perPage);

        return view('livewire.admin.admin-user-list', [
            'users' => $users,
        ])->layout('layouts.app');
    }

    public function editUser($userId)
    {
        return redirect()->route('admin.users.edit', $userId);
    }
}
