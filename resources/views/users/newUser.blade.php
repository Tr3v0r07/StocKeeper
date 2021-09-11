@extends('users.user')


@section('newUserForm')

<x-auth-validation-errors class="mb-4" :errors="$errors" />

<form method="POST" action="{{ route('newUser') }}">
    @csrf
    <div class="min-w-max">
    <!-- Name -->
        <div >
            <x-label for="first_name" :value="__('First Name')" />

            <x-input id="first_name" class="block mt-1 w-80" type="text" name="first_name" :value="old('first_name')" required autofocus />
        </div>

        <div class="mt-4">
            <x-label for="last_name" :value="__('Last Name')" />

            <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-label for="email" :value="__('Email')" />

            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-label for="password" :value="__('Password')" />

            <x-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
        </div>



        <div class="inline">
            <select class="mt-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="role" id="role">
                <option value="Admin">Admin</option>
                <option value="User">User</option>
            </select>
        </div>


        <button class="'inline float-right mt-5 items-center  px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'">
            {{ __('Add User') }}
        </button>


    </div>
</form>

@endsection
