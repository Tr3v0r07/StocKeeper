@extends('inventory.inventory')

@section('view')
@include('inventory.category')
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
        <td class="px-2 text-lg"><strong>Item Descritpion</strong></td>
        <td class="px-2 text-lg"><strong>Quantity Available</strong></td>
        <td></td>
        <td></td>
    </thead>
    <tbody>
        @foreach ($inv as $item)
            <tr>
                <td class="px-2">{{ $item->desc }}</td>
            @if ($item->quantity < $item->low)
                <td class="px-2 text-red-700">{{ $item->quantity }}</td>
            @else
                <td class="px-2 ">{{ $item->quantity }}</td>
            @endif
                {{-- <td class="px-2"><a href="/inventory/edit/{{ $customer->id }}"><strong>Edit</strong></a></td> --}}
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
