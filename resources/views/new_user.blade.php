<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight  inline">
            {{ __('Add New User') }}
        </h2>
        @include('order-forms.continue')

        <br>
        <x-nav-link :href="route('user')" :active="request()->routeIs('orders')" class="ml-3">
            {{ __('Active') }}
        </x-nav-link>
        <x-nav-link :href="route('new_user')" :active="request()->routeIs('new_user')" class="ml-3">
            {{ __('New User') }}
        </x-nav-link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('auth.register')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
