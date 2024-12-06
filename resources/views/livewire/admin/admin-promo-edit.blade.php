<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">Edit Promo</h1>

    @if(session('success'))
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 5000)"
            x-show="show"
            class="bg-green-100 dark:bg-green-800 text-green-700 dark:text-green-200 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form wire:submit.prevent="updatePromo" class="space-y-4">
        <div>
            <label class="block text-gray-700 dark:text-gray-300 mb-1">Title <span class="text-red-500">*</span></label>
            <input type="text" wire:model="title" class="w-full p-2 border rounded text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-700">
        </div>

        <div>
            <label class="block text-gray-700 dark:text-gray-300 mb-1">Description <span class="text-red-500">*</span></label>
            <textarea wire:model="description" class="w-full p-2 border rounded text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-700" rows="5"></textarea>
        </div>

        <div>
            <label class="block text-gray-700 dark:text-gray-300 mb-1">Banner (optional)</label>
            @if($existingBannerPath)
                <div class="mb-2">
                    <img src="{{ Storage::url($existingBannerPath) }}" class="w-32 h-32 object-cover">
                    <button type="button" wire:click="removeBanner" class="text-red-600 hover:underline mt-2">Remove Current Banner</button>
                </div>
            @endif

            <input type="file" wire:model="banner" class="block w-full text-sm text-gray-500">
            @if ($banner)
                <div class="mt-2">
                    <img src="{{ $banner->temporaryUrl() }}" class="w-32 h-32 object-cover">
                </div>
            @endif
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="bg-cyan-800 text-white px-4 py-2 rounded hover:bg-cyan-900">Update</button>
            <a href="{{ route('admin.promos.index') }}" class="px-4 py-2 rounded border text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">Cancel</a>
        </div>
    </form>
</div>
