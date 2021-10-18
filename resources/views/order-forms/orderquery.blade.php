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
                        background-color: rgba(229, 231, 235);}
                    }
                    tr:nth-child(odd) {
                        background-color: rgba(255, 255, 255);
                    }
                </style>
            <div class="container">
                @foreach ($orders as $order)
                    <tr  class="rounded">
                        <td class='p-3 text-left'><a href="orders/view/{{ $order->id }}">{{ $order->id }}</a></td>
                        <td class='p-3 text-left'><a href="orders/view/{{ $order->id }}">{{ $order->cust_name }}</a></td>
                        <td class='p-3 text-left'><a href="orders/view/{{ $order->id }}">{{ $order->status }}</a></td>
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
