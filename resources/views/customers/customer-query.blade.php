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

<style>
    tr:nth-child(even) {
        background-color: #eee;
    }
    tr:nth-child(odd) {
        background-color: #fff;
    }
</style>

<table class="m-auto">
    <thead>
        <td class="px-2 text-lg"><strong>Customer<br>Name</strong></td>
        <td class="px-2 text-lg"><strong>Contact<br>Name</strong></td>
        <td class="px-2 text-lg"><strong>Phone<br>Number</strong></td>
        <td class="px-2 text-lg"><strong>Email<br>Address</strong></td>
        <td class="px-2 text-lg"><strong>Street<br>Address</strong></td>
        <td></td>
        <td></td>
    </thead>
    <tbody>
        @foreach ($customers as $customer)
            <tr>
                <td class="px-2">{{ $customer->name }}</td>
                <td class="px-2">{{ $customer->contact }}</td>
                <td class="px-2">{{ $customer->phone }}</td>
                <td class="px-2">{{ $customer->email }}</td>
                <td class="px-2">{{ $customer->street_1 }}, {{ $customer->street_2 }}<br>{{ $customer->city }}, {{ $customer->state }} {{ $customer->zip }}</td>
                <td class="px-2"><a href="/customers/edit/{{ $customer->id }}"><strong>Edit</strong></a></td>
                <td class="px-2"><a href="/customers/delete/{{ $customer->id }}"><strong>Delete</strong></a></td>
            </tr>
        @endforeach
    </tbody>
</table>