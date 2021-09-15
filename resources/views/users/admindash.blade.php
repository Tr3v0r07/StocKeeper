@extends('users.dashboard')

@section('admindash')
@php
 $rolls = DB::table('rolls')->where('remaining','>',0)->get();
 $orders = DB::table('orders')
                    ->where('status','!=','Finalized')
                    ->orderBy('status','asc')
                    ->get();
@endphp
<style>
.alternate:nth-child(odd) {
    background-color: #ddd
}
.alternate:nth-child(even) {
    background-color: #fff
}
</style>

<div class="sm:grid sm:w-5/6 m-auto sm:grid-cols-4 gap-5">
    <div class="sm:col-span-2 bg-white my-2 shadow-md rounded p-3">
        <div class="font-bold text-lg">Active Orders:</div>

            @foreach ($orders as $order)
                @if ($order->status == 'Started')
                <div class="alternate p-2 m-1 border border-gray-200 shadow-md rounded"><a class="grid grid-cols-2 " href="orders/view/{{ $order->id }}">
                    <div class="col-start-1">{{ $order->id }}: {{ $order->status }}</div>
                    <div class="col-start-2">{{ $order->cust_name }}</div></a>
                </div>
            @endif
            @endforeach
            @foreach ($orders as $order)
                @if ($order->status == 'Estimated')
                    <div class="alternate p-2 m-1 border border-gray-200 shadow-md rounded"><a class="grid grid-cols-2 " href="orders/view/{{ $order->id }}">
                        <div class="col-start-1">{{ $order->id }}: {{ $order->status }}</div>
                        <div class="col-start-2">{{ $order->cust_name }}</div></a>
                    </div>
                    @endif
            @endforeach
            @foreach ($orders as $order)
                @if ($order->status == 'Accepted')
                <div class="alternate p-2 m-1 border border-gray-200 shadow-md rounded"><a class="grid grid-cols-2 " href="orders/view/{{ $order->id }}">
                    <div class="col-start-1">{{ $order->id }}: {{ $order->status }}</div>
                    <div class="col-start-2">{{ $order->cust_name }}</div></a>
                </div>
            @endif
            @endforeach
            @foreach ($orders as $order)
                @if ($order->status == 'Completed')
                <div class="alternate p-2 m-1 border border-gray-200 shadow-md rounded"><a class="grid grid-cols-2 " href="orders/view/{{ $order->id }}">
                    <div class="col-start-1">{{ $order->id }}: {{ $order->status }}</div>
                    <div class="col-start-2">{{ $order->cust_name }}</div></a>
                </div>
            @endif
            @endforeach
            @foreach ($orders as $order)
                @if ($order->status == 'Invoiced')
                <div class="alternate p-2 m-1 border border-gray-200 shadow-md rounded"><a class="grid grid-cols-2 " href="orders/view/{{ $order->id }}">
                    <div class="col-start-1">{{ $order->id }}: {{ $order->status }}</div>
                    <div class="col-start-2">{{ $order->cust_name }}</div></a>
                </div>
            @endif
            @endforeach


    </div>
    <div class="sm:col-span-2 sm:col-start-3 bg-white my-2 rounded shadow-md p-3">
        <div class="font-bold text-lg">Rolls</div>
        @foreach ($rolls as $item)
            <div class="alternate grid auto-cols-min grid-cols-3 gap-1 p-2 m-1 shadow-md border border-gray-200 rounded">
                <div class="text-right">{{ $item->sn }}</div>
                <div class="text-center">- {{ $item->color }} -</div>
                <div class="text-left">{{ floor($item->remaining/12) }}'
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
