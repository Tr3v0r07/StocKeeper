<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Inventory') }}
        </h2>
        @include('order-forms.continue')
        <br>
        <x-nav-link :href="route('view-inv')" :active="request()->routeIs('view-inv')">
            {{ __('Current') }}
        </x-nav-link>
        <x-nav-link :href="route('new-inv')" :active="request()->routeIs('new-inv')">
            {{ __('New Inventory') }}
        </x-nav-link>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="m-auto p-6 bg-white border-b border-gray-200">
                    
                    @yield('view')
                    @yield('new-inv')
                    @yield('new-roll')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
