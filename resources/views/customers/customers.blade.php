<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg sm:text-xl text-gray-700 leading-tight">
            {{ __('Customers') }}
        </h2>
        <br>
        <x-nav-link :href="route('customers')" :active="request()->routeIs('customers')">
            {{ __('All Customers') }}
        </x-nav-link>
        <x-nav-link :href="route('new_cust')" :active="request()->routeIs('new_cust')">
            {{ __('New Customer') }}
        </x-nav-link>
    </x-slot>


    <div class="py-12">
        <div class="max-w-6xl mx-auto p-1 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden my-6 shadow-sm sm:rounded-lg">
                <div class="m-2 p-3 sm:p-6 bg-gray-200 border-b border-gray-200">
                    <div class="mx-3 my-3 sm:rounded-lg">
                        @yield('customerSearch')
                        @yield('newCustomer')
                        @yield('editCustomer')
                        @yield('viewCustomer')

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
