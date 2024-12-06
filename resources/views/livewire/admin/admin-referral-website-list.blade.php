<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Manage Referral Websites</h1>
        <a href="{{ route('admin.referral-websites.create') }}" class="bg-cyan-800 text-white px-4 py-2 rounded hover:bg-cyan-900">+ Add Website</a>
    </div>

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
        <input type="text" wire:model.live.debounce="search" placeholder="Search websites by URL..."
               class="p-2 border rounded w-full text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600">
    </div>

    <table class="w-full bg-white dark:bg-gray-800 shadow-md rounded">
        <thead>
        <tr class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
            <th class="py-2 px-4 text-left">URL</th>
            <th class="py-2 px-4 text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($websites as $site)
            <tr class="border-t border-gray-200 dark:border-gray-700">
                <td class="py-2 px-4 text-gray-800 dark:text-gray-200">{{ $site->url }}</td>
                <td class="py-2 px-4 text-center space-x-2">
                    <a href="{{ route('admin.referral-websites.edit', $site->id) }}" class="text-blue-600 hover:underline">Edit</a>
                    <button
                        onclick="if(confirm('Are you sure?')) @this.call('deleteWebsite', {{ $site->id }});"
                        class="text-red-600 hover:underline">
                        Delete
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2" class="py-4 px-4 text-center text-gray-800 dark:text-gray-200">No referral websites found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div class="text-gray-800 dark:text-gray-200 mt-4">
        {{ $websites->links() }}
    </div>
</div>
