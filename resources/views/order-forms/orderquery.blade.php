@extends('order-forms.orders')

    @section('orderQuery')
    <div class="rounded p-3 ">
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
                    tr:nth-child(od) {
                        background-color: #fff;
                    }
                </style>

                @foreach ($orders as $order)
                    <tr  class="rounded-2xl">
                        <td class='p-3 text-left'><a href="orders/{{ $order->id }}">{{ $order->id }}</a></td>
                        <td class='p-3 text-left'>{{ $order->cust_name }}</td>
                        <td class='p-3 text-left'>{{ $order->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
