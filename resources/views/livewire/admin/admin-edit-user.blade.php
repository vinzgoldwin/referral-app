<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit User: {{ $name }}</h1>

    <form wire:submit.prevent="updateUser" class="bg-white p-6 rounded shadow-md">
        <div class="mb-4">
            <label class="block font-medium text-gray-700">Name</label>
            <input type="text" value="{{ $name }}" class="mt-1 p-2 border rounded w-full" disabled>
        </div>

        <div class="mb-4">
            <label class="block font-medium text-gray-700">Email</label>
            <input type="email" value="{{ $email }}" class="mt-1 p-2 border rounded w-full" disabled>
        </div>

        <div class="mb-4">
            <label class="block font-medium text-gray-700">Total Referees</label>
            <input type="number" wire:model.defer="totalReferees" min="0" class="mt-1 p-2 border rounded w-full">
            @error('totalReferees')
            <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium text-gray-700">Accumulated Commission ($)</label>
            <input type="number" wire:model.defer="accumulatedCommission" step="0.01" min="0" class="mt-1 p-2 border rounded w-full">
            @error('accumulatedCommission')
            <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium text-gray-700">Total Withdrawal ($)</label>
            <input type="number" wire:model.defer="totalWithdrawal" step="0.01" min="0" class="mt-1 p-2 border rounded w-full">
            @error('totalWithdrawal')
            <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update User</button>
    </form>
</div>
