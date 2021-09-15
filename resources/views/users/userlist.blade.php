@extends('users.user')

@section('usertable')
<div class="bg-white shadow-md rounded p-3">
    <style>
        tr:nth-child(even) {
            background-color: rgba(229, 231, 235);}
        }
        tr:nth-child(odd) {
            background-color: rgba(255, 255, 255);
        }
    </style>
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
                        <td class='p-3'><a href="user/edit/{{ $user->id }}">Edit</a></td>
            </tr>
        @endforeach

    </tbody>
</table>
</div>
@endsection
