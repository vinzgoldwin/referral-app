<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Commission;
use Illuminate\Http\Request;

class UserCommissionController extends Controller
{
    public function index()
    {
        $users = User::with('commissions')->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $weekStartDate = now()->startOfWeek()->toDateString();
        $commission = $user->commissions()->where('week_start_date', $weekStartDate)->first();

        return view('admin.users.edit', compact('user', 'commission'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'weekly_commission' => 'required|numeric|min:0',
            'total_referees' => 'required|integer|min:0',
            'withdrawable_balance' => 'required|numeric|min:0',
        ]);

        // Update or create this week's commission
        $weekStartDate = now()->startOfWeek()->toDateString();
        Commission::updateOrCreate(
            [
                'user_id' => $user->id,
                'week_start_date' => $weekStartDate,
            ],
            [
                'amount' => $request->weekly_commission,
            ]
        );

        // Update user's total referees and withdrawable balance
        $user->update([
            'total_referees' => $request->total_referees,
            'withdrawable_balance' => $request->withdrawable_balance,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User information updated successfully.');
    }
}
