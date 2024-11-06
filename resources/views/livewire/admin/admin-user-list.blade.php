<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Users</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <input type="text" wire:model.live.debounce="search" placeholder="Search name or email..." class="p-2 border rounded w-full">
    </div>

    <table class="w-full bg-white shadow-md rounded mb-4">
        <thead>
        <tr class="bg-gray-200 text-gray-700">
            <th class="py-2 px-4">Name</th>
            <th class="py-2 px-4">Email</th>
            <th class="py-2 px-4">Total Referees</th>
            <th class="py-2 px-4">Accumulated Commission</th>
            <th class="py-2 px-4">Withdrawal</th>
            <th class="py-2 px-4">Remaining Balance</th>
            <th class="py-2 px-4">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr class="border-t">
                <td class="py-2 px-4 text-center">{{ $user->name }}</td>
                <td class="py-2 px-4 text-center">{{ $user->email }}</td>
                <td class="py-2 px-4 text-center">{{ $user->total_referees }}</td>
                <td class="py-2 px-4 text-center">$ {{ $user->accumulated_commission }}</td>
                <td class="py-2 px-4 text-center">$ {{ $user->total_withdrawal }}</td>
                <td class="py-2 px-4 text-center">$ {{$user->accumulated_commission - $user->total_withdrawal}}</td>

                <td class="py-2 px-4 text-center">
                    <button wire:click="editUser({{ $user->id }})" class="text-blue-600 hover:underline">Edit</button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="py-4 px-4 text-center">No users found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $users->links() }}
</div>
