@extends('inventory.inventory')

@section('view')
@include('inventory.category')
<style>
    .alternate:nth-child(even) {
        background-color: rgba(229, 231, 235);}
    .alternate:nth-child(odd) {
        background-color: rgba(255, 255, 255);
    }
</style>

<div class="m-auto ">
    <div class="grid grid-cols-2 my-2 bg-white p-2 rounded shadow">
        <div class="px-2 col-start-1 text-lg"><strong>Item Descritpion</strong></div>
        <div class="px-2 col-start-2 text-lg"><strong>Quantity Available</strong></div>
    </div>
    <div class="bg-white rounded shadow p-3">
        @foreach ($inv as $item)
        <div class="alternate rounded my-1 border border-gray-200 shadow">
            <div class="grid grid-cols-2">
                <div class="px-2 col-start-1 ">{{ $item->desc }}</div>
            @if ($item->quantity < $item->low)
                <div class="px-2 col-start-2 text-red-700">{{ $item->quantity }}</div>
            @else
                <div class="px-2 col-start-2 ">{{ $item->quantity }}</div>
            @endif
                {{-- <div class="px-2"><a href="/inventory/edit/{{ $customer->id }}"><sdivong>Edit</sdivong></a></div> --}}
            </div>
        </div>

        @endforeach
        {{ $inv->links() }}
</div>
</div>
@endsection
