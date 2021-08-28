<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-500 leading-tight inline">
            {{ __('Active Orders') }}
        </h2>
        @include('order-forms.continue')

        <br>
        <x-nav-link :href="route('estimated')" :active="request()->routeIs('estimated')">
            {{ __('Estimated') }}
        </x-nav-link>
        <x-nav-link :href="route('accepted')" :active="request()->routeIs('accepted')">
            {{ __('Accepted') }}
        </x-nav-link>
        <x-nav-link :href="route('completed')" :active="request()->routeIs('completed')">
            {{ __('Completed') }}
        </x-nav-link>
        <x-nav-link :href="route('invoiced')" :active="request()->routeIs('invoiced')">
            {{ __('Invoiced') }}
        </x-nav-link>
    </x-slot>
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">

                {{-- @yield('order-query') --}}
                @include('orderquery')

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
