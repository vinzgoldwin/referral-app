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

            @php
                $referralCode = auth()->user()->referralCode->code ?? '';
                $referralWebsites = \App\Models\ReferralWebsite::all();
            @endphp
            <!-- Referral Code and Link -->
            @if(auth()->user()->status === 'enabled')
                <div class="mt-8">
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-800 dark:text-gray-200">Your Referral Code:</h3>
                    <p class="text-xl sm:text-2xl text-gray-800 dark:text-gray-200">{{ $referralCode }}</p>
                    <h3 class="text-lg sm:text-xl font-semibold mt-4 text-gray-800 dark:text-gray-200">Your Referral Websites:</h3>
                    @if($referralWebsites->count() > 0)
                        <!-- Collapsible section for websites -->
                        <div x-data="{ showWebsites: false }" class="mt-2">
                            <button @click="showWebsites = !showWebsites" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                <span x-show="!showWebsites">Show Websites</span>
                                <span x-show="showWebsites">Hide Websites</span>
                            </button>

                            <div x-show="showWebsites" class="mt-4 space-y-4">
                                <!-- Display in two columns if large number -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    @foreach($referralWebsites as $website)
                                        @php
                                            $referralLink = rtrim($website->url, '/') . '?ref=' . $referralCode;
                                        @endphp
                                        <div class="bg-white dark:bg-gray-700 p-4 rounded shadow space-y-2">
                                            <h4 class="font-semibold text-gray-800 dark:text-gray-200">Website</h4>
                                            <p class="text-sm text-gray-600 dark:text-gray-300 break-all">{{ $referralLink }}</p>
                                            <button onclick="copyThisLink('{{ $referralLink }}')" class="px-3 py-1 bg-cyan-800 text-white rounded hover:bg-cyan-900 text-sm">Copy Link</button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <p class="text-gray-700 dark:text-gray-300 mt-2">No referral websites available.</p>
                    @endif
                </div>
            @else
                <div class="mt-8">
                    <p class="text-gray-800 dark:text-gray-200">Your account is currently {{ auth()->user()->status }}. Referral codes and links are not available.</p>
                </div>
            @endif
        </div>
    </div>

    <script>
        function copyThisLink(link) {
            navigator.clipboard.writeText(link).then(function() {
                alert("Referral link copied to clipboard!");
            }, function(err) {
                alert("Could not copy text: ", err);
            });
        }
    </script>

</x-app-layout>
