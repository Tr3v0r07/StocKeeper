@extends('order-forms.orders')

    @section('orderQuery')
    <div class="rounded p-3 bg-white m-auto">
        <table class="m-auto">
            <thead >
                <th class='p-3 text-left'>Order Number</th>
                <th class='p-3 text-left'>Customer</th>
                <th class='p-3 text-left'>Order Status</th>

            </thead>
            <tbody>
                <style>
                    tr:nth-child(even) {
                        background-color: #eee;
                    }
                    tr:nth-child(odd) {
                        background-color: #fff;
                    }
                </style>
            <div class="container">
                @foreach ($orders as $order)
                    <tr  class="rounded-2xl">
                        <td class='p-3 text-left'><a href="orders/view/{{ $order->id }}">{{ $order->id }}</a></td>
                        <td class='p-3 text-left'>{{ $order->cust_name }}</td>
                        <td class='p-3 text-left'>{{ $order->status }}</td>
                    </tr>
                @endforeach
            </div>

            </tbody>
        </table>
        @if (count($orders)>25)
        {{ $orders->links }}

        @endif
    </div>
    @endsection
