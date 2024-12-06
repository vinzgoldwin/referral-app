<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200">Add Referral Website</h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form wire:submit.prevent="createWebsite" class="space-y-4">
        <div>
            <label class="block text-gray-700 dark:text-gray-200 mb-1">Website URL</label>
            <input wire:model="url" type="url" class="p-2 border rounded w-full text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-700" placeholder="https://example.com/">
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="bg-cyan-800 text-white px-4 py-2 rounded hover:bg-cyan-900">Save</button>
            <a href="{{ route('admin.referral-websites.index') }}" class="px-4 py-2 rounded border text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">Cancel</a>
        </div>
    </form>
</div>
