@extends('order-forms.new-order')

@section('orderForm')
    @include('order-forms.orderview')
{{-- <div class="p-2">
    <div class="grid gap-3 grid-cols-6 auto-cols-auto">

        <div class="col-start-1 font-bold">Category</div>
        <div class="col-span-2 font-bold">Item Description</div>
        <div class="col-start-4 font-bold">Available</div>
        <div class="col-start-5 font-bold">Quantity</div>
    </div>
    @foreach ($inventory as $item)
        <form method="POST" class="" action={{route('addItem')}}>
            @csrf
        <div id="row" class="grid gap-3 grid-cols-6 ">

            <input readonly class="hidden" type="text" name="id" value="{{ $item->id }}">
            <input readonly class="hidden" type="text" name="category" value="{{ $item->category }}">
            <input readonly class="hidden" type="text" name="desc" value="{{ $item->desc }}">
            <input readonly class="hidden" type="text" name="ppu" value="{{ $item->id }}">
            <div class="col-start-1 my-auto">{{ $item->category }}</div>
            <div class="col-span-2 my-auto">{{ $item->desc }}</div>
            @isset($cart[$item->id])
            <input readonly class="hidden" type="text" name="available" value="{{ $item->quantity - $cart[$item->id]['quantity'] }}">
            <div class="col-start-4 my-auto">{{ $item->quantity - $cart[$item->id]['quantity'] }}</div>
            @else
            <input readonly class="hidden" type="text" name="available" value="{{ $item->quantity}}">
            <div class="col-start-4 my-auto">{{ $item->quantity }}</div>
            @endisset
            <div class="col-start-5  my-auto"><input id="id" class="w-full mt-1 col-start-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="quantity"  /></div>
            <div  class="col-start-6 m-auto"><x-button href="">Add</x-button></div>
        </div>
        </form>
    @endforeach
</div> --}}

This is a test

@endsection



