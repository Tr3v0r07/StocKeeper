@php
    $roll = session()->get('roll');

@endphp

@extends('order-forms.new-order')

@section('sticks')

        @include('order-forms.orderview')

    <div class="p-2">
        <div class="grid gap-3 grid-cols-7 auto-cols-auto">

            <div class="col-start-1 col-span-2 font-bold">Roll Number - Color - Gauge</div>
            <div class="col-start-3 col-span-3 font-bold">Description</div>
            <div class="col-start-6 font-bold">Quantity</div>

        </div>
            <form method="POST" class="" action={{route('addTrim')}}>
                @csrf
                <div id="row" class="grid gap-3 grid-cols-7 ">
                <input readonly class="hidden"type="text" name="id" value="{{ $trimId }}">
                <select  required name="sn" id="sn" class=" col-start-1 col-span-2 block mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option disabled selected value="">Select Roll</option>
                    @foreach ($rolls as $item)
                        @if (isset($roll[$item->id]))
                            <option value="{{ $item->sn }}">{{ $item->sn  }} - {{ $item->color }} - {{ $item->gauge }} ({{ ($roll[$item->id]['available']/12)-($roll[$item->id]['available']%12) }}' {{ ($roll[$item->id]['available']%12) }}" )</option>
                        @else
                            <option value="{{ $item->sn }}">{{ $item->sn  }} - {{ $item->color }} - {{ $item->gauge }} ({{ (($item->remaining/12)-$item->remaining%12) }}' {{ $item->remaining%12 }}" )</option>
                        @endif
                    @endforeach

                </select>

                <select name="desc" required class="col-start-3 col-span-3 block mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option disabled selected value="">Select Item</option>
                        @foreach ($inventory as $product)
                            <option value="{{ $product->desc }}">{{ $product->desc }}</option>
                        @endforeach
                </select>
                @foreach ($inventory as $product)
                <input readonly class="hidden"type="text" name="ppu" value="{{ $product->ppu }}">
                @endforeach
                <input id="quantity" hidden readonly class="mt-1 col-start-6 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="remaining" />
                <input id="quantity" class="mt-1 col-start-6 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="quantity"/>
                <x-button href="" class="col-start-7 m-auto">Add</x-button>
                </div>
            </form>
        <div class="inline-flex items-center mt-2 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 my-2" class="my-2"><a href="{{ route('toCart') }}"> Proceed</a></div>
        </div>

        @endsection
