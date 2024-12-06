<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ auth()->check() && auth()->user()->is_admin ? route('admin.users.index') : (auth()->check() ? route('dashboard') : route('landing-page')) }}" wire:navigate>
                        <svg width="200" height="40" viewBox="0 0 200 50" xmlns="http://www.w3.org/2000/svg">
                            <text x="0" y="35" font-family="Arial, sans-serif" font-size="30" font-weight="bold" fill="#0891B2">MxFin</text>
                        </svg>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @if (auth()->check() && !auth()->user()->is_admin)
                        <!-- Authenticated non-admin -->
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('events.index')" :active="request()->routeIs('events.index')" wire:navigate>
                            {{ __('Events') }}
                        </x-nav-link>
                        <x-nav-link :href="route('promos.index')" :active="request()->routeIs('promos.index')" wire:navigate>
                            {{ __('Promos') }}
                        </x-nav-link>
                    @elseif (auth()->check() && auth()->user()->is_admin)
                        <!-- Authenticated admin -->
                        <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.index')" wire:navigate>
                            {{ __('Users') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.events.index')" :active="request()->routeIs('admin.events.index')" wire:navigate>
                            {{ __('Events') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.promos.index')" :active="request()->routeIs('admin.promos.index')" wire:navigate>
                            {{ __('Promos') }}
                        </x-nav-link>
                    @else
                        <!-- Guest (not authenticated) -->
                        <x-nav-link :href="route('events.index')" :active="request()->routeIs('events.index')" wire:navigate>
                            {{ __('Events') }}
                        </x-nav-link>
                        <x-nav-link :href="route('promos.index')" :active="request()->routeIs('promos.index')" wire:navigate>
                            {{ __('Promos') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            @if (auth()->check())
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile')" wire:navigate>
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <button wire:click="logout" class="w-full text-start">
                                <x-dropdown-link>
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </button>
                        </x-slot>
                    </x-dropdown>
                </div>
            @else
                <!-- Login and Register buttons for unauthenticated users -->
                <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-4">
                    <a href="{{ route('login') }}" class="bg-cyan-800 dark:bg-cyan-600 text-white font-bold px-4 py-2 rounded-2xl hover:bg-cyan-900 dark:hover:bg-cyan-700">LOGIN</a>
                    <a href="{{ route('register') }}" class="bg-cyan-800 dark:bg-cyan-600 text-white font-bold px-4 py-2 rounded-2xl hover:bg-cyan-900 dark:hover:bg-cyan-700">REGISTER</a>
                </div>
            @endif

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @if (auth()->check() && !auth()->user()->is_admin)
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('events.index')" :active="request()->routeIs('events.index')" wire:navigate>
                    {{ __('Events') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('promos.index')" :active="request()->routeIs('promos.index')" wire:navigate>
                    {{ __('Promos') }}
                </x-responsive-nav-link>
            @elseif (auth()->check() && auth()->user()->is_admin)
                <x-responsive-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.index')" wire:navigate>
                    {{ __('Users') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.events.index')" :active="request()->routeIs('admin.events.index')" wire:navigate>
                    {{ __('Events') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.promos.index')" :active="request()->routeIs('admin.promos.index')" wire:navigate>
                    {{ __('Promos') }}
                </x-responsive-nav-link>
            @else
                <!-- Guest -->
                <x-responsive-nav-link :href="route('events.index')" :active="request()->routeIs('events.index')" wire:navigate>
                    {{ __('Events') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('promos.index')" :active="request()->routeIs('promos.index')" wire:navigate>
                    {{ __('Promos') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            @if (auth()->check())
                <!-- Authenticated User Information -->
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                    <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile')" wire:navigate>
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <button wire:click="logout" class="w-full text-start">
                        <x-responsive-nav-link>
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </button>
                </div>
            @else
                <!-- Login and Register for unauthenticated users -->
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('login')" wire:navigate>
                        {{ __('Login') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('register')" wire:navigate>
                        {{ __('Register') }}
                    </x-responsive-nav-link>
                </div>
            @endif
        </div>
    </div>
</nav>
