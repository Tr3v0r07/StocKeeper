<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight inline">
            {{ __('Orders') }}
        </h2>

        <br>
        @if (request()->is('orders/new/*','orders/new'))
                <div class="mt-3">
                </div>
        @else
            <div class=" md:m-auto">
                <x-nav-link :href="route('orders')" :active="request()->routeIs('orders')">
                    {{ __('All') }}
                </x-nav-link>
                <x-nav-link :href="route('view', ['status'=>'Started'])" :active="request()->is('orders/Started*')">
                    {{ __('Started') }}
                </x-nav-link>
                <x-nav-link :href="route('view', ['status'=>'Estimated'])" :active="request()->is('orders/Estimated*')">
                    {{ __('Estimated') }}
                </x-nav-link>
                <x-nav-link :href="route('view', ['status'=>'Accepted'])" :active="request()->is('orders/Accepted*')">
                    {{ __('Accepted') }}
                </x-nav-link>
                <x-nav-link :href="route('view', ['status'=>'Completed'])" :active="request()->is('orders/Completed*')">
                    {{ __('Completed') }}
                </x-nav-link>
                <x-nav-link :href="route('view', ['status'=>'Invoiced'])" :active="request()->is('orders/Invoiced*')">
                    {{ __('Invoiced') }}
                </x-nav-link>
                <x-nav-link :href="route('view', ['status'=>'Delivered'])" :active="request()->is('orders/Delivered*')">
                    {{ __('Delivered') }}
                </x-nav-link>
            @admin
                <x-nav-link :href="route('view', ['status'=>'Finalized'])" :active="request()->is('orders/Finalized*')">
                    {{ __('Finalized') }}
                </x-nav-link>
            @endadmin
            </div>

        @endif
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 m-3 bg-gray-200 border-b border-gray-200">

                    @yield('viewOrder')
                    @yield('adjustQuote')
                    @yield('setupCustomer')
                    @yield('orderQuery')

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
