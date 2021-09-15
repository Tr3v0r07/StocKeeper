@extends('customers.customers')

@section('viewCustomer')



<div class="sm:grid sm:grid-cols-7 sm:gap-5">
    <div class="sm:col-span-3 p-6 pb-12 grid grid-cols-3 mb-auto bg-white rounded shadow">
        <div class="col-span-2">{{ $customer->name }}</div>
    @if (isset($customer->contact))
            <div class="col-span-2">{{ $customer->contact }}</div>
            <div class="col-span-3">{{ $customer->phone }}</div>
            <div class="col-span-2">{{ $customer->email }}</div>
            <div class="col-span-2">{{ $customer->street_1 }}</div>
        @if (!is_null($customer->street_2))
            <div class="col-span-3">{{ $customer->street_2 }}</div>
            <div class="col-span-3">{{ $customer->city }}, {{ $customer->state }} {{ $customer->zip }}</div>
        @else
            <div class="col-span-3">{{ $customer->city }}, {{ $customer->state }} {{ $customer->zip }}</div>
        @endif
    @else
            <div class="col-span-2">{{ $customer->phone }}</div>
            <div class="col-span-2">{{ $customer->email }}</div>
            <div class="col-span-2">{{ $customer->street_1 }}</div>
        @if (!is_null($customer->street_2))
            <div class="col-span-2">{{ $customer->street_2 }}</div>
            <div class="col-span-3">{{ $customer->city }}, {{ $customer->state }} {{ $customer->zip }}</div>
        @else
            <div class="col-span-3">{{ $customer->city }}, {{ $customer->state }} {{ $customer->zip }}</div>
        @endif
    @endif
    @admin()
        <div class=" noprint row-start-1 row-span-2 col-start-3 inline-flex items-center ml-auto mt-2 py-2 px-4  bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 my-2" ><a href="/customers/{{ $customer->id }}/edit">Edit</a></div>
        <div class=" noprint row-start-3 row-span-2 col-start-3 inline-flex items-center ml-auto mt-2 py-2 px-4  bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 my-2" ><a href="/customers/{{ $customer->id }}/delete">Delete</a></div>
    @endadmin

    </div>

    <div class="sm:col-span-4 block p-6 mb-auto bg-white rounded shadow">
        <div class="grid sm:p-4 m-auto auto-cols-auto grid-cols-2 gap-x-3">
            <div class="col-start-1 font-bold text-lg">Order Number</div>
            <div class="col-start-2 font-bold text-lg">Status</div>

            @foreach ($orders as $order)
            <div class="pl-2 col-start-1"><a href="/orders/view/{{ $order->id }}">{{ $order->id }}</a></div>
            <div class="col-start-2">{{ $order->status }}</div>
            @endforeach

        </div>




    </div>


</div>

@endsection
