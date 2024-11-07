<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200">Edit User: {{ $name }}</h1>

    <form wire:submit.prevent="updateUser" class="bg-white dark:bg-gray-800 p-6 rounded shadow-md">
        <div class="mb-4">
            <label class="block font-medium text-gray-700 dark:text-gray-200">Name</label>
            <input type="text" value="{{ $name }}" class="mt-1 p-2 border rounded w-full text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600" disabled>
        </div>

        <div class="mb-4">
            <label class="block font-medium text-gray-700 dark:text-gray-200">Email</label>
            <input type="email" value="{{ $email }}" class="mt-1 p-2 border rounded w-full text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600" disabled>
        </div>

        <div class="mb-4">
            <label class="block font-medium text-gray-700 dark:text-gray-200">Total Referees</label>
            <input type="number" wire:model.defer="totalReferees" min="0" class="mt-1 p-2 border rounded w-full text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600">
            @error('totalReferees')
            <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium text-gray-700 dark:text-gray-200">Currency</label>
            <select wire:model.defer="currencyId" class="mt-1 p-2 border rounded w-full text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600">
                <option value="">Select Currency</option>
                @foreach($currencies as $currency)
                    <option value="{{ $currency->id }}">{{ $currency->name }} ({{ $currency->code }})</option>
                @endforeach
            </select>
            @error('currencyId')
            <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium text-gray-700 dark:text-gray-200">Accumulated Commission</label>
            <input type="number" wire:model.defer="accumulatedCommission" step="0.01" min="0" class="mt-1 p-2 border rounded w-full text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600">
            @error('accumulatedCommission')
            <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium text-gray-700 dark:text-gray-200">Total Withdrawal</label>
            <input type="number" wire:model.defer="totalWithdrawal" step="0.01" min="0" class="mt-1 p-2 border rounded w-full text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600">
            @error('totalWithdrawal')
            <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 dark:bg-blue-500 text-white rounded hover:bg-blue-700 dark:hover:bg-blue-600">Update User</button>
    </form>
</div>
