
    <table class="">
        <thead >
            <th class='p-3 text-left'>Order Number</th>
            <th class='p-3 text-left'>Customer</th>
            <th class='p-3 text-left'>Order Status</th>
            <th class='p-3 text-left'></th>
            <th class='p-3 text-left'></th>

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
                    <td class='p-3 text-left'>{{ $order->id }}</td>
                    <td class='p-3 text-left'>{{ $order->cust_name }}</td>
                    <td class='p-3 text-left'>{{ $order->status }}</td>
                    <td class='p-3 text-left'><a href="edit/{{ $order->id }}"><strong>Edit</strong></a></td>
                    <td class='p-3 text-left'><a href="delete/{{ $order->id }}"><strong>Delete</strong></a></td>
                </tr>
            @endforeach
        </tbody>        
    </table>

