@extends('users.user')

@section('usertable')
<style>
    .alternate:nth-child(even) {
        background-color: rgba(229, 231, 235);}
    .alternate:nth-child(odd) {
        background-color: rgba(255, 255, 255);
    }
</style>
<div class="m-auto p-2">
    <div class=" m-auto">
        <div class="grid grid-cols-2 container bg-white rounded shadow py-3 mb-2 ">
            <div class="px-2  col-start-1 text-lg"><strong>Name</strong></div>
            <div class="px-2 col-start-2 text-lg"><strong>Role</strong></div>
        </div>
        <div class=" bg-white rounded shadow p-1" >
            @foreach ($users as $user)
                <div class="alternate grid grid-cols-2 auto-cols-auto rounded shadow break-all mx-2 my-2 ">
                    <div class="px-2 py-1 col-start-1 "><a href="user/edit/{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</a></div>
                    <div class="px-2 py-1 col-start-2 ">{{ $user->role }}</div>
                </div>
            @endforeach
        </div>
    </div>
</div>
    {{-- <div class="grid bg-white grid-cols-5 rounded justify-items-stretch shadow my-2 auto-cols-fr m-auto">
        <div class='p-3 max-w-min mr-auto'>First</div>
        <div class='p-3 mr-auto'>Last</div>
        <div class='p-3 mr-auto'>Email</div>
        <div class='p-3 mr-auto'>Role</div>
        <div class='p-3 mr-auto'></div>
    </div>
    <div class="bg-white rounded m-auto py-2 mt-3">
        @foreach ($users as $user)
            <div class="alternate grid grid-cols-5 auto-cols-min bg-white rounded shadow ">

                        <div class='p-3 mr-auto'>{{ $user->first_name }}</div>
                        <div class='p-3 mr-auto'>{{ $user->last_name }}</div>
                        <div class='p-3 mr-auto'>{{ $user->email }}</div>
                        <div class='p-3 mr-auto'>{{ $user->role }}</div>
                        <div class='p-3 mr-auto'><a href="user/edit/{{ $user->id }}">Edit</a></div>
            </div>
        @endforeach

    </div> --}}
@endsection
