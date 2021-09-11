@extends('customers.customers')

@section('viewCustomer')



<div class="grid grid-cols-7 gap-5">
    <div class="col-span-2 p-3 bg-white rounded">
        <div>{{ $customer->name }}</div>
    @if (isset($customer->contact))
        <div>{{ $customer->contact }}</div>
    @endif
        <div>{{ $customer->phone }}</div>
        <div>{{ $customer->email }}</div>
        <div>{{ $customer->street_1 }}</div>
        @if (!is_null($customer->street_2))
        <div>{{ $customer->street_2 }}</div>
    @endif
        <div>{{ $customer->city }}, {{ $customer->state }} {{ $customer->zip }}</div>

    @admin()
        <div class=" noprint float-left inline-flex items-center mt-2 py-2 px-4  bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 my-2" class="my-2"><a href="customer/edit/{{ $customer->id }}">Edit</a></div>
        <div class=" noprint float-right inline-flex items-center mt-2 py-2 px-4  bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 my-2" class="my-2"><a href="customer/delete/{{ $customer->id }}">Delete</a></div>
    @endadmin

    </div>

    <div class="col-span-5 bg-white rounded">
        <div class="grid mx-auto p-4 grid-cols-2">
            <div class="col-start-1 font-bold text-lg">Order Number</div>
            <div class="col-start-2 font-bold text-lg">Status</div>

            @foreach ($orders as $order)
            <div class="col-start-1">{{ $order->id }}</div>
            <div class="col-start-2">{{ $order->status }}</div>
            @endforeach

        </div>




    </div>


</div>

@endsection
