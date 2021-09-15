{{-- <div class="grid gap-x-5 grid-cols-7 m-auto auto-cols-max">
    <div class="col-start-1">Customer<br>Name</div>
    <div class="col-start-2">Contact<br>Name</div>
    <div class="col-start-3">Phone<br>Number</div>
    <div class="col-start-4 cos-span-2">Email<br>Address</div>
    <div class="col-start-6 col-end-8 cos-span-3 w-full">Street<br>Address</div>
    @foreach ($customers as$customer )

    <div class="col-start-1">{{ $customer->name }}</div>
    <div class="col-start-2">{{ $customer->contact }}</div>
    <div class="col-start-3">{{ $customer->phone }}</div>
    <div class="col-start-4 cos-span-2">{{ $customer->email }}</div>
    <div class="col-start-6 col-end-8 cos-span-3 w-full">{{ $customer->street_1 }}, {{ $customer->street_2 }}<br>{{ $customer->city }}, {{ $customer->state }} {{ $customer->zip }}</div>
    @endforeach
</div> --}}
@extends('customers.customers')

@section('customerSearch')
<style>
    .alternate:nth-child(even) {
        background-color: rgba(229, 231, 235);}
    .alternate:nth-child(odd) {
        background-color: rgba(255, 255, 255);
    }
</style>


<div class="m-auto">
    <div class=" grid auto-cols-fr grid-cols-2 m-auto">
        <div class="grid grid-cols-2 auto-cols-fr col-span-2 bg-white rounded shadow py-3 mb-2">
            <div class="px-2  col-start-1 text-lg"><strong>Customer Name</strong></div>
            <div class="px-2 col-start-2 text-lg"><strong>Contact Name</strong></div>
        </div>
        <div class="grid grid-cols-2 auto-cols-fr col-span-2 bg-white rounded shadow" >
        @foreach ($customers as $customer)
        <div class="alternate grid grid-cols-2 auto-cols-fr col-span-2 rounded shadow mx-2 my-1">
            <div class="px-2 py-1 col-start-1 "><a href="customers/{{ $customer->id }}">{{ $customer->name }}</a></div>
            <div class="px-2 py-1 col-start-2 ">{{ $customer->contact }}</div>
        </div>
        @endforeach
        @if (count($customers)>25)
        {{ $customers->links() }}

        @endif
    </div>

    </div>
</div>
@endsection
