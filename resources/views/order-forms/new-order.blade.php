<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-500 leading-tight inline">
            {{ __('New Order') }}
        </h2>
        @include('order-forms.continue')
        <br>
        <div class="mt-3">
            <x-nav-link :href="route('toPanels')" :active="request()->routeIs('toPanels','addPanel')">
                {{ __('Panels') }}
            </x-nav-link>
            <x-nav-link :href="route('toTrim')" :active="request()->routeIs('toTrim','addTrim')">
                {{ __('Trim') }}
            </x-nav-link>
            <x-nav-link :href="route('toCart')" :active="request()->routeIs('toCart','addItem')">
                {{ __('Other') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-gray-200 ">
                    @yield('orderForm')
                    @yield('setCustomer')
                    @yield('quote')
                    @yield('panels')
                    @yield('sticks')

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
