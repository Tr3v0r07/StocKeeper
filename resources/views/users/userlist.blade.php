@extends('users.user')

@section('usertable')
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
@endsection
