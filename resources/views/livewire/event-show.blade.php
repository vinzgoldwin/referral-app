<div class="container mx-auto p-4">
    <a href="{{ route('events.index') }}" class="text-cyan-800 hover:underline">&larr; Back to Events</a>

    <div class="bg-white dark:bg-gray-800 rounded shadow mt-4 p-4">
        @if($event->banner_path)
            <img src="{{ Storage::url($event->banner_path) }}" alt="Banner"
                 class="w-full h-64 object-cover rounded mb-4">
        @endif

        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-2">{{ $event->title }}</h1>
        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
            Last updated: {{ $event->updated_at->format('j F Y') }}
        </p>
        <div class="text-gray-800 dark:text-gray-200 whitespace-pre-line">
            {{ $event->description }}
        </div>
    </div>
</div>
