<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-500 leading-tight">
            {{ __('All Orders') }}
            @include('order-forms.continue')

        </h2>
        <br>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    {{-- @yield('order-query') --}}
                    @include('orderquery')

                </div>
            </div>
        </div>
    </div>
</x-app-layout>