<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight inline">
            {{ __('User Management') }}
        </h2>
        @include('order-forms.continue')

        <br>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <table>
                        <thead>
                            <th class='p-3'>First</th>
                            <th class='p-3'>Last</th>
                            <th class='p-3'>Email</th>
                            <th class='p-3'>Role</th>
                            <th class='p-3'></th>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class='p-3'>{{ $user->first_name }}</td>
                                    <td class='p-3'>{{ $user->last_name }}</td>
                                    <td class='p-3'>{{ $user->email }}</td>
                                    <td class='p-3'>{{ $user->role }}</td>
                                    {{-- <td class='p-3'><a href="/edit_user/{{ $user->id }}">Edit</a></td> --}}
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
