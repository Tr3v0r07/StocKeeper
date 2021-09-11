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
    tr:nth-child(even) {
        background-color: #eee;
    }
    tr:nth-child(odd) {
        background-color: #fff;
    }
</style>

<table class="m-auto grid-cols-1">
    <thead class="contents">
        <tr class=" rounded-t grid-cols-5">
            <td class="px-2 rounded-tr max-w-min col-start-1 text-lg"><strong>Customer<br>Name</strong></td>
            <td class="px-2 max-w-min col-start-2 text-lg"><strong>Contact<br>Name</strong></td>
            <td class="px-2 max-w-min col-start-3 text-lg"><strong>Phone<br>Number</strong></td>
            <td class="px-2 max-w-min col-start-4 text-lg"><strong>Email<br>Address</strong></td>
            <td class="px-2 rounded-tl max-w-min col-start-5 text-lg"><strong>Street<br>Address</strong></td>
        </tr>
    </thead>
    <tbody class="contents">
        @foreach ($customers as $customer)
            <tr class="grid-cols-5">
                <td class="px-2 col-start-1 max-w-min"><a href="customers/{{ $customer->id }}">{{ $customer->name }}</a></td>
                <td class="px-2 col-start-2 max-w-min">{{ $customer->contact }}</td>
                <td class="px-2 col-start-3 max-w-min">{{ $customer->phone }}</td>
                <td class="px-2 col-start-4 max-w-min">{{ $customer->email }}</td>
                <td class="px-2 col-start-5 max-w-min">{{ $customer->street_1 }}, {{ $customer->street_2 }}<br>{{ $customer->city }}, {{ $customer->state }} {{ $customer->zip }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
