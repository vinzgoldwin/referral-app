<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200">Users</h1>

    @if(session('success'))
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 5000)"
            x-show="show"
            class="bg-green-100 dark:bg-green-800 text-green-700 dark:text-green-200 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <input type="text" wire:model.live.debounce="search" placeholder="Search name or email..." class="p-2 border rounded w-full text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600">
    </div>

    <table class="w-full bg-white dark:bg-gray-800 shadow-md rounded mb-4">
        <thead>
        <tr class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
            <th class="py-2 px-4">Name</th>
            <th class="py-2 px-4">Email</th>
            <th class="py-2 px-4">Status</th>
            <th class="py-2 px-4">Total Referees</th>
            <th class="py-2 px-4">Currency Code</th>
            <th class="py-2 px-4">Accumulated Commission</th>
            <th class="py-2 px-4">Withdrawal</th>
            <th class="py-2 px-4">Referral Code</th>
            <th class="py-2 px-4">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr class="border-t border-gray-200 dark:border-gray-700">
                <td class="py-2 px-4 text-center text-gray-800 dark:text-gray-200">{{ $user->name }}</td>
                <td class="py-2 px-4 text-center text-gray-800 dark:text-gray-200">{{ $user->email }}</td>
                <td class="py-2 px-4 text-center
                    @if ($user->status === 'enabled') text-green-600 dark:text-green-400
                    @elseif ($user->status === 'disabled') text-yellow-600 dark:text-yellow-400
                    @elseif ($user->status === 'banned') text-red-600 dark:text-red-400
                    @else text-gray-800 dark:text-gray-200
                    @endif"
                >
                    {{ ucfirst($user->status) }}
                </td>
                <td class="py-2 px-4 text-center text-gray-800 dark:text-gray-200">{{ $user->total_referees }}</td>
                <td class="py-2 px-4 text-center text-gray-800 dark:text-gray-200">{{ $user->currency->code ?? 'N/A' }}</td>
                <td class="py-2 px-4 text-center text-gray-800 dark:text-gray-200"> {{ $user->accumulated_commission }}</td>
                <td class="py-2 px-4 text-center text-gray-800 dark:text-gray-200"> {{ $user->total_withdrawal }}</td>
                <td class="py-2 px-4 text-center text-gray-800 dark:text-gray-200"> {{ $user->referralCode->code }}</td>
                <td class="py-2 px-4 text-center">
                    <button wire:click="editUser({{ $user->id }})" class="text-blue-600 dark:text-blue-400 hover:underline">Edit</button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="py-4 px-4 text-center text-gray-800 dark:text-gray-200">No users found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div class="text-gray-800 dark:text-gray-200">
        {{ $users->links() }}
    </div>
</div>
