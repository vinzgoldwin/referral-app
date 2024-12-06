<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">Add New Event</h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form wire:submit.prevent="createEvent" class="space-y-4">
        <div>
            <label class="block text-gray-700 dark:text-gray-300 mb-1">Title <span class="text-red-500">*</span></label>
            <input type="text" wire:model="title" class="w-full p-2 border rounded text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-700" required>
        </div>

        <div>
            <label class="block text-gray-700 dark:text-gray-300 mb-1">Description <span class="text-red-500">*</span></label>
            <textarea wire:model="description" class="w-full p-2 border rounded text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-700" rows="5" required></textarea>
        </div>

        <div>
            <label class="block text-gray-700 dark:text-gray-300 mb-1">Banner (optional)</label>
            <input type="file" wire:model="banner" class="block w-full text-sm text-gray-500">
            @if ($banner)
                <div class="mt-2">
                    <img src="{{ $banner->temporaryUrl() }}" class="w-32 h-32 object-cover">
                </div>
            @endif
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="bg-cyan-800 text-white px-4 py-2 rounded hover:bg-cyan-900">Save</button>
            <a href="{{ route('admin.events.index') }}" class="px-4 py-2 rounded border text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">Cancel</a>
        </div>
    </form>
</div>
