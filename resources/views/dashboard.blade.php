<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Dashboard Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                <!-- Currency -->
                <div class="bg-white dark:bg-gray-700 p-4 rounded shadow">
                    <h4 class="font-semibold text-gray-800 dark:text-gray-200">Currency</h4>
                    <p class="text-xl sm:text-2xl mt-2 text-gray-800 dark:text-gray-200">{{ auth()->user()->currency->code ?? 'N/A' }}</p>
                </div>

                <!-- Accumulated Commission -->
                <div class="bg-white dark:bg-gray-700 p-4 rounded shadow">
                    <h4 class="font-semibold text-gray-800 dark:text-gray-200">Accumulated Commission</h4>
                    <p class="text-xl sm:text-2xl mt-2 text-gray-800 dark:text-gray-200">$ {{ number_format(auth()->user()->accumulated_commission, 2) }}</p>
                </div>

                <!-- Withdrawal -->
                <div class="bg-white dark:bg-gray-700 p-4 rounded shadow">
                    <h4 class="font-semibold text-gray-800 dark:text-gray-200">Withdrawal</h4>
                    <p class="text-xl sm:text-2xl mt-2 text-gray-800 dark:text-gray-200">$ {{ number_format(auth()->user()->total_withdrawal, 2) }}</p>
                </div>

                <!-- Remaining Balance -->
                <div class="bg-white dark:bg-gray-700 p-4 rounded shadow">
                    <h4 class="font-semibold text-gray-800 dark:text-gray-200">Remaining Balance</h4>
                    <p class="text-xl sm:text-2xl mt-2 text-gray-800 dark:text-gray-200">$ {{ number_format(auth()->user()->accumulated_commission - auth()->user()->total_withdrawal, 2) }}</p>
                </div>
            </div>

            <!-- Referral Code and Link -->
            <div class="mt-8">
                <h3 class="text-lg sm:text-xl font-semibold text-gray-800 dark:text-gray-200">Your Referral Code:</h3>
                @php
                    $referralCode = auth()->user()->referralCode->code ?? '';
                    $referralLink = 'https://www.slotasli88.site/' . '?ref=' . ($referralCode ?? '');
                @endphp
                <p class="text-xl sm:text-2xl text-gray-800 dark:text-gray-200">{{ $referralCode }}</p>

                <h3 class="text-lg sm:text-xl font-semibold mt-4 text-gray-800 dark:text-gray-200">Your Referral Link:</h3>
                <div class="flex flex-col sm:flex-row sm:items-center mt-2 space-y-2 sm:space-y-0 sm:space-x-2">
                    <input id="referral-link" type="text" value="{{ $referralLink }}" class="p-2 border rounded text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-600 w-full sm:w-80" readonly>
                    <button onclick="copyReferralLink()" class="px-4 py-2 bg-blue-600 dark:bg-blue-500 text-white rounded hover:bg-blue-700 dark:hover:bg-blue-600 w-full sm:w-auto">Copy Link</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyReferralLink() {
            var copyText = document.getElementById("referral-link");
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices

            navigator.clipboard.writeText(copyText.value).then(function() {
                alert("Referral link copied to clipboard!");
            }, function(err) {
                alert("Could not copy text: ", err);
            });
        }
    </script>
</x-app-layout>
