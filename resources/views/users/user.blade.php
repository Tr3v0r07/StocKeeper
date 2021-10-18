<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight inline">
            {{ __('User Management') }}
        </h2>

        <br>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto p-1 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden my-6 shadow sm:rounded-lg">
                <div class="m-2 p-3 sm:p-6 bg-gray-200 border-b rounded border-gray-200 shadow-inner">
                    <div class="w-max mx-auto my-3 sm:rounded-lg">
                    @yield('usertable')
                    @yield('newUserForm')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
