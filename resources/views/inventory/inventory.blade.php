<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{ __('Inventory') }}
        </h2>
        <br>
        <x-nav-link :href="route('view-inv')" :active="request()->routeIs('view-inv')">
            {{ __('Browse Inventory') }}
        </x-nav-link>
        <x-nav-link :href="route('newShipment')" :active="request()->routeIs('newShipment')">
            {{ __('New Shipment') }}
        </x-nav-link>
        <x-nav-link :href="route('new-inv')" :active="request()->routeIs('new-inv')">
            {{ __('New Items') }}
        </x-nav-link>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" p-6 bg-gray-200 m-4">

                    @yield('view')
                    @yield('new-inv')
                    @yield('new-roll')
                    @yield('newShipment')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
