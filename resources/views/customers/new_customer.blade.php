<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{ __('Add New Customer') }}
            @include('order-forms.continue')

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
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('customers.form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
