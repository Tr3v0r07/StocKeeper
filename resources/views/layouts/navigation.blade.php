<nav x-data="{ open: false }" class="noprint bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-auto">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 p-2 flex items-center">
                    <a href="{{ route('admindashboard') }}">
                        {{-- <x-icon class="block h-10 fill-current text-gray-600" /> --}}
                        <img src="{{ URL::asset('/img/logo.png') }}" alt="" height="55" width="55" >
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:grid sm:auto-cols-min sm:grid-cols-3 lg:grid-cols-5">
                    <x-nav-link :href="route('admindashboard')" class="sm:ml-6 sm:py-3" :active="request()->routeIs('admindashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    {{-- Orders --}}
                    <div class="hidden sm:flex sm:items-center sm:ml-6 sm:py-3">
                        <x-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>Orders</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Authentication -->
                                    <x-dropdown-link :href="route('orders')">
                                        {{ __('View') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('newOrder')">
                                        {{ __('New') }}
                                    </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    {{-- Customers --}}
                    <div class="hidden sm:flex sm:items-center sm:ml-6 sm:py-3">
                        <x-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>Customers</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Authentication -->
                                    <x-dropdown-link :href="route('customers')">
                                        {{ __('Customers') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('new_cust')">
                                        {{ __('New Customer') }}
                                    </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    {{-- Inventory --}}
                    <div class="hidden sm:flex sm:items-center sm:ml-6 sm:py-3">
                        <x-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>Inventory</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Authentication -->
                                    <x-dropdown-link :href="route('view-inv')">
                                        {{ __('Inventory') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('new-inv')">
                                        {{ __('New Items') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('newShipment')">
                                        {{ __('Receive Shipment') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('new-roll')">
                                        {{ __('Rolls') }}
                                    </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    {{-- User Management --}}
                @admin
                    <div class="hidden sm:flex sm:items-center sm:ml-6 sm:py-3 whitespace-nowrap">
                        <x-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>User Management</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Authentication -->
                                    <x-dropdown-link :href="route('user')">
                                        {{ __('Users') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('newUser')">
                                        {{ __('Add New') }}
                                    </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endadmin
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->first_name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('profile')">
                                {{ __('My Profile') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
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
            <x-responsive-nav-link :href="route('admindashboard')" :active="request()->routeIs('admindashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            {{-- Orders --}}
            <x-responsive-dropdown :href="'#'" :active="request()->routeIs('orders', 'newOrder')">
                <x-slot name="name">Orders</x-slot>
                <x-slot name="children" >
                    <div class="mb-3"><a href="{{ route('orders') }}">View</a><br></div>
                    <div class="mt-3"><a href="{{ route('newOrder') }}">New</a></div>
                </x-slot>
            </x-responsive-dropdown>
            {{-- Customers --}}
            <x-responsive-dropdown :href="'#'" :active="request()->routeIs('customers','new_cust')">
                <x-slot name="name">Customers</x-slot>
                <x-slot name="children" >
                    <div class="mb-3"><a href="{{ route('customers') }}">View</a><br></div>
                    <div class="mt-3"><a href="{{ route('new_cust') }}">New</a></div>
                </x-slot>
            </x-responsive-dropdown>
            {{-- Inventory --}}
            <x-responsive-dropdown :href="'#'" :active="request()->routeIs('view-inv','new-inv','new-roll')">
                <x-slot name="name">Inventory</x-slot>
                <x-slot name="children" >
                    <div class="mb-3"><a href="{{ route('view-inv') }}">View</a><br></div>
                    <div class="my-3"><a href="{{ route('new-inv') }}">New Items</a><br></div>
                    <div class="mt-3"><a href="{{ route('new-roll') }}">Rolls</a></div>
                </x-slot>
            </x-responsive-dropdown>
            {{-- User Management --}}
            @admin
            <x-responsive-dropdown :href="'#'" :active="request()->routeIs('user','newUser')">
                <x-slot name="name">User Management</x-slot>
                <x-slot name="children" >
                    <div class="mb-3"><a href="{{ route('user') }}">Users</a><br></div>
                    <div class="mt-3"><a href="{{ route('newUser') }}">New</a></div>
                </x-slot>
            </x-responsive-dropdown>
            @endadmin
            <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
                <div class="font-medium text-sm text-gray-500"></div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
