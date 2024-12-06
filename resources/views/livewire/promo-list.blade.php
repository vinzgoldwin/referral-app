<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">Promos</h1>

    <div class="mb-4">
        <input type="text" wire:model.live.debounce="search" placeholder="Search promos..."
               class="p-2 border rounded w-full text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600">
    </div>

    @if($promos->count() === 0)
        <p class="text-gray-700 dark:text-gray-300">No promos found.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($promos as $promo)
                <div class="bg-white dark:bg-gray-800 rounded shadow hover:shadow-lg transition-shadow duration-300">
                    @if($promo->banner_path)
                        <img src="{{ Storage::url($promo->banner_path) }}" alt="Banner"
                             class="w-full h-48 object-cover rounded-t">
                    @else
                        <div
                            class="w-full h-48 bg-gray-200 dark:bg-gray-700 rounded-t flex items-center justify-center text-gray-500">
                            No Banner
                        </div>
                    @endif
                    <div class="p-4">
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-2">{{ $promo->title }}</h2>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                            Last updated: {{ $promo->updated_at->format('j F Y') }}
                        </p>
                        <a href="{{ route('promos.show', $promo->id) }}"
                           class="inline-block bg-cyan-800 text-white px-3 py-1 rounded hover:bg-cyan-900 text-sm">
                            View Details
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6 text-gray-800 dark:text-gray-200">
            {{ $promos->links() }}
        </div>
    @endif
</div>
